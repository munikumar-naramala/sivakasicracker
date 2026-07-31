<?php

class AdminUser
{
    public static function all(): array
    {
        $stmt = Database::connection()->query('SELECT id, username, email, full_name, role, is_active, last_login_at FROM admin_users ORDER BY username');
        return $stmt->fetchAll();
    }

    public static function usernameExists(string $username): bool
    {
        $stmt = Database::connection()->prepare('SELECT COUNT(*) FROM admin_users WHERE username = :username');
        $stmt->execute(['username' => $username]);
        return (int) $stmt->fetchColumn() > 0;
    }

    public static function create(array $data): int
    {
        $stmt = Database::connection()->prepare(
            'INSERT INTO admin_users (username, email, password_hash, full_name, role, is_active)
             VALUES (:username, :email, :hash, :full_name, :role, 1)'
        );
        $stmt->execute([
            'username'  => $data['username'],
            'email'     => $data['email'],
            'hash'      => password_hash($data['password'], PASSWORD_DEFAULT),
            'full_name' => $data['full_name'],
            'role'      => $data['role'],
        ]);
        return (int) Database::connection()->lastInsertId();
    }

    public static function setActive(int $id, bool $active): void
    {
        $stmt = Database::connection()->prepare('UPDATE admin_users SET is_active = :active WHERE id = :id');
        $stmt->execute(['active' => $active ? 1 : 0, 'id' => $id]);
    }
}
