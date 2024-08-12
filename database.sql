CREATE DATABASE password_check;

USE password_check;

CREATE TABLE passwords (
    id INT AUTO_INCREMENT PRIMARY KEY,
    password_hash VARCHAR(255) NOT NULL
);
