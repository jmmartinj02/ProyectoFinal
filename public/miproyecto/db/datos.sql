-- Insertar usuarios
INSERT INTO usuario (nombre, email, password, rol)
VALUES 
('Admin', 'admin@example.com', 'admin1234', 'admin'),
('Pedro', 'pedro@example.com', 'pedro1234', 'usuario'),
('Belen', 'belen@example.com', 'belen1234', 'usuario'),
('Jose', 'JMMartinJ@example.com', 'jose1234', 'usuario');

-- Insertar productos
INSERT INTO productos (nombre, descripcion, precio, imagen, tipo)
VALUES 
('Arnés de Escalada Indoor', 'Arnés cómodo y ligero para gimnasios.', 59.99, 'arnes_indoor.jpg', 'indoor'),
('Magnesera', 'Magnesera con cuerda y sistema molle', 14.85, 'magnesera.jpg', 'indoor'),
('Pies de Gato', 'Pies de gato de goma blanda, perfectos para cualquier agarre.', 54.99, 'piesgatoindoor.jpg', 'indoor'),
('Arnés de Escalada Exterior', 'Arnés robusto y resistente a la abrasión.', 34.00, 'arnes_clasica.jpg', 'clasica'),
('Pies de Gato', 'Pies de gato de goma rígida, para mayor durabilidad en roca', 60.00, 'piesgatoclasica.jpg', 'clasica'),
('Cuerda Dinámica', 'Cuerda de 80m, Alta resistencia a la abrasión.', 89.99, 'cuerda_clasica.jpg', 'clasica'),
('Botas Alta Montaña', 'Botas resistentes diseñadas para bajas temperaturas.', 59.99, 'botas.jpg', 'alta_montana'),
('Mosquetones', 'Pack de 5 mosquetones de alta resistencia.', 29.99, 'mosquetones.jpg', 'alta_montana'),
('Crampones', 'Crampones ligeros y flexibles para terrenos con hielo y nieve.', 19.90, 'crampon.jpg', 'alta_montana');

-- Insertar productos en el carrito
INSERT INTO carrito (usuario_id, producto_id, cantidad)
VALUES 
(2, 1, 1),  -- Usuario1 añade 1 Arnés de Escalada Indoor
(3, 8, 2),  -- Usuario1 añade 2 juegos de mosquetones
(4, 8, 2);  -- Usuario1 añade 2 juegos de mosquetones