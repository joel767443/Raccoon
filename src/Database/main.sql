CREATE DATABASE raccoon;
use raccoon;
CREATE TABLE items
(
    id           INT AUTO_INCREMENT PRIMARY KEY,
    name         VARCHAR(255) NOT NULL,
    description  TEXT,
    brand        VARCHAR(100),
    color        VARCHAR(50),
    checked      BOOLEAN,
    price        DECIMAL(10, 2),
    availability VARCHAR(20)
);

INSERT INTO items (name, description, brand, color, checked, price, availability)
VALUES ('Laptop', 'Powerful and lightweight', NULL, 'Silver', 0, 999.99, NULL),
       ('Smartphone', 'High-end mobile device', NULL, 'Black', 0, 699.99, NULL),
       ('Running Shoes', 'Comfortable athletic shoes', NULL, 'Blue', 0, 79.99, NULL),
       ('Coffee Maker', 'Automatic drip coffee machine', NULL, 'Red', 0, 49.99, NULL),
       ('Bluetooth Earbuds', 'Wireless earphones with noise cancellation', NULL, 'White', 0, 129.99, NULL),
       ('Backpack', 'Spacious and durable backpack', NULL, 'Green', 0, 59.99, NULL),
       ('Digital Camera', 'High-resolution camera with zoom', NULL, 'Black', 0, 499.99, NULL),
       ('Desk Chair', 'Ergonomic office chair', NULL, 'Gray', 0, 149.99, NULL),
       ('T-shirt', 'Casual cotton t-shirt', NULL, 'Navy', 0, 19.99, NULL),
       ('Headphones', 'Over-ear headphones with deep bass', NULL, 'Silver', 0, 89.99, NULL);
