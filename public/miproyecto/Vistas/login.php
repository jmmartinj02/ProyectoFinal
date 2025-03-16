<?php
require_once __DIR__ . '/../includes/header.php';
?>
<section class="login">
    <h2>Iniciar Sesión</h2>
    <?php if (isset($error)): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <form method="POST" action="index.php?action=login">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" required>
        <button type="submit">Iniciar Sesión</button>
    </form>
</section>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>