<?php

class Setting
{
    private static ?array $cache = null;

    private static function loadAll(): array
    {
        if (self::$cache === null) {
            $stmt = Database::connection()->query('SELECT setting_key, setting_value FROM settings');
            self::$cache = [];
            foreach ($stmt->fetchAll() as $row) {
                self::$cache[$row['setting_key']] = $row['setting_value'];
            }
        }

        return self::$cache;
    }

    public static function get(string $key, string $default = ''): string
    {
        $all = self::loadAll();
        return $all[$key] ?? $default;
    }

    public static function set(string $key, string $value): void
    {
        $stmt = Database::connection()->prepare(
            'INSERT INTO settings (setting_key, setting_value) VALUES (:key, :value)
             ON DUPLICATE KEY UPDATE setting_value = :value2'
        );
        $stmt->execute(['key' => $key, 'value' => $value, 'value2' => $value]);

        if (self::$cache !== null) {
            self::$cache[$key] = $value;
        }
    }

    public static function globalDiscountPercent(): float
    {
        return (float) self::get('global_discount_percent', '80');
    }
}
