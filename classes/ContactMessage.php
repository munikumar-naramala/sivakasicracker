<?php

class ContactMessage
{
    public static function create(array $data): int
    {
        $stmt = Database::connection()->prepare(
            'INSERT INTO contact_messages (name, email, phone, subject, message)
             VALUES (:name, :email, :phone, :subject, :message)'
        );
        $stmt->execute([
            'name'    => $data['name'],
            'email'   => $data['email'],
            'phone'   => $data['phone'] ?: null,
            'subject' => $data['subject'] ?: null,
            'message' => $data['message'],
        ]);
        return (int) Database::connection()->lastInsertId();
    }

    public static function allForAdmin(): array
    {
        $stmt = Database::connection()->query('SELECT * FROM contact_messages ORDER BY created_at DESC');
        return $stmt->fetchAll();
    }

    public static function unreadCount(): int
    {
        $stmt = Database::connection()->query('SELECT COUNT(*) FROM contact_messages WHERE is_read = 0');
        return (int) $stmt->fetchColumn();
    }

    public static function markRead(int $id): void
    {
        $stmt = Database::connection()->prepare('UPDATE contact_messages SET is_read = 1 WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }

    public static function delete(int $id): void
    {
        $stmt = Database::connection()->prepare('DELETE FROM contact_messages WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }
}
