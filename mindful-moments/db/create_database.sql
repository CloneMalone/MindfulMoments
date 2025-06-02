-- Create the mindful_moments database
DROP DATABASE IF EXISTS mindful_moments;
CREATE DATABASE mindful_moments;
USE mindful_moments;

-- Create tables
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE entries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    mood VARCHAR(50) NOT NULL,
    notes TEXT,
    entry_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Create Admin User
DROP USER IF EXISTS 'mindful_moments_admin'@'localhost';
CREATE USER 'mindful_moments_admin'@'localhost' IDENTIFIED BY 'pickl3dp!zz@';

GRANT SELECT, INSERT, DELETE, UPDATE, ALTER
ON mindful_moments.*
TO mindful_moments_admin@localhost;