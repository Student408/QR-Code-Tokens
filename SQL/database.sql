-- Create the database and table
CREATE DATABASE token_database;
USE token_database;
CREATE TABLE tokens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    token VARCHAR(255) UNIQUE
);

-- Insert some sample tokens
INSERT INTO tokens (token) VALUES
    ('abc123'),
    ('def456'),
    ('ghi789');