<?php
require_once __DIR__ . '/../includes/header.php';
?>

<section class="productos-recomendados">
    <h2><?= htmlspecialchars($titulo) ?></h2>
    <div class="productos">
        <?php if (!empty($productos)): ?>
            <?php foreach ($productos as $producto): ?>
                <div class="producto">
                    <!-- Enlace a la vista detallada del producto (solo imagen y nombre) -->
                    <a href="index.php?action=ver_producto&id=<?= $producto['id'] ?>">
                    <img src="/miproyecto/imagenes/<?= htmlspecialchars($producto['imagen']) ?>"
                    alt="<?= htmlspecialchars($producto['nombre']) ?>"></h3>
                    </a>
                    <!-- Precio fuera del enlace -->
                    <p>Precio: <?= htmlspecialchars($producto['precio']) ?>€</p>
                    <!-- Botón para añadir al carrito -->
                    <form method="POST" action="index.php?action=añadir_al_carrito">
                        <input type="hidden" name="producto_id" value="<?= $producto['id'] ?>">
                        <button type="submit" name="añadir">Añadir al carrito</button>
                    </form>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay productos disponibles en esta categoría.</p>
        <?php endif; ?>
    </div>
</section>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>