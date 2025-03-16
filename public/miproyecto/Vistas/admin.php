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
<body></body>
<section class="admin">
    <h2>Crear Nuevo Usuario</h2>
    <?php if (isset($mensaje)): ?>
        <p class="success"><?= htmlspecialchars($mensaje) ?></p>
    <?php endif; ?>
    <?php if (isset($error)): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <form method="POST" action="index.php?action=admin">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <label for="password">Contraseña:</label>
        <input type="text" name="password" required>
        <label for="rol">Rol:</label>
        <select name="rol" required>
            <option value="usuario">Usuario</option>
            <option value="admin">Admin</option>
        </select>
        <button type="submit">Crear Usuario</button>
    </form>
</section>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>