<?php
require_once __DIR__ . '/../includes/header.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Escalada</title>
    <link rel="stylesheet" href="/miproyecto/styles.css"> <!-- Ruta al archivo CSS -->
</head>
<section class="añadir-producto">
    <h2>Añadir Nuevo Producto</h2>
    <?php if (isset($_SESSION['mensaje'])): ?>
        <p class="success"><?= htmlspecialchars($_SESSION['mensaje']) ?></p>
        <?php unset($_SESSION['mensaje']); ?>
    <?php endif; ?>
    <?php if (isset($_SESSION['error'])): ?>
        <p class="error"><?= htmlspecialchars($_SESSION['error']) ?></p>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>
    <form method="POST" action="index.php?action=admin" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required></textarea>

        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" step="0.01" required>

        <label for="imagen">Imagen:</label>
        <input type="file" id="imagen" name="imagen" accept="image/*" required>

        <label for="tipo">Tipo:</label>
        <select id="tipo" name="tipo" required>
            <option value="indoor">Indoor</option>
            <option value="clasica">Clásica/Deportiva</option>
            <option value="alta_montana">Alta Montaña</option>
        </select>

        <button type="submit">Añadir Producto</button>
    </form>
</section>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>