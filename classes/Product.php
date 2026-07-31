<?php

class Product
{
    private const VISIBLE_STATUSES = ['available', 'out_of_stock', 'sold_out'];

    /** Calculates the price actually shown to customers. Never stored — always derived. */
    public static function finalPrice(float $mrp, ?float $discountPercent): float
    {
        $effective = $discountPercent ?? Setting::globalDiscountPercent();
        return round($mrp * (1 - $effective / 100), 2);
    }

    private static function decorate(array $row): array
    {
        $row['effective_discount_percent'] = $row['discount_percent'] !== null
            ? (float) $row['discount_percent']
            : Setting::globalDiscountPercent();
        $row['final_price'] = self::finalPrice((float) $row['mrp'], $row['discount_percent'] !== null ? (float) $row['discount_percent'] : null);
        return $row;
    }

    /** All products visible to customers (excludes 'hidden'), joined with category info. */
    public static function getAllVisible(?string $categorySlug = null): array
    {
        $sql = "SELECT p.*, c.name AS category_name, c.slug AS category_slug
                FROM products p
                JOIN categories c ON c.id = p.category_id
                WHERE p.status IN ('available', 'out_of_stock', 'sold_out')
                  AND c.status = 'active'";
        $params = [];

        if ($categorySlug !== null) {
            $sql .= ' AND c.slug = :slug';
            $params['slug'] = $categorySlug;
        }

        $sql .= ' ORDER BY c.display_order, p.display_order, p.name';

        $stmt = Database::connection()->prepare($sql);
        $stmt->execute($params);

        return array_map([self::class, 'decorate'], $stmt->fetchAll());
    }

    public static function getFeatured(int $limit = 8): array
    {
        $stmt = Database::connection()->prepare(
            "SELECT p.*, c.name AS category_name, c.slug AS category_slug
             FROM products p
             JOIN categories c ON c.id = p.category_id
             WHERE p.is_featured = 1 AND p.status = 'available' AND c.status = 'active'
             ORDER BY p.display_order LIMIT :limit"
        );
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();

        return array_map([self::class, 'decorate'], $stmt->fetchAll());
    }

    public static function search(string $query): array
    {
        $stmt = Database::connection()->prepare(
            "SELECT p.*, c.name AS category_name, c.slug AS category_slug
             FROM products p
             JOIN categories c ON c.id = p.category_id
             WHERE p.status IN ('available', 'out_of_stock', 'sold_out')
               AND c.status = 'active'
               AND p.name LIKE :query
             ORDER BY p.name"
        );
        $stmt->execute(['query' => '%' . $query . '%']);

        return array_map([self::class, 'decorate'], $stmt->fetchAll());
    }

    public static function find(int $id): ?array
    {
        $stmt = Database::connection()->prepare(
            'SELECT p.*, c.name AS category_name, c.slug AS category_slug
             FROM products p JOIN categories c ON c.id = p.category_id
             WHERE p.id = :id'
        );
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch();
        return $row ? self::decorate($row) : null;
    }

    /** Fetch multiple products by id in one query, e.g. to price a cart. Returns id => row. */
    public static function findMany(array $ids): array
    {
        if (empty($ids)) {
            return [];
        }
        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $stmt = Database::connection()->prepare(
            "SELECT p.*, c.name AS category_name FROM products p
             JOIN categories c ON c.id = p.category_id
             WHERE p.id IN ($placeholders)"
        );
        $stmt->execute(array_values($ids));

        $result = [];
        foreach ($stmt->fetchAll() as $row) {
            $result[(int) $row['id']] = self::decorate($row);
        }
        return $result;
    }

    // --- Admin methods -----------------------------------------------------

    public static function allForAdmin(?int $categoryId = null, ?string $status = null, ?string $search = null): array
    {
        $sql = 'SELECT p.*, c.name AS category_name FROM products p JOIN categories c ON c.id = p.category_id WHERE 1=1';
        $params = [];

        if ($categoryId !== null) {
            $sql .= ' AND p.category_id = :category_id';
            $params['category_id'] = $categoryId;
        }
        if ($status !== null) {
            $sql .= ' AND p.status = :status';
            $params['status'] = $status;
        }
        if ($search !== null && $search !== '') {
            $sql .= ' AND (p.name LIKE :search OR p.sku LIKE :search)';
            $params['search'] = '%' . $search . '%';
        }

        $sql .= ' ORDER BY p.display_order, p.name';

        $stmt = Database::connection()->prepare($sql);
        $stmt->execute($params);

        return array_map([self::class, 'decorate'], $stmt->fetchAll());
    }

    public static function create(array $data): int
    {
        $stmt = Database::connection()->prepare(
            'INSERT INTO products
             (sku, name, slug, category_id, description, mrp, discount_percent, image_path,
              stock_quantity, status, display_order, is_featured)
             VALUES
             (:sku, :name, :slug, :category_id, :description, :mrp, :discount_percent, :image_path,
              :stock_quantity, :status, :display_order, :is_featured)'
        );
        $stmt->execute(self::bindParams($data));
        return (int) Database::connection()->lastInsertId();
    }

    public static function update(int $id, array $data): void
    {
        $params = self::bindParams($data);
        $params['id'] = $id;

        $stmt = Database::connection()->prepare(
            'UPDATE products SET
                sku = :sku, name = :name, slug = :slug, category_id = :category_id,
                description = :description, mrp = :mrp, discount_percent = :discount_percent,
                image_path = :image_path, stock_quantity = :stock_quantity, status = :status,
                display_order = :display_order, is_featured = :is_featured
             WHERE id = :id'
        );
        $stmt->execute($params);
    }

    private static function bindParams(array $data): array
    {
        return [
            'sku'              => $data['sku'],
            'name'             => $data['name'],
            'slug'             => $data['slug'],
            'category_id'      => $data['category_id'],
            'description'      => $data['description'] ?? null,
            'mrp'              => $data['mrp'],
            'discount_percent' => ($data['discount_percent'] ?? '') !== '' ? $data['discount_percent'] : null,
            'image_path'       => $data['image_path'],
            'stock_quantity'   => $data['stock_quantity'] ?? 0,
            'status'           => $data['status'] ?? 'available',
            'display_order'    => $data['display_order'] ?? 0,
            'is_featured'      => !empty($data['is_featured']) ? 1 : 0,
        ];
    }

    public static function delete(int $id): void
    {
        $stmt = Database::connection()->prepare('DELETE FROM products WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }

    public static function setStatus(int $id, string $status): void
    {
        $stmt = Database::connection()->prepare('UPDATE products SET status = :status WHERE id = :id');
        $stmt->execute(['id' => $id, 'status' => $status]);
    }

    public static function bulkSetStatus(array $ids, string $status): void
    {
        if (empty($ids)) {
            return;
        }
        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $stmt = Database::connection()->prepare("UPDATE products SET status = ? WHERE id IN ($placeholders)");
        $stmt->execute(array_merge([$status], array_values($ids)));
    }

    public static function lowStock(int $threshold = 5): array
    {
        $stmt = Database::connection()->prepare(
            "SELECT p.*, c.name AS category_name FROM products p
             JOIN categories c ON c.id = p.category_id
             WHERE p.stock_quantity <= :threshold AND p.status != 'hidden'
             ORDER BY p.stock_quantity"
        );
        $stmt->execute(['threshold' => $threshold]);
        return $stmt->fetchAll();
    }

    public static function recentlyAdded(int $limit = 5): array
    {
        $stmt = Database::connection()->prepare(
            'SELECT p.*, c.name AS category_name FROM products p
             JOIN categories c ON c.id = p.category_id
             ORDER BY p.created_at DESC LIMIT :limit'
        );
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function outOfStockCount(): int
    {
        $stmt = Database::connection()->query(
            "SELECT COUNT(*) FROM products WHERE status IN ('out_of_stock', 'sold_out')"
        );
        return (int) $stmt->fetchColumn();
    }
}
