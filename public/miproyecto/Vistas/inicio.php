<?php require_once __DIR__ . '/../includes/header.php'; ?>

<!-- Introducción y opciones de escalada -->
<section class="introduccion">
    <h2>¿Qué tipo de escalada practicas?</h2>
    <div class="opciones-escalada">
        <a href="index.php?action=productos&tipo=indoor" class="opcion indoor">
            <img src="/miproyecto/imagenes/indoor.jpg" alt="Escalada Indoor" class="opcion-imagen">
            <div class="contenido">
                <h3>Escalada Indoor</h3>
            </div>
        </a>
        <a href="index.php?action=productos&tipo=clasica" class="opcion clasica-deportiva">
            <img src="/miproyecto/imagenes/clasica.jpg" alt="Escalada Clásica/Deportiva" class="opcion-imagen">
            <div class="contenido">
                <h3>Escalada Clásica/Deportiva</h3>
            </div>
        </a>
        <a href="index.php?action=productos&tipo=alta_montana" class="opcion alta-montana">
            <img src="/miproyecto/imagenes/altamontana.jpg" alt="Alta Montaña" class="opcion-imagen">
            <div class="contenido">
                <h3>Alta Montaña</h3>
            </div>
        </a>
    </div>
    <p class="ver-todo">¿Prefieres explorar por tu cuenta? <a href="index.php?action=productos">Ver todos los productos</a></p>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>