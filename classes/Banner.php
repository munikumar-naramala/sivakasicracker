<?php

class Banner
{
    public static function activeByPosition(string $position): array
    {
        $stmt = Database::connection()->prepare(
            "SELECT * FROM banners
             WHERE position = :position AND status = 'active'
               AND (starts_at IS NULL OR starts_at <= CURDATE())
               AND (ends_at IS NULL OR ends_at >= CURDATE())
             ORDER BY display_order"
        );
        $stmt->execute(['position' => $position]);
        return $stmt->fetchAll();
    }

    public static function all(): array
    {
        $stmt = Database::connection()->query('SELECT * FROM banners ORDER BY position, display_order');
        return $stmt->fetchAll();
    }

    public static function find(int $id): ?array
    {
        $stmt = Database::connection()->prepare('SELECT * FROM banners WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch();
        return $row ?: null;
    }

    public static function create(array $data): int
    {
        $stmt = Database::connection()->prepare(
            'INSERT INTO banners (title, image_path, link_url, position, display_order, status, starts_at, ends_at)
             VALUES (:title, :image_path, :link_url, :position, :display_order, :status, :starts_at, :ends_at)'
        );
        $stmt->execute(self::bindParams($data));
        return (int) Database::connection()->lastInsertId();
    }

    public static function update(int $id, array $data): void
    {
        $params = self::bindParams($data);
        $params['id'] = $id;
        $stmt = Database::connection()->prepare(
            'UPDATE banners SET title = :title, image_path = :image_path, link_url = :link_url,
                position = :position, display_order = :display_order, status = :status,
                starts_at = :starts_at, ends_at = :ends_at
             WHERE id = :id'
        );
        $stmt->execute($params);
    }

    private static function bindParams(array $data): array
    {
        return [
            'title'         => $data['title'],
            'image_path'    => $data['image_path'],
            'link_url'      => $data['link_url'] ?: null,
            'position'      => $data['position'],
            'display_order' => $data['display_order'] ?? 0,
            'status'        => $data['status'] ?? 'active',
            'starts_at'     => $data['starts_at'] ?: null,
            'ends_at'       => $data['ends_at'] ?: null,
        ];
    }

    public static function delete(int $id): void
    {
        $stmt = Database::connection()->prepare('DELETE FROM banners WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }
}
