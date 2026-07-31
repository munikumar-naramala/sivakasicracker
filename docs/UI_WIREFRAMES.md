# UI Wireframes

Text wireframes for the modernized public site and the new admin panel. Bootstrap 5, mobile-first, per CLAUDE.md's UI Modernization and Mobile First requirements. These are structural layouts, not final visual design — actual styling (colors, type, imagery) is open for a fresh look since no admin UI exists today to match, and the public site is being modernized anyway.

---

## 1. Shared Chrome (all public pages)

```
┌─────────────────────────────────────────────────────────┐
│ Topbar: 📞 phone   ✉ email   🔗 social icons             │  (thin, collapses on mobile)
├─────────────────────────────────────────────────────────┤
│ [Logo]     Home  Price List  Products  Place Order  ▤    │  ← sticky on scroll
│                                            [🔍 Search]    │     ▤ = mobile hamburger
├─────────────────────────────────────────────────────────┤
│                      PAGE CONTENT                        │
├─────────────────────────────────────────────────────────┤
│ Footer: About | Quick Links | Categories | Contact       │
│         Bank details (for order payment) | Terms link    │
│         © Business Name · Business Name/settings-driven  │
└─────────────────────────────────────────────────────────┘
                                                    [💬 WhatsApp]  ← floating, bottom-right, all pages
```

- Header/footer render from `includes/header.php` / `includes/footer.php` (one copy, not duplicated across 8 pages as today).
- WhatsApp number pulled from `settings.whatsapp_number` — floating button links to `https://wa.me/<number>`.

---

## 2. Homepage (`index.php`)

```
┌─────────────────────────────────────────────────────────┐
│               HERO BANNER (from `banners` table)          │
│         Headline · CTA "Browse Products" · CTA "Order Now"│
├─────────────────────────────────────────────────────────┤
│  [Category chip] [Category chip] [Category chip] ...     │  ← from `categories`, links into price-list.php?category=
├─────────────────────────────────────────────────────────┤
│  Featured Products                                        │
│  ┌────────┐ ┌────────┐ ┌────────┐ ┌────────┐             │
│  │ card   │ │ card   │ │ card   │ │ card   │  (is_featured│
│  └────────┘ └────────┘ └────────┘ └────────┘   =1, grid)  │
├─────────────────────────────────────────────────────────┤
│  About section (settings-driven text)                     │
├─────────────────────────────────────────────────────────┤
│  Contact strip: address / phone / email (settings-driven) │
└─────────────────────────────────────────────────────────┘
```

Product card:
```
┌──────────────────┐
│    [image]        │  lazy-loaded (loading="lazy")
│  Product Name      │
│  ~~₹MRP~~  ₹Final  │  final price = calculated (DATABASE_DESIGN.md)
│  [– 1 +] [Add to Cart] │  ← disabled/replaced by badge when status != available
│  [Out of Stock ▨]  │
└──────────────────┘
```

---

## 3. Price List (`price-list.php`)

```
┌─────────────────────────────────────────────────────────┐
│  🔍 [ Search products... ]     Category: [All ▾]          │
├─────────────────────────────────────────────────────────┤
│  ▾ Sparklers (31)                                          │
│  ┌────────┐ ┌────────┐ ┌────────┐ ┌────────┐              │
│  │ card   │ │ card   │ │ card   │ │ card   │  ...          │
│  └────────┘ └────────┘ └────────┘ └────────┘              │
│  ▾ Bombs (36)                                               │
│  ┌────────┐ ┌────────┐ ...                                 │
├─────────────────────────────────────────────────────────┤
│  [ Go to Place Order ]                                      │
└─────────────────────────────────────────────────────────┘
```

Grouped by category (collapsible sections), replacing the current flat 2,300-line table. Search filters client-side across the already-rendered grid (no page reload needed for a catalog this size) or server-side via query string if the catalog grows significantly later.

Mobile: card grid drops from 4 → 2 → 1 columns; category becomes a `<select>` dropdown instead of inline chips.

---

## 4. Place Order / Cart (`place-order.php`)

```
┌─────────────────────────────────────────────────────────┐
│  Your Order                                                │
├─────────────────────────────────────────────────────────┤
│  [img]  2.75 Kurvi        ₹8.00   [– 2 +]   ₹16.00  [✕]   │
│  [img]  Rocket Bomb       ₹70.00  [– 1 +]   ₹70.00  [✕]   │
│  ...                                                        │
├─────────────────────────────────────────────────────────┤
│                                    Subtotal:      ₹86.00   │
├─────────────────────────────────────────────────────────┤
│  Your Details                                               │
│  Name: [____]  Mobile: [____]  Email: [____]                │
│  Address: [______________________]                          │
│                                    [ Place Order ]           │
└─────────────────────────────────────────────────────────┘
```

Price/name fields are **display-only** (no editable inputs impersonating the price — closes the tampering surface documented in `SECURITY_REVIEW.md` §1). Quantity stepper is the only input per line.

Reached via "Add to Cart" buttons on `price-list.php` / `products-show.php` (confirmed flow — see `IMPLEMENTATION_PLAN.md` §4): this page is a cart review, not the entire catalog re-rendered as a form.

---

## 5. Order Confirmation (`order-placed.php`)

```
┌─────────────────────────────────────────────────────────┐
│  ✓ Thank you! Order #SC-2026-000123 received.              │
├─────────────────────────────────────────────────────────┤
│  Item                Qty   Price     Total                │
│  2.75 Kurvi            2   ₹8.00     ₹16.00                │
│  Rocket Bomb            1   ₹70.00    ₹70.00                │
│                                  Subtotal:  ₹86.00          │
├─────────────────────────────────────────────────────────┤
│  Payment: Bank transfer details (settings-driven)          │
│  Confirm via WhatsApp: [💬 Chat with us]                    │
└─────────────────────────────────────────────────────────┘
```

Actually shows the order (fixes the Phase 1 finding that this page currently displays generic static text with no order detail).

---

## 6. Admin Panel

### Login
```
┌───────────────────────┐
│      [Logo]            │
│   Admin Sign In        │
│   Username [______]    │
│   Password [______]    │
│         [ Sign In ]    │
└───────────────────────┘
```

### Shell (all admin pages after login)
```
┌───┬─────────────────────────────────────────────────────┐
│ ▤ │  Dashboard   Products   Categories   Orders   ▾more   │  ← top bar, admin name + logout
│ D │─────────────────────────────────────────────────────│
│ a │                                                        │
│ s │                  PAGE CONTENT                          │
│ h │                                                        │
│...│                                                        │
└───┴─────────────────────────────────────────────────────┘
     ↑ left sidebar nav (collapses to top bar on mobile)
```

### Dashboard
```
┌───────────┬───────────┬───────────┬───────────┐
│ Today's    │ Pending    │ Revenue    │ Out of     │
│ Orders: 12 │ Orders: 4  │ ₹18,400    │ Stock: 3   │
└───────────┴───────────┴───────────┴───────────┘
┌─────────────────────────┐ ┌─────────────────────────┐
│ Most Ordered Products     │ │ Recently Added Products   │
│ 1. Rocket Bomb (42)        │ │ ...                        │
│ 2. ...                     │ │                             │
└─────────────────────────┘ └─────────────────────────┘
```

### Products list
```
┌─────────────────────────────────────────────────────────┐
│ [+ Add Product]   🔍 [search]  Category:[▾] Status:[▾]     │
├─────────────────────────────────────────────────────────┤
│ ☐ | Img | SKU | Name | Category | MRP | Price | Stock |St.│ Actions
│ ☐ | 📷 | SC-001 | 2.75 Kurvi | Bombs | ₹40 | ₹8 | 0 | ✓ | ✎ 🗑│
│ ...                                                         │
├─────────────────────────────────────────────────────────┤
│ [Bulk: Mark Available ▾] [Apply]        « 1 2 3 ... »      │
└─────────────────────────────────────────────────────────┘
```

### Product add/edit form
```
Name [______]           SKU [______] (auto)     Category [▾]
Description [________________________________]
MRP [____]   Discount % [____] (blank = use global 80%)
             → Final price preview: ₹__.__ (live-calculated, read-only)
Image [Upload]  [current thumbnail]
Stock Qty [____]   Status [▾ available/out_of_stock/sold_out/hidden]
Display Order [____]   ☐ Featured Product
                                            [ Save ]  [ Cancel ]
```

### Orders list / detail
```
List:  #Order | Customer | Date | Items | Total | Status | Actions
Detail: customer info, line items table, status dropdown (writes audit_logs),
        admin notes textarea, [Save Status] [Print / Export]
```

---

## 7. Responsive Breakpoints

Following Bootstrap 5 defaults — no custom breakpoint system needed:

| Breakpoint | Product grid | Nav | Admin sidebar |
|---|---|---|---|
| `xs` (<576px) | 1 column | Hamburger | Collapsed / off-canvas |
| `sm`–`md` (576–991px) | 2 columns | Hamburger | Off-canvas |
| `lg`+ (≥992px) | 3–4 columns | Full inline nav | Persistent left sidebar |

All interactive controls (quantity steppers, category chips, admin action buttons) sized ≥44×44px touch targets per standard mobile-usability guidance.
