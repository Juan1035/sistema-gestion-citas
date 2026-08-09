CREATE DATABASE IF NOT EXISTS sistema_gestion_citas;
USE sistema_gestion_citas;

CREATE TABLE citas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_cliente VARCHAR(100) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    correo VARCHAR(100) DEFAULT NULL,
    servicio VARCHAR(100) NOT NULL,
    fecha DATE NOT NULL,
    hora TIME NOT NULL,
    notas_adicionales TEXT DEFAULT NULL,
    google_event_id VARCHAR(255) DEFAULT NULL,
    estado ENUM('Pendiente', 'Confirmada', 'Cancelada') NOT NULL DEFAULT 'Pendiente',
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);