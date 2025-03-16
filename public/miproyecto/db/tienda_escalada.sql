USE tienda_escalada;

-- Eliminar la tabla 'usuario' si existe
DROP TABLE IF EXISTS usuario;
DROP TABLE IF EXISTS usuarios;

-- Crear la tabla 'usuario'
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    rol ENUM('admin', 'usuario') NOT NULL
);

-- Eliminar la tabla 'productos' si existe
DROP TABLE IF EXISTS productos;

-- Crear la tabla 'productos'
CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    imagen VARCHAR(255) NOT NULL,
    tipo ENUM('indoor', 'clasica', 'alta_montana') NOT NULL
);

-- Eliminar la tabla 'carrito' si existe
DROP TABLE IF EXISTS carrito;

-- Crear la tabla 'carrito'
CREATE TABLE carrito (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    producto_id INT NOT NULL,
    cantidad INT NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (producto_id) REFERENCES productos(id)
);