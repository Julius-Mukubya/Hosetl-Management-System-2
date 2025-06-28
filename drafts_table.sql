-- HOSTEL_DRAFTS TABLE
-- Stores draft data for incomplete hostel registrations

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