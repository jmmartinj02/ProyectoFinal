<?php
require_once __DIR__ . '/../includes/header.php';
?>
<section class="carrito">
    <h2>Carrito de Compra</h2>
    <?php if (!empty($productos_en_carrito)): ?>
        <ul>
            <?php foreach ($productos_en_carrito as $producto): ?>
                <li>
                    <!-- Añadimos la imagen del producto -->
                    <img src="<?= htmlspecialchars($producto['imagen']) ?>" alt="<?= htmlspecialchars($producto['nombre']) ?>" class="imagen-carrito">
                    <h3><?= htmlspecialchars($producto['nombre']) ?></h3>
                    <p><?= htmlspecialchars($producto['descripcion']) ?></p>
                    <p>Precio: <?= htmlspecialchars(number_format($producto['precio'], 2)) ?>€</p>
                    <p>Cantidad: <?= htmlspecialchars($producto['cantidad']) ?></p>
                    <form method="POST" action="index.php?action=carrito">
                        <input type="hidden" name="producto_id" value="<?= htmlspecialchars($producto['id']) ?>">
                        <button type="submit" name="eliminar">Eliminar</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
        <p>Total: <?= htmlspecialchars(number_format($total, 2)) ?>€</p>
        <!-- Botón para vaciar el carrito -->
        <form method="POST" action="index.php?action=carrito">
            <button type="submit" name="vaciar">Vaciar Carrito</button>
        </form>
    <?php else: ?>
        <p>No hay productos en el carrito.</p>
    <?php endif; ?>
</section>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>