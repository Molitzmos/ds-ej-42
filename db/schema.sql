-- Script de creación de Base de Datos y Tabla Fiesta
-- Base de Datos
CREATE DATABASE IF NOT EXISTS arq_2026;
USE arq_2026;

-- Tabla Fiestas
CREATE TABLE IF NOT EXISTS fiestas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    lugar VARCHAR(100) NOT NULL,
    fecha DATE NOT NULL,
    hora TIME NOT NULL,
    capacidad INT NOT NULL,
    precioEntrada DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Datos de ejemplo (opcional)
INSERT INTO fiestas (nombre, lugar, fecha, hora, capacidad, precioEntrada) VALUES
('Fiesta de Cumpleaños', 'Casa de Juan', '2023-12-25', '18:00:00', 50, 20.00),
('Concierto de Rock', 'Estadio Municipal', '2024-01-15', '20:00:00', 1000, 50.00),
('Festival de Música', 'Parque Central', '2024-02-20', '14:00:00', 500, 30.00);
