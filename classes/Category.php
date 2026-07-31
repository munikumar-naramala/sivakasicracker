<?php

class Category
{
    public static function allActive(): array
    {
        $stmt = Database::connection()->query(
            "SELECT * FROM categories WHERE status = 'active' ORDER BY display_order, name"
        );
        return $stmt->fetchAll();
    }

    public static function all(): array
    {
        $stmt = Database::connection()->query('SELECT * FROM categories ORDER BY display_order, name');
        return $stmt->fetchAll();
    }

    public static function find(int $id): ?array
    {
        $stmt = Database::connection()->prepare('SELECT * FROM categories WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch();
        return $row ?: null;
    }

    public static function findBySlug(string $slug): ?array
    {
        $stmt = Database::connection()->prepare('SELECT * FROM categories WHERE slug = :slug');
        $stmt->execute(['slug' => $slug]);
        $row = $stmt->fetch();
        return $row ?: null;
    }

    public static function create(array $data): int
    {
        $stmt = Database::connection()->prepare(
            'INSERT INTO categories (name, slug, image_path, display_order, status)
             VALUES (:name, :slug, :image_path, :display_order, :status)'
        );
        $stmt->execute([
            'name'          => $data['name'],
            'slug'          => $data['slug'],
            'image_path'    => $data['image_path'] ?? null,
            'display_order' => $data['display_order'] ?? 0,
            'status'        => $data['status'] ?? 'active',
        ]);
        return (int) Database::connection()->lastInsertId();
    }

    public static function update(int $id, array $data): void
    {
        $stmt = Database::connection()->prepare(
            'UPDATE categories SET name = :name, slug = :slug, image_path = :image_path,
             display_order = :display_order, status = :status WHERE id = :id'
        );
        $stmt->execute([
            'id'            => $id,
            'name'          => $data['name'],
            'slug'          => $data['slug'],
            'image_path'    => $data['image_path'] ?? null,
            'display_order' => $data['display_order'] ?? 0,
            'status'        => $data['status'] ?? 'active',
        ]);
    }

    public static function delete(int $id): void
    {
        $stmt = Database::connection()->prepare('DELETE FROM categories WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }

    public static function productCount(int $id): int
    {
        $stmt = Database::connection()->prepare('SELECT COUNT(*) FROM products WHERE category_id = :id');
        $stmt->execute(['id' => $id]);
        return (int) $stmt->fetchColumn();
    }
}
