-- One-time cleanup: removes the test orders and test contact message created
-- while debugging on /v2, before cutting over to production. Run this once,
-- via phpMyAdmin, right before going live.
--
-- Safe to run: order_items has ON DELETE CASCADE from orders, so deleting the
-- orders below automatically removes their line items too.

DELETE FROM orders WHERE order_number IN (
    'SC-2026-000001', 'SC-2026-000002', 'SC-2026-000003', 'SC-2026-000004',
    'SC-2026-000005', 'SC-2026-000006', 'SC-2026-000007', 'SC-2026-000008'
);

DELETE FROM contact_messages WHERE subject = 'Test message from v2 verification';

-- Optional: also clears the audit_logs entries these test actions generated
-- (order.status_change etc.) — remove the -- below to include this.
-- DELETE FROM audit_logs WHERE entity_type = 'order' AND entity_id NOT IN (SELECT id FROM orders);
