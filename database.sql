CREATE DATABASE IF NOT EXISTS kuppiya_db;
USE kuppiya_db;

-- Users Table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('admin', 'student') DEFAULT 'student',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Assignments/Products Table
CREATE TABLE IF NOT EXISTS assignments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    description TEXT,
    category VARCHAR(50),
    price DECIMAL(10, 2) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    author_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (author_id) REFERENCES users(id) ON DELETE SET NULL
);

-- Purchases Table
CREATE TABLE IF NOT EXISTS purchases (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    assignment_id INT NOT NULL,
    purchase_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (assignment_id) REFERENCES assignments(id) ON DELETE CASCADE
);

-- Mock Admin User (Password: admin123)
INSERT INTO users (username, email, password_hash, role) 
VALUES ('admin', 'admin@kuppiya.com', '$2y$10$w8.bZJt25T41RKVV6l2A3u2RIf8mG//96dOMgI49Kq2RvyB3L993q', 'admin')
ON DUPLICATE KEY UPDATE id=id;

-- Mock Sample Products
INSERT INTO assignments (title, description, category, price, file_path, author_id) VALUES
('Data Structures & Algorithms', 'Comprehensive assignment covering tree traversals, graphs, and dynamic programming with Java.', 'Computer Science', 24.99, 'mock_file.zip', 1),
('Marketing Strategies Report', 'A 20-page detailed report on modern digital marketing campaigns and ROI analysis.', 'Business', 19.50, 'mock_file.pdf', 1),
('Web Development Basics', 'Introduction to semantic HTML, CSS styling, and basic JavaScript logic.', 'Computer Science', 15.00, 'mock_file.zip', 1)
ON DUPLICATE KEY UPDATE id=id;
