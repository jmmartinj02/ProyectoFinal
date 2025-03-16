<?php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Escalada</title>
    <link rel="stylesheet" href="/miproyecto/styles.css">
</head>
<body>
    <header>
        <h1>Tienda de Escalada</h1>
        <nav>
            <ul>
                <li><a href="index.php?action=inicio">Inicio</a></li>
                <li>
                    <a href="index.php?action=productos">Productos</a>
                    <ul>
                        <li><a href="index.php?action=productos&tipo=indoor">Indoor</a></li>
                        <li><a href="index.php?action=productos&tipo=clasica">Clásica/Deportiva</a></li>
                        <li><a href="index.php?action=productos&tipo=alta_montana">Alta Montaña</a></li>
                    </ul>
                </li>
                <li><a href="#">Contacto</a></li>
                <li><a href="index.php?action=carrito">Carrito</a></li>
                <?php if (isset($_SESSION['usuario'])): ?>
                    <?php if ($_SESSION['rol'] === 'admin'): ?>
                        <li><a href="index.php?action=admin">Administración</a></li>
                    <?php endif; ?>
                    <li><a href="index.php?action=logout">Cerrar Sesión</a></li>
                <?php else: ?>
                    <li><a href="index.php?action=login">Iniciar Sesión</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <main>