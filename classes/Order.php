<?php

class Order
{
    /**
     * Creates an order from the current session Cart. Every price comes from
     * Cart::resolve() (which reads live Product data), never from client input —
     * this is what closes the price-tampering hole in the legacy processorder.php.
     *
     * @param array{name:string,email:string,mobile:string,address:string} $customer
     * @throws RuntimeException if the cart is empty after resolving against current stock/visibility
     */
    public static function createFromCart(array $customer): array
    {
        $resolved = Cart::resolve();
        if (empty($resolved['lines'])) {
            throw new RuntimeException('Your cart is empty or no longer available.');
        }

        $db = Database::connection();
        $db->beginTransaction();

        try {
            $stmt = $db->prepare(
                'INSERT INTO orders (order_number, customer_name, customer_email, customer_mobile,
                    customer_address, status, subtotal, total)
                 VALUES (:placeholder, :name, :email, :mobile, :address, "pending", :subtotal, :total)'
            );
            $stmt->execute([
                'placeholder' => 'PENDING',
                'name'        => $customer['name'],
                'email'       => $customer['email'],
                'mobile'      => $customer['mobile'],
                'address'     => $customer['address'],
                'subtotal'    => $resolved['subtotal'],
                'total'       => $resolved['subtotal'],
            ]);
            $orderId = (int) $db->lastInsertId();

            $orderNumber = sprintf('SC-%s-%06d', date('Y'), $orderId);
            $db->prepare('UPDATE orders SET order_number = :number WHERE id = :id')
                ->execute(['number' => $orderNumber, 'id' => $orderId]);

            $itemStmt = $db->prepare(
                'INSERT INTO order_items (order_id, product_id, product_name_snapshot, unit_price_snapshot, quantity, line_total)
                 VALUES (:order_id, :product_id, :name, :unit_price, :quantity, :line_total)'
            );
            foreach ($resolved['lines'] as $line) {
                $itemStmt->execute([
                    'order_id'    => $orderId,
                    'product_id'  => $line['product_id'],
                    'name'        => $line['name'],
                    'unit_price'  => $line['unit_price'],
                    'quantity'    => $line['quantity'],
                    'line_total'  => $line['line_total'],
                ]);
            }

            $db->commit();
        } catch (Throwable $e) {
            $db->rollBack();
            throw $e;
        }

        Cart::clear();

        return [
            'id'           => $orderId,
            'order_number' => $orderNumber,
            'lines'        => $resolved['lines'],
            'subtotal'     => $resolved['subtotal'],
            'total'        => $resolved['subtotal'],
        ];
    }

    public static function findByNumber(string $orderNumber): ?array
    {
        $stmt = Database::connection()->prepare('SELECT * FROM orders WHERE order_number = :number');
        $stmt->execute(['number' => $orderNumber]);
        $order = $stmt->fetch();
        if (!$order) {
            return null;
        }
        $order['items'] = self::itemsFor((int) $order['id']);
        return $order;
    }

    public static function find(int $id): ?array
    {
        $stmt = Database::connection()->prepare('SELECT * FROM orders WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $order = $stmt->fetch();
        if (!$order) {
            return null;
        }
        $order['items'] = self::itemsFor($id);
        return $order;
    }

    private static function itemsFor(int $orderId): array
    {
        $stmt = Database::connection()->prepare('SELECT * FROM order_items WHERE order_id = :order_id ORDER BY id');
        $stmt->execute(['order_id' => $orderId]);
        return $stmt->fetchAll();
    }

    // --- Admin methods -----------------------------------------------------

    public static function allForAdmin(?string $status = null, ?string $dateFrom = null, ?string $dateTo = null): array
    {
        $sql = 'SELECT * FROM orders WHERE 1=1';
        $params = [];

        if ($status !== null && $status !== '') {
            $sql .= ' AND status = :status';
            $params['status'] = $status;
        }
        if ($dateFrom !== null && $dateFrom !== '') {
            $sql .= ' AND created_at >= :date_from';
            $params['date_from'] = $dateFrom . ' 00:00:00';
        }
        if ($dateTo !== null && $dateTo !== '') {
            $sql .= ' AND created_at <= :date_to';
            $params['date_to'] = $dateTo . ' 23:59:59';
        }

        $sql .= ' ORDER BY created_at DESC';

        $stmt = Database::connection()->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    public static function updateStatus(int $id, string $status, ?string $adminNotes = null): void
    {
        $stmt = Database::connection()->prepare(
            'UPDATE orders SET status = :status, admin_notes = COALESCE(:notes, admin_notes) WHERE id = :id'
        );
        $stmt->execute(['status' => $status, 'notes' => $adminNotes, 'id' => $id]);
    }

    public static function countToday(): int
    {
        $stmt = Database::connection()->query('SELECT COUNT(*) FROM orders WHERE DATE(created_at) = CURDATE()');
        return (int) $stmt->fetchColumn();
    }

    public static function countPending(): int
    {
        $stmt = Database::connection()->query("SELECT COUNT(*) FROM orders WHERE status = 'pending'");
        return (int) $stmt->fetchColumn();
    }

    public static function revenueToday(): float
    {
        $stmt = Database::connection()->query(
            "SELECT COALESCE(SUM(total), 0) FROM orders WHERE DATE(created_at) = CURDATE() AND status != 'cancelled'"
        );
        return (float) $stmt->fetchColumn();
    }

    public static function mostOrderedProducts(int $limit = 5): array
    {
        $stmt = Database::connection()->prepare(
            'SELECT product_name_snapshot AS name, SUM(quantity) AS total_quantity
             FROM order_items oi
             JOIN orders o ON o.id = oi.order_id
             WHERE o.status != "cancelled"
             GROUP BY product_name_snapshot
             ORDER BY total_quantity DESC
             LIMIT :limit'
        );
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function revenueBetween(string $dateFrom, string $dateTo): float
    {
        $stmt = Database::connection()->prepare(
            "SELECT COALESCE(SUM(total), 0) FROM orders
             WHERE created_at BETWEEN :from AND :to AND status != 'cancelled'"
        );
        $stmt->execute(['from' => $dateFrom . ' 00:00:00', 'to' => $dateTo . ' 23:59:59']);
        return (float) $stmt->fetchColumn();
    }

    public static function mostOrderedProductsBetween(string $dateFrom, string $dateTo, int $limit = 10): array
    {
        $stmt = Database::connection()->prepare(
            'SELECT product_name_snapshot AS name, SUM(quantity) AS total_quantity, SUM(line_total) AS total_revenue
             FROM order_items oi
             JOIN orders o ON o.id = oi.order_id
             WHERE o.status != "cancelled" AND o.created_at BETWEEN :from AND :to
             GROUP BY product_name_snapshot
             ORDER BY total_quantity DESC
             LIMIT :limit'
        );
        $stmt->bindValue(':from', $dateFrom . ' 00:00:00');
        $stmt->bindValue(':to', $dateTo . ' 23:59:59');
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function countBetween(string $dateFrom, string $dateTo): int
    {
        $stmt = Database::connection()->prepare(
            'SELECT COUNT(*) FROM orders WHERE created_at BETWEEN :from AND :to'
        );
        $stmt->execute(['from' => $dateFrom . ' 00:00:00', 'to' => $dateTo . ' 23:59:59']);
        return (int) $stmt->fetchColumn();
    }
}
