-- SQL script to create the necessary database tables and seed initial data for the FramedSoul application

-- Create the database
CREATE DATABASE IF NOT EXISTS framed_soul;

-- Use the created database
USE framed_soul;

-- Create the images table
CREATE TABLE IF NOT EXISTS images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    image_path VARCHAR(255) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create the users table (for admin login)
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert a default admin user (change the password as needed)
INSERT INTO users (username, password) VALUES ('admin', '$2y$10$e0N5g5Z5g5Z5g5Z5g5Z5g5Z5g5Z5g5Z5g5Z5g5Z5g5Z5g5Z5g5Z5');

-- Note: The password above is a hashed version of 'password'. Use a password hashing function to create your own.