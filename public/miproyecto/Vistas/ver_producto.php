<?php
require_once __DIR__ . '/../includes/header.php';
?>
<section class="producto-detalle">
    <?php if ($producto): ?>
        <div class="producto">
            <!-- Imagen del producto -->
            <img src="/miproyecto/imagenes/<?= htmlspecialchars($producto['imagen']) ?>"
            alt="<?= htmlspecialchars($producto['nombre']) ?>">
            <!-- Información del producto -->
            <div class="info">
                <h2><?= htmlspecialchars($producto['nombre']) ?></h2>
                <p><?= htmlspecialchars($producto['descripcion']) ?></p>
                <p class="precio">Precio: <?= htmlspecialchars($producto['precio']) ?>€</p>
                <!-- Botón para añadir al carrito -->
                <form method="POST" action="index.php?action=añadir_al_carrito">
                    <input type="hidden" name="producto_id" value="<?= $producto['id'] ?>">
                    <button type="submit" name="añadir">Añadir al carrito</button>
                </form>
            </div>
        </div>
    <?php else: ?>
        <p>Producto no encontrado.</p>
    <?php endif; ?>
</section>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>