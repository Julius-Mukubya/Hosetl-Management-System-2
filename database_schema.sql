-- Hostel Management System Database Schema
-- Table creation SQL only

-- 1. OWNERS TABLE
CREATE TABLE `owners` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `contact_number` VARCHAR(20) NOT NULL,
    `email` VARCHAR(255) NOT NULL UNIQUE,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME,
    INDEX `idx_owner_email` (`email`),
    INDEX `idx_owner_contact` (`contact_number`)
);

-- 2. HOSTELS TABLE
CREATE TABLE `hostels` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `type` ENUM('Mixed', 'Boys', 'Girls') NOT NULL,
    `owner_id` INT NOT NULL,
    `status` ENUM('Active', 'Inactive', 'Pending', 'Suspended') DEFAULT 'Pending',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME,
    FOREIGN KEY (`owner_id`) REFERENCES `owners`(`id`) ON DELETE CASCADE,
    INDEX `idx_hostel_name` (`name`),
    INDEX `idx_hostel_type` (`type`),
    INDEX `idx_hostel_status` (`status`)
);

-- 3. HOSTEL_LOCATIONS TABLE
CREATE TABLE `hostel_locations` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `hostel_id` INT NOT NULL,
    `full_address` TEXT NOT NULL,
    `city` VARCHAR(100) NOT NULL,
    `landmarks` TEXT,
    `distance_from_campus` VARCHAR(50),
    `directions` TEXT,
    `latitude` DECIMAL(10, 8),
    `longitude` DECIMAL(11, 8),
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME,
    FOREIGN KEY (`hostel_id`) REFERENCES `hostels`(`id`) ON DELETE CASCADE,
    INDEX `idx_location_city` (`city`),
    INDEX `idx_location_coordinates` (`latitude`, `longitude`)
);

-- 4. HOSTEL_DESCRIPTIONS TABLE
CREATE TABLE `hostel_descriptions` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `hostel_id` INT NOT NULL,
    `overview` TEXT,
    `hostel_rules` TEXT,
    `check_in_time` TIME,
    `check_out_time` TIME,
    `security_features` TEXT,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME,
    FOREIGN KEY (`hostel_id`) REFERENCES `hostels`(`id`) ON DELETE CASCADE
);

-- 5. ROOM_TYPES TABLE
CREATE TABLE `room_types` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL UNIQUE,
    `description` TEXT,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 6. HOSTEL_ROOMS TABLE
CREATE TABLE `hostel_rooms` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `hostel_id` INT NOT NULL,
    `room_type_id` INT NOT NULL,
    `price` DECIMAL(10, 2) NOT NULL,
    `availability_count` INT NOT NULL DEFAULT 0,
    `furnishing` TEXT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME,
    FOREIGN KEY (`hostel_id`) REFERENCES `hostels`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`room_type_id`) REFERENCES `room_types`(`id`) ON DELETE CASCADE,
    UNIQUE KEY `unique_hostel_room_type` (`hostel_id`, `room_type_id`),
    INDEX `idx_room_price` (`price`),
    INDEX `idx_room_availability` (`availability_count`)
);

-- 7. FACILITIES TABLE
CREATE TABLE `facilities` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL UNIQUE,
    `category` ENUM('Basic', 'Premium', 'Security', 'Entertainment', 'Health') DEFAULT 'Basic',
    `icon` VARCHAR(50),
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 8. HOSTEL_FACILITIES TABLE
CREATE TABLE `hostel_facilities` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `hostel_id` INT NOT NULL,
    `facility_id` INT NOT NULL,
    `is_available` BOOLEAN DEFAULT TRUE,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`hostel_id`) REFERENCES `hostels`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`facility_id`) REFERENCES `facilities`(`id`) ON DELETE CASCADE,
    UNIQUE KEY `unique_hostel_facility` (`hostel_id`, `facility_id`)
);

-- 9. HOSTEL_PHOTOS TABLE
CREATE TABLE `hostel_photos` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `hostel_id` INT NOT NULL,
    `photo_type` ENUM('Front View', 'Room', 'Facility', 'Common Area', 'Exterior', 'Interior') NOT NULL,
    `file_name` VARCHAR(255) NOT NULL,
    `file_path` VARCHAR(500) NOT NULL,
    `file_size` INT,
    `mime_type` VARCHAR(100),
    `is_primary` BOOLEAN DEFAULT FALSE,
    `uploaded_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`hostel_id`) REFERENCES `hostels`(`id`) ON DELETE CASCADE,
    INDEX `idx_photo_type` (`photo_type`),
    INDEX `idx_photo_primary` (`is_primary`)
);

-- 10. BOOKING_POLICIES TABLE
CREATE TABLE `booking_policies` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `hostel_id` INT NOT NULL,
    `min_booking_duration` INT NOT NULL,
    `min_booking_unit` ENUM('Hours', 'Days', 'Weeks', 'Months') NOT NULL,
    `advance_payment_amount` DECIMAL(10, 2) NOT NULL,
    `advance_payment_currency` VARCHAR(10) NOT NULL,
    `refund_policy` TEXT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME,
    FOREIGN KEY (`hostel_id`) REFERENCES `hostels`(`id`) ON DELETE CASCADE
);

-- 11. PAYMENT_METHODS TABLE
CREATE TABLE `payment_methods` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL UNIQUE,
    `description` TEXT,
    `is_active` BOOLEAN DEFAULT TRUE,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 12. HOSTEL_PAYMENT_METHODS TABLE
CREATE TABLE `hostel_payment_methods` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `hostel_id` INT NOT NULL,
    `payment_method_id` INT NOT NULL,
    `is_available` BOOLEAN DEFAULT TRUE,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`hostel_id`) REFERENCES `hostels`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods`(`id`) ON DELETE CASCADE,
    UNIQUE KEY `unique_hostel_payment` (`hostel_id`, `payment_method_id`)
);

-- 13. AVAILABILITY_STATUS TABLE
CREATE TABLE `availability_status` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `hostel_id` INT NOT NULL,
    `is_available` BOOLEAN DEFAULT TRUE,
    `reason` TEXT,
    `available_from` DATETIME,
    `available_until` DATETIME,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME,
    FOREIGN KEY (`hostel_id`) REFERENCES `hostels`(`id`) ON DELETE CASCADE,
    INDEX `idx_availability_status` (`is_available`),
    INDEX `idx_availability_dates` (`available_from`, `available_until`)
);

-- 14. HOSTEL_DRAFTS TABLE
CREATE TABLE `hostel_drafts` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `owner_id` INT,
    `draft_data` TEXT NOT NULL,
    `current_step` INT DEFAULT 1,
    `last_saved` DATETIME,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME,
    FOREIGN KEY (`owner_id`) REFERENCES `owners`(`id`) ON DELETE SET NULL,
    INDEX `idx_draft_last_saved` (`last_saved`)
);

-- 15. USERS TABLE
CREATE TABLE `users` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `username` VARCHAR(50) NOT NULL UNIQUE,
    `email` VARCHAR(255) NOT NULL UNIQUE,
    `password_hash` VARCHAR(255) NOT NULL,
    `role` ENUM('admin', 'hostel_manager', 'owner') NOT NULL,
    `is_active` BOOLEAN DEFAULT TRUE,
    `last_login` DATETIME,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME,
    INDEX `idx_user_email` (`email`),
    INDEX `idx_user_role` (`role`)
);

-- 16. REVIEWS TABLE
CREATE TABLE `reviews` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `hostel_id` INT NOT NULL,
    `reviewer_name` VARCHAR(255) NOT NULL,
    `rating` INT NOT NULL CHECK (rating >= 1 AND rating <= 5),
    `comment` TEXT,
    `is_approved` BOOLEAN DEFAULT FALSE,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`hostel_id`) REFERENCES `hostels`(`id`) ON DELETE CASCADE,
    INDEX `idx_review_rating` (`rating`),
    INDEX `idx_review_approved` (`is_approved`)
);

-- 17. INQUIRIES TABLE
CREATE TABLE `inquiries` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `hostel_id` INT NOT NULL,
    `inquirer_name` VARCHAR(255) NOT NULL,
    `contact_number` VARCHAR(20) NOT NULL,
    `email` VARCHAR(255),
    `message` TEXT NOT NULL,
    `status` ENUM('New', 'In Progress', 'Responded', 'Closed') DEFAULT 'New',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME,
    FOREIGN KEY (`hostel_id`) REFERENCES `hostels`(`id`) ON DELETE CASCADE,
    INDEX `idx_inquiry_status` (`status`),
    INDEX `idx_inquiry_date` (`created_at`)
); 