-- Seed data: settings (Website Settings module)
-- Values carried over as-is from the current live site so nothing changes
-- visually at migration time; every value below becomes admin-editable.

INSERT INTO settings (setting_key, setting_value) VALUES
    ('business_name', 'SRI VINAYAGA CRACKERS'),
    ('site_tagline', 'Sivakasi Cracker'),
    ('phone', '+91 95979 94120'),
    ('whatsapp', '919597994120'),
    ('whatsapp_detail', 'S. Siva Prakash (MBA)\nTamil   +91-81900 10528\nEnglish +91-81900 10528\nTelugu  +91-94424 19136\nHindi   +91-81900 10528'),
    ('email', 'shivatraders6@gmail.com'),
    ('address', 'SRI VINAYAGA CRACKERS,\n5/288/13, KAMARAJ NAGAR,\nANUPANKULAM VILLAGE\nSivakasi, Tamil Nadu'),
    ('footer_text', 'SRI VINAYAGA CRACKERS. All Rights Reserved'),
    ('social_facebook', ''),
    ('social_twitter', ''),
    ('social_instagram', ''),
    ('social_linkedin', ''),
    ('global_discount_percent', '80'),
    ('bank1_details', 'Karur Vysya Bank\nS. Siva Prakash\nA/C No: 1261155000095205\nIFSC Code: KVBL0001261\nBranch: Sivakasi\nType: Savings'),
    ('bank2_details', 'AXIS Bank\nS. Siva Prakash\nA/C No: 913010049074945\nIFSC Code: UTIB0000089\nBranch: Sivakasi\nType: Savings'),
    ('terms_conditions', 'Cash on Delivery available for Selected Cities Only.\n5% Cash Discount till Diwali. (Not Available for Cash on Delivery)\nMinimum purchase order is Rs.2500/-.\nDue to heavy orders in peak season some product may go out of stock; after a confirmation call, we will supply a different product within the same price.\nAny disputes in the order shall be subject to Sivakasi jurisdiction.'),
    ('about_heading', 'We, Sri Vinayaga Crackers are in the fireworks field since 1976.'),
    ('about_text', 'Welcome to SivakasiCracker.com. We are a leading online fireworks seller in India. We have decades of experience in fireworks and aim to delight customers with quality fireworks at a fair price without compromising on quality.\n\nWe are one of the leading suppliers of crackers for both wholesalers and retailers, through online and offline modes. Through our agencies we supply to all four South Indian states and North India including Madhya Pradesh, Maharashtra, Gujarat, Odisha and more.');
