CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    gender ENUM('male', 'female') NOT NULL,
    weight DECIMAL(5,2) NOT NULL, -- in kilograms
    height DECIMAL(5,2) NOT NULL, -- in centimeters
    activity_level ENUM('sedentary', 'light', 'moderate', 'active') NOT NULL,
    goal ENUM('lose', 'maintain', 'gain') NOT NULL,
    dietary_preference VARCHAR(255),
    bmr DECIMAL(6,2) NOT NULL,
    tdee DECIMAL(6,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
