<?php

/**
 * Session-backed cart. Replaces the legacy site's "cart" being nothing more
 * than the live DOM state of a 177-row order form at submit time.
 */
class Cart
{
    private const SESSION_KEY = 'cart';

    private static function &store(): array
    {
        if (!isset($_SESSION[self::SESSION_KEY]) || !is_array($_SESSION[self::SESSION_KEY])) {
            $_SESSION[self::SESSION_KEY] = [];
        }
        return $_SESSION[self::SESSION_KEY];
    }

    /** @return array<int,int> product_id => quantity */
    public static function items(): array
    {
        return self::store();
    }

    public static function add(int $productId, int $quantity): void
    {
        $quantity = max(1, min($quantity, 999));
        $cart = &self::store();
        $cart[$productId] = ($cart[$productId] ?? 0) + $quantity;
        $cart[$productId] = min($cart[$productId], 999);
    }

    public static function setQuantity(int $productId, int $quantity): void
    {
        $cart = &self::store();
        if ($quantity <= 0) {
            unset($cart[$productId]);
            return;
        }
        $cart[$productId] = min($quantity, 999);
    }

    public static function remove(int $productId): void
    {
        $cart = &self::store();
        unset($cart[$productId]);
    }

    public static function clear(): void
    {
        $_SESSION[self::SESSION_KEY] = [];
    }

    public static function count(): int
    {
        return array_sum(self::store());
    }

    public static function isEmpty(): bool
    {
        return count(self::store()) === 0;
    }

    /**
     * Resolves the cart against current product data from the database.
     * This is the ONLY place prices/names for an order should come from —
     * never from client input. Silently drops line items whose product no
     * longer exists or is hidden.
     *
     * @return array{lines: array, subtotal: float}
     */
    public static function resolve(): array
    {
        $cart = self::store();
        if (empty($cart)) {
            return ['lines' => [], 'subtotal' => 0.0];
        }

        $products = Product::findMany(array_keys($cart));
        $lines = [];
        $subtotal = 0.0;

        foreach ($cart as $productId => $quantity) {
            $product = $products[$productId] ?? null;
            if ($product === null || $product['status'] === 'hidden') {
                continue;
            }
            $lineTotal = round($product['final_price'] * $quantity, 2);
            $subtotal += $lineTotal;
            $lines[] = [
                'product_id'   => (int) $product['id'],
                'name'         => $product['name'],
                'image_path'   => $product['image_path'],
                'unit_price'   => $product['final_price'],
                'quantity'     => $quantity,
                'line_total'   => $lineTotal,
            ];
        }

        return ['lines' => $lines, 'subtotal' => round($subtotal, 2)];
    }
}
