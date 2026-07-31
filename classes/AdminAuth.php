<?php

class AdminAuth
{
    public static function attempt(string $username, string $password): bool
    {
        $stmt = Database::connection()->prepare(
            'SELECT * FROM admin_users WHERE username = :username AND is_active = 1'
        );
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch();

        if (!$user || !password_verify($password, $user['password_hash'])) {
            return false;
        }

        session_regenerate_id(true);
        $_SESSION['admin_id'] = (int) $user['id'];
        $_SESSION['admin_username'] = $user['username'];
        $_SESSION['admin_role'] = $user['role'];

        Database::connection()
            ->prepare('UPDATE admin_users SET last_login_at = NOW() WHERE id = :id')
            ->execute(['id' => $user['id']]);

        return true;
    }

    public static function logout(): void
    {
        unset($_SESSION['admin_id'], $_SESSION['admin_username'], $_SESSION['admin_role']);
        session_regenerate_id(true);
    }

    public static function check(): bool
    {
        return !empty($_SESSION['admin_id']);
    }

    public static function requireLogin(): void
    {
        if (!self::check()) {
            header('Location: login.php');
            exit;
        }
    }

    public static function requireRole(string $role): void
    {
        self::requireLogin();
        if (($_SESSION['admin_role'] ?? '') !== $role) {
            http_response_code(403);
            echo 'Forbidden — this section requires the ' . e($role) . ' role.';
            exit;
        }
    }

    public static function currentUser(): ?array
    {
        if (!self::check()) {
            return null;
        }
        $stmt = Database::connection()->prepare('SELECT * FROM admin_users WHERE id = :id');
        $stmt->execute(['id' => $_SESSION['admin_id']]);
        $user = $stmt->fetch();
        return $user ?: null;
    }

    public static function currentId(): ?int
    {
        return self::check() ? (int) $_SESSION['admin_id'] : null;
    }
}
