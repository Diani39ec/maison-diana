-- =====================================================
-- AURELIA · MySQL 8+ · © Diana Trujillo
-- Base: maison_db (utf8mb4)
-- =====================================================
CREATE DATABASE IF NOT EXISTS maison_db
  CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE maison_db;

CREATE TABLE IF NOT EXISTS productos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  categoria ENUM('elegance','urban','artesanal') NOT NULL,
  precio DECIMAL(10,2) NOT NULL,
  foto_url VARCHAR(255) NOT NULL,
  foto_alt VARCHAR(150) NOT NULL,
  destacado TINYINT(1) DEFAULT 0
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS pedidos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(120) NOT NULL,
  telefono VARCHAR(40) NOT NULL,
  items TEXT NOT NULL,
  total DECIMAL(10,2) NOT NULL,
  estado ENUM('nuevo','confirmado','enviado') DEFAULT 'nuevo',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  INDEX idx_estado (estado)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS newsletter (
  id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(150) NOT NULL UNIQUE,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

INSERT INTO productos (nombre, categoria, precio, foto_url, foto_alt, destacado) VALUES
('Abrigo Milano', 'elegance', 289.00, 'https://images.unsplash.com/photo-1539109136881-3be0616acf4b?q=80&w=800&auto=format&fit=crop', 'Abrigo celeste elegante en Milán', 1),
('Conjunto Urban Sol', 'urban', 129.00, 'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=800&auto=format&fit=crop', 'Conjunto deportivo amarillo', 1),
('Poncho Artesanal', 'artesanal', 95.00, 'https://images.unsplash.com/photo-1434389677669-e08b4cac3105?q=80&w=800&auto=format&fit=crop', 'Poncho tejido color marfil', 0),
('Vestido Riviera', 'elegance', 149.00, 'https://images.unsplash.com/photo-1469334031218-e382a71b716b?q=80&w=800&auto=format&fit=crop', 'Vestido verde editorial', 0),
('Set Street Chic', 'urban', 119.00, 'https://images.unsplash.com/photo-1529139574466-a303027c1d8b?q=80&w=800&auto=format&fit=crop', 'Look urbano con gafas de sol', 0),
('Colección Esencial', 'artesanal', 59.00, 'https://images.unsplash.com/photo-1490481651871-ab68de25d43d?q=80&w=800&auto=format&fit=crop', 'Perchero con prendas esenciales', 0)
ON DUPLICATE KEY UPDATE nombre = VALUES(nombre);
