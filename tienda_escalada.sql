-- Volcando estructura de base de datos para tienda_escalada
CREATE DATABASE IF NOT EXISTS `tienda_escalada` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;
USE `tienda_escalada`;

-- Volcando estructura para tabla tienda_escalada.carrito
CREATE TABLE IF NOT EXISTS `carrito` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `producto_id` (`producto_id`),
  CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla tienda_escalada.carrito: ~4 rows (aproximadamente)
INSERT INTO `carrito` (`id`, `usuario_id`, `producto_id`, `cantidad`) VALUES
	(2, 3, 8, 2),
	(3, 4, 8, 2),
	(6, 1, 8, 1),
	(14, 5, 1, 1);

-- Volcando estructura para tabla tienda_escalada.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `tipo` enum('indoor','clasica','alta_montana') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla tienda_escalada.productos: ~9 rows (aproximadamente)
INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `imagen`, `tipo`) VALUES
	(1, 'Arnés de Escalada Indoor', 'Arnés cómodo y ligero para gimnasios.', 59.99, 'arnes_indoor.jpg', 'indoor'),
	(2, 'Magnesera', 'Magnesera con cuerda y sistema molle', 14.85, 'magnesera.jpg', 'indoor'),
	(3, 'Pies de Gato', 'Pies de gato de goma blanda, perfectos para cualquier agarre.', 54.99, 'piesgatoindoor.jpg', 'indoor'),
	(4, 'Arnés de Escalada Exterior', 'Arnés robusto y resistente a la abrasión.', 34.25, 'arnes_clasica.jpg', 'clasica'),
	(5, 'Pies de Gato', 'Pies de gato de goma rígida, para mayor durabilidad en roca', 60.50, 'piesgatoclasica.jpg', 'clasica'),
	(6, 'Cuerda Dinámica', 'Cuerda de 80m, Alta resistencia a la abrasión.', 89.99, 'cuerda_clasica.jpg', 'clasica'),
	(7, 'Botas Alta Montaña', 'Botas resistentes diseñadas para bajas temperaturas.', 59.99, 'botas.jpg', 'alta_montana'),
	(8, 'Mosquetones', 'Pack de 5 mosquetones de alta resistencia.', 29.99, 'mosquetones.jpg', 'alta_montana'),
	(9, 'Crampones', 'Crampones ligeros y flexibles para terrenos con hielo y nieve.', 19.95, 'crampon.jpg', 'alta_montana'),
	(10, 'Magnesio liquido', 'Magnesio liquido para mejorar agarre en superficies lisas', 14.95, 'magnesioliquido.jpg', 'clasica'),
	(11, 'Bola de magnesio', 'Bola de magnesio perfecta para evitar su desperdicio y controlar facilmente la cantidad utilizada', 9.95, 'bolamagnesio.jpg', 'indoor'),
	(12, 'Par de Piolets', 'Juego de dos piolets técnicos, ideales para escalada en hielo y montañismo avanzado.', 249.99, 'piolet.jpg', 'alta_montana');

-- Volcando estructura para tabla tienda_escalada.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` enum('admin','usuario') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla tienda_escalada.usuarios: ~6 rows (aproximadamente)
INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `rol`) VALUES
	(1, 'Admin', 'admin@example.com', 'admin1234', 'admin'),
	(2, 'Pedro', 'pedro@example.com', 'pedro1234', 'usuario'),
	(3, 'Belen', 'belen@example.com', 'belen1234', 'usuario'),
	(4, 'Jose', 'JMMartinJ@example.com', 'jose1234', 'usuario'),
	(5, 'Manolito', 'manolito@example.com', 'manolito1234', 'usuario'),
	(6, 'adminprueba', 'adminprueba@example.com', 'adminprueba1234', 'admin');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
