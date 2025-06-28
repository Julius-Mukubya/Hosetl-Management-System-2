-- Populate default data for Hostel Management System
-- Run this after creating the database schema

-- Insert default room types
INSERT IGNORE INTO room_types (name) VALUES 
('Single Room'),
('Shared Room (2 beds)'),
('Shared Room (3 beds)'),
('Shared Room (4 beds)');

-- Insert default facilities
INSERT IGNORE INTO facilities (name, category) VALUES 
('Wi-Fi', 'Basic'),
('Electricity Backup / Generator', 'Basic'),
('Laundry Services', 'Basic'),
('Meals', 'Basic'),
('Security Guard', 'Security'),
('CCTV Cameras', 'Security'),
('Air Conditioning', 'Premium'),
('Hot Water', 'Basic'),
('Kitchen Access', 'Basic'),
('Study Room', 'Basic'),
('Common Lounge', 'Basic'),
('Parking Space', 'Basic'),
('Gym Access', 'Premium'),
('Swimming Pool', 'Premium'),
('Garden/Outdoor Space', 'Basic');

-- Insert default payment methods
INSERT IGNORE INTO payment_methods (name, description) VALUES 
('Cash', 'Cash payment on site'),
('Mobile Money', 'Mobile money transfer (MTN, Airtel, etc.)'),
('Bank Transfer', 'Direct bank transfer'),
('Credit Card', 'Credit or debit card payment'),
('PayPal', 'Online payment via PayPal'),
('Check', 'Payment by check');

-- Insert some sample users (optional - for testing)
INSERT IGNORE INTO users (username, email, password_hash, role) VALUES 
('admin', 'admin@hostel.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
('manager1', 'manager@hostel.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'hostel_manager'),
('owner1', 'owner@hostel.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'owner');

-- Note: The password hash above is for 'password' - change this in production 