# CLAUDE.md

# Sivakasi Cracker Store Modernization Project

## Project Overview

You are working on modernizing an existing PHP-based e-commerce website hosted on MilesWeb.

Website:
https://www.sivakasicracker.com

The existing application is a static PHP website where products, prices, discounts and availability are directly hardcoded into PHP files.

The goal is to convert this into a fully data-driven application while preserving the existing business functionality and ensuring compatibility with MilesWeb shared hosting.

---

# Primary Objectives

Your responsibilities include:

- Analyze the existing project before making changes.
- Preserve existing functionality.
- Modernize the UI.
- Make the application mobile responsive.
- Remove all hardcoded product information.
- Introduce MySQL as the backend database.
- Develop a secure Admin Panel.
- Improve maintainability and scalability.
- Ensure backward compatibility wherever possible.

---

# IMPORTANT RULES

## Rule 1

Never immediately start modifying files.

Always begin with analysis.

Generate documentation first.

---

## Rule 2

Do not delete existing functionality unless explicitly approved.

---

## Rule 3

Preserve URLs whenever practical to avoid SEO impact.

---

## Rule 4

Do not hardcode:

- Product Name
- Price
- Discount
- Categories
- Images
- Availability
- Stock

Everything must come from MySQL.

---

## Rule 5

Never duplicate code.

Always create reusable components.

---

## Rule 6

Do not introduce Laravel or other heavyweight frameworks unless specifically requested.

This application must remain deployable on standard MilesWeb shared hosting.

---

# Phase 1 — Project Assessment

Before writing code, inspect the entire project.

Review:

- Folder structure
- PHP pages
- Includes
- JavaScript
- CSS
- Images
- Assets
- Existing order flow
- Navigation
- Email functionality
- Forms

Generate:

```
docs/
    MODERNIZATION_PLAN.md
```

The report should include:

- Current Architecture
- Existing Features
- Hardcoded Areas
- Risks
- Technical Debt
- Migration Strategy
- Estimated Work Breakdown

Do not proceed until this document is complete.

---

# Phase 2 — Architecture Design

Design a clean architecture suitable for future expansion.

Preferred stack:

- PHP 8+
- MySQL
- Bootstrap 5
- HTML5
- CSS3
- JavaScript (Vanilla)
- PDO
- Responsive Design

Avoid unnecessary dependencies.

---

# Database Design

Design a normalized relational database.

Recommended tables:

products

categories

orders

order_items

admin_users

settings

banners

contact_messages

audit_logs

Include:

- Primary Keys
- Foreign Keys
- Indexes
- created_at
- updated_at

Generate

```
database/schema.sql
```

---

# Products

The Products module should support:

- Product Name
- SKU
- Category
- Description
- MRP
- Selling Price
- Discount %
- Final Price (calculated)
- Image
- Stock Quantity
- Status
- Display Order
- Featured Product
- Created Date
- Updated Date

No values should be hardcoded.

---

# Categories

Categories must be editable.

Examples:

- Gift Boxes
- Sparklers
- Flower Pots
- Rockets
- Bombs
- Ground Chakkars
- Kids Crackers
- Fancy Crackers
- New Arrivals

Categories should support:

- Display Order
- Status
- Image (optional)

---

# Discount Management

Support:

Global Discount

OR

Product Discount

Admin should be able to change discounts without editing code.

The displayed selling price must be calculated dynamically.

---

# Inventory

Every product should support:

- Available
- Out of Stock
- Sold Out
- Hidden

Inventory should be editable from Admin.

---

# Customer Features

Customer should be able to:

Browse Products

Search Products

Filter Categories

View Details

Add to Cart

Update Cart

Checkout

Submit Order

Receive Email Confirmation

---

# Orders

Store every order in MySQL.

Order lifecycle:

Pending

Confirmed

Packed

Dispatched

Delivered

Cancelled

Admin should be able to update order status.

---

# Email

After successful order:

Email Customer

Email Admin

Emails should be HTML formatted.

Templates should be reusable.

---

# Admin Panel

Create a secure Admin Panel.

Modules:

Dashboard

Products

Categories

Orders

Discount Management

Banner Management

Website Settings

Users

Reports

---

## Product Management

Admin can

Add Product

Edit Product

Delete Product

Upload Images

Update Prices

Update Discounts

Update Stock

Hide Products

Mark Sold Out

Bulk Update

---

## Dashboard

Display

Today's Orders

Pending Orders

Revenue

Most Ordered Products

Out of Stock

Recently Added Products

---

## Reports

Provide

Orders by Date

Top Selling Products

Revenue Summary

Low Stock Report

Export CSV

---

# Website Settings

Configurable:

Business Name

Phone Number

WhatsApp

Email

Address

Footer Text

Festival Banner

Header Banner

Social Media Links

Global Discount

---

# UI Modernization

The website should have a modern shopping experience.

Requirements:

Responsive Layout

Bootstrap 5

Modern Cards

Hero Banner

Search

Category Filters

Sticky Header

Floating WhatsApp Button

Modern Footer

Fast Loading

Lazy Loading Images

Minimal Animations

---

# Mobile First

The application must work on:

Desktop

Tablet

Android

iPhone

Support:

Chrome

Safari

Firefox

Edge

---

# Coding Standards

Use:

PDO Prepared Statements

Reusable PHP Includes

Configuration Files

Environment Variables where appropriate

Reusable Classes

Input Validation

Output Escaping

Meaningful Names

No duplicated HTML

No inline CSS

No inline JavaScript

Follow PSR-12 coding standards where practical.

---

# Folder Structure

Target structure:

```
admin/
api/
assets/
    css/
    js/
    images/
classes/
config/
database/
docs/
includes/
logs/
templates/
uploads/
vendor/
```

Keep business logic separate from presentation.

---

# Security

Implement:

Prepared Statements

Password Hashing

Session Management

CSRF Protection

XSS Protection

Input Validation

Output Escaping

Admin Authentication

Secure File Uploads

---

# Performance

Optimize:

Images

CSS

JavaScript

Database Queries

Caching Headers

Compression

Reusable Includes

Minimize HTTP Requests

---

# Migration Strategy

This website is currently live.

Migration should be incremental.

Do not break the production website.

Develop in phases.

Keep existing URLs where possible.

Provide rollback recommendations.

---

# Deliverables

Before implementation generate:

```
docs/
    MODERNIZATION_PLAN.md
    DATABASE_DESIGN.md
    IMPLEMENTATION_PLAN.md
    UI_WIREFRAMES.md
    SECURITY_REVIEW.md
    MIGRATION_PLAN.md
```

Generate SQL:

```
database/schema.sql
```

---

# Development Workflow

For every feature:

1. Analyze
2. Design
3. Explain approach
4. Implement
5. Test
6. Refactor
7. Document

Never skip documentation.

---

# Coding Philosophy

Prioritize:

Maintainability

Readability

Scalability

Performance

Security

Responsive Design

Clean Architecture

Avoid unnecessary complexity.

Always prefer modular, reusable, well-documented code.

---

# Final Goal

Transform the existing static PHP cracker ordering website into a modern, responsive, secure, database-driven e-commerce platform with:

- Dynamic Product Management
- Inventory Management
- Discount Management
- Secure Admin Panel
- Order Management
- Email Notifications
- Mobile-Friendly UI
- Clean Architecture
- Future Scalability

The final solution should remain lightweight, easy to maintain, and fully compatible with MilesWeb shared hosting.