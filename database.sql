-- actTogether Database Schema
CREATE DATABASE IF NOT EXISTS act2gether;
USE act2gether;

-- Users table
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    avatar VARCHAR(255),
    points INT DEFAULT 0,
    level INT DEFAULT 1,
    status ENUM('active', 'inactive', 'banned') DEFAULT 'active',
    email_verified BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Events table
CREATE TABLE events (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(200) NOT NULL,
    description TEXT NOT NULL,
    short_description VARCHAR(500),
    event_date DATETIME NOT NULL,
    location VARCHAR(200) NOT NULL,
    points_reward INT NOT NULL DEFAULT 0,
    max_participants INT NOT NULL,
    current_participants INT DEFAULT 0,
    image VARCHAR(255),
    category ENUM('environment', 'education', 'health', 'community', 'sports', 'culture') DEFAULT 'community',
    status ENUM('draft', 'published', 'cancelled', 'completed') DEFAULT 'published',
    created_by INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE SET NULL
);

-- Event registrations table
CREATE TABLE registrations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    event_id INT NOT NULL,
    status ENUM('registered', 'attended', 'cancelled', 'no_show') DEFAULT 'registered',
    points_earned INT DEFAULT 0,
    feedback TEXT,
    rating INT CHECK (rating >= 1 AND rating <= 5),
    registered_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (event_id) REFERENCES events(id) ON DELETE CASCADE,
    UNIQUE KEY unique_registration (user_id, event_id)
);

-- Partners table
CREATE TABLE partners (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    logo VARCHAR(255),
    description TEXT,
    website VARCHAR(255),
    contact_email VARCHAR(100),
    contact_phone VARCHAR(20),
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Rewards table
CREATE TABLE rewards (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(200) NOT NULL,
    description TEXT,
    points_cost INT NOT NULL,
    partner_id INT NOT NULL,
    image VARCHAR(255),
    category VARCHAR(50),
    stock_quantity INT DEFAULT -1, -- -1 means unlimited
    status ENUM('active', 'inactive', 'out_of_stock') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (partner_id) REFERENCES partners(id) ON DELETE CASCADE
);

-- Reward redemptions table
CREATE TABLE redemptions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    reward_id INT NOT NULL,
    points_spent INT NOT NULL,
    status ENUM('pending', 'approved', 'delivered', 'cancelled') DEFAULT 'pending',
    redemption_code VARCHAR(50) UNIQUE,
    notes TEXT,
    redeemed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (reward_id) REFERENCES rewards(id) ON DELETE CASCADE
);

-- Notifications table
CREATE TABLE notifications (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    title VARCHAR(200) NOT NULL,
    message TEXT NOT NULL,
    type ENUM('event', 'reward', 'system', 'achievement') DEFAULT 'system',
    is_read BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Create indexes for better performance
CREATE INDEX idx_users_email ON users(email);
CREATE INDEX idx_events_date ON events(event_date);
CREATE INDEX idx_events_status ON events(status);
CREATE INDEX idx_registrations_user ON registrations(user_id);
CREATE INDEX idx_registrations_event ON registrations(event_id);
CREATE INDEX idx_notifications_user ON notifications(user_id, is_read);