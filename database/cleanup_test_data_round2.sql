-- Second round of test-data cleanup: removes the orders placed while
-- debugging the Brevo SMTP/domain-authentication switch on the live
-- production site (SC-2026-000011 through 000019). Run once via phpMyAdmin.
--
-- Safe to run: order_items has ON DELETE CASCADE from orders, so deleting
-- the orders below automatically removes their line items too.

DELETE FROM orders WHERE order_number IN (
    'SC-2026-000011', 'SC-2026-000012', 'SC-2026-000013', 'SC-2026-000014',
    'SC-2026-000015', 'SC-2026-000016', 'SC-2026-000017', 'SC-2026-000018',
    'SC-2026-000019'
);
