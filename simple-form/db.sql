CREATE DATABASE IF NOT EXISTS simple_form;
USE simple_form;

CREATE TABLE IF NOT EXISTS personal_info (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    phone VARCHAR(15)
);
