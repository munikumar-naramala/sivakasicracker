-- Sivakasi Cracker Store — Database Schema
-- Target: MySQL 5.7+/8.0 (MilesWeb shared hosting), InnoDB, utf8mb4
--
-- Design notes:
--   - "Final selling price" is never stored redundantly. It is always calculated
--     as: mrp * (1 - effective_discount_percent / 100), where effective_discount_percent
--     is products.discount_percent if set, otherwise settings['global_discount_percent'].
--     This is what CLAUDE.md means by "the displayed selling price must be calculated
--     dynamically" and avoids a fourth place where prices can drift out of sync.
--   - order_items snapshots product name/price at the time of purchase so historical
--     orders remain accurate even if a product is later renamed, repriced, or deleted.

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------------
-- categories
-- ---------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS categories (
    id            INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name          VARCHAR(100) NOT NULL,
    slug          VARCHAR(120) NOT NULL,
    image_path    VARCHAR(255) NULL,
    display_order INT UNSIGNED NOT NULL DEFAULT 0,
    status        ENUM('active', 'inactive') NOT NULL DEFAULT 'active',
    created_at    TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at    TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY uq_categories_slug (slug),
    KEY idx_categories_status_order (status, display_order)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------------
-- products
-- ---------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS products (
    id                INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    sku               VARCHAR(50) NOT NULL,
    name              VARCHAR(150) NOT NULL,
    slug              VARCHAR(170) NOT NULL,
    category_id       INT UNSIGNED NOT NULL,
    description       TEXT NULL,
    mrp               DECIMAL(10,2) NOT NULL,
    discount_percent  DECIMAL(5,2) NULL COMMENT 'Product-level override; NULL = use settings.global_discount_percent',
    image_path        VARCHAR(255) NOT NULL,
    stock_quantity    INT NOT NULL DEFAULT 0,
    status            ENUM('available', 'out_of_stock', 'sold_out', 'hidden') NOT NULL DEFAULT 'available',
    display_order     INT UNSIGNED NOT NULL DEFAULT 0,
    is_featured       TINYINT(1) NOT NULL DEFAULT 0,
    created_at        TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at        TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY uq_products_sku (sku),
    UNIQUE KEY uq_products_slug (slug),
    KEY idx_products_category (category_id),
    KEY idx_products_status (status),
    KEY idx_products_featured (is_featured),
    CONSTRAINT fk_products_category FOREIGN KEY (category_id)
        REFERENCES categories (id) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------------
-- admin_users
-- ---------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS admin_users (
    id            INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username      VARCHAR(50) NOT NULL,
    email         VARCHAR(150) NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    full_name     VARCHAR(150) NOT NULL,
    role          ENUM('admin', 'staff') NOT NULL DEFAULT 'admin',
    is_active     TINYINT(1) NOT NULL DEFAULT 1,
    last_login_at DATETIME NULL,
    created_at    TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at    TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY uq_admin_users_username (username),
    UNIQUE KEY uq_admin_users_email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------------
-- orders
-- ---------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS orders (
    id               INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    order_number     VARCHAR(30) NOT NULL COMMENT 'Human-friendly reference, e.g. SC-2026-000123',
    customer_name    VARCHAR(150) NOT NULL,
    customer_email   VARCHAR(150) NOT NULL,
    customer_mobile  VARCHAR(20) NOT NULL,
    customer_address TEXT NOT NULL,
    status           ENUM('pending', 'confirmed', 'packed', 'dispatched', 'delivered', 'cancelled')
                         NOT NULL DEFAULT 'pending',
    subtotal         DECIMAL(10,2) NOT NULL COMMENT 'Server-computed from product prices at order time, never trusts client input',
    total            DECIMAL(10,2) NOT NULL,
    admin_notes      TEXT NULL,
    created_at       TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at       TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY uq_orders_order_number (order_number),
    KEY idx_orders_status (status),
    KEY idx_orders_created_at (created_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------------
-- order_items
-- ---------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS order_items (
    id                    INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    order_id              INT UNSIGNED NOT NULL,
    product_id            INT UNSIGNED NULL COMMENT 'NULL if the product was later deleted; name/price are snapshotted below',
    product_name_snapshot VARCHAR(150) NOT NULL,
    unit_price_snapshot   DECIMAL(10,2) NOT NULL,
    quantity              INT UNSIGNED NOT NULL,
    line_total            DECIMAL(10,2) NOT NULL,
    created_at            TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    KEY idx_order_items_order (order_id),
    KEY idx_order_items_product (product_id),
    CONSTRAINT fk_order_items_order FOREIGN KEY (order_id)
        REFERENCES orders (id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_order_items_product FOREIGN KEY (product_id)
        REFERENCES products (id) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------------
-- settings (key-value store for Website Settings module)
-- ---------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS settings (
    id            INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    setting_key   VARCHAR(100) NOT NULL,
    setting_value TEXT NULL,
    updated_at    TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY uq_settings_key (setting_key)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------------
-- banners
-- ---------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS banners (
    id            INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title         VARCHAR(150) NOT NULL,
    image_path    VARCHAR(255) NOT NULL,
    link_url      VARCHAR(255) NULL,
    position      ENUM('hero', 'header', 'festival') NOT NULL DEFAULT 'hero',
    display_order INT UNSIGNED NOT NULL DEFAULT 0,
    status        ENUM('active', 'inactive') NOT NULL DEFAULT 'active',
    starts_at     DATE NULL,
    ends_at       DATE NULL,
    created_at    TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at    TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    KEY idx_banners_position_status (position, status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------------
-- contact_messages
-- ---------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS contact_messages (
    id         INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name       VARCHAR(150) NOT NULL,
    email      VARCHAR(150) NOT NULL,
    phone      VARCHAR(20) NULL,
    subject    VARCHAR(200) NULL,
    message    TEXT NOT NULL,
    is_read    TINYINT(1) NOT NULL DEFAULT 0,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    KEY idx_contact_messages_is_read (is_read)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------------
-- audit_logs
-- ---------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS audit_logs (
    id             INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    admin_user_id  INT UNSIGNED NULL,
    action         VARCHAR(100) NOT NULL COMMENT 'e.g. product.update, order.status_change, admin.login',
    entity_type    VARCHAR(50) NULL COMMENT 'e.g. product, order, category',
    entity_id      INT UNSIGNED NULL,
    details        TEXT NULL COMMENT 'JSON-encoded before/after or context',
    ip_address     VARCHAR(45) NULL,
    created_at     TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    KEY idx_audit_logs_admin_user (admin_user_id),
    KEY idx_audit_logs_entity (entity_type, entity_id),
    KEY idx_audit_logs_created_at (created_at),
    CONSTRAINT fk_audit_logs_admin_user FOREIGN KEY (admin_user_id)
        REFERENCES admin_users (id) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

SET FOREIGN_KEY_CHECKS = 1;
