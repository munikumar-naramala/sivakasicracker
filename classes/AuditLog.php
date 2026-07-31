<?php

class AuditLog
{
    public static function record(string $action, ?string $entityType = null, ?int $entityId = null, array $details = []): void
    {
        $stmt = Database::connection()->prepare(
            'INSERT INTO audit_logs (admin_user_id, action, entity_type, entity_id, details, ip_address)
             VALUES (:admin_user_id, :action, :entity_type, :entity_id, :details, :ip_address)'
        );
        $stmt->execute([
            'admin_user_id' => AdminAuth::currentId(),
            'action'        => $action,
            'entity_type'   => $entityType,
            'entity_id'     => $entityId,
            'details'       => !empty($details) ? json_encode($details) : null,
            'ip_address'    => $_SERVER['REMOTE_ADDR'] ?? null,
        ]);
    }

    public static function recent(int $limit = 50): array
    {
        $stmt = Database::connection()->prepare(
            'SELECT al.*, au.username FROM audit_logs al
             LEFT JOIN admin_users au ON au.id = al.admin_user_id
             ORDER BY al.created_at DESC LIMIT :limit'
        );
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
