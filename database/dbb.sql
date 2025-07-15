CREATE DATABASE IF NOT EXISTS fortune_cookie_db;
USE fortune_cookie_db;

-- Users table
CREATE TABLE `users` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(100) NOT NULL,
    `email` varchar(100) NOT NULL,
    `password` varchar(255) NOT NULL,
    `role` varchar(50) NOT NULL DEFAULT 'user', -- 'user' or 'admin'
    PRIMARY KEY (`id`),
    UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Phrases table
CREATE TABLE `phrases` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `text` text NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Sample data
INSERT INTO `users` (`name`, `email`, `password`, `role`) VALUES
    ('Admin', 'admin@mail.com', '$2y$10$tu_hash_seguro_aqui', 'admin'), -- ¡Genera tu propio hash!
    ('Usuario', 'usuario@mail.com', '$2y$10$otro_hash_seguro_aqui', 'user');

INSERT INTO `phrases` (`text`) VALUES
    ('El que madruga, encuentra todo cerrado.'),
    ('No por mucho madrugar amanece más temprano.'),
    ('La paciencia es un árbol de raíz amarga pero de frutos muy dulces.');
