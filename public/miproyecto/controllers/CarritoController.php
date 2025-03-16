<?php
require_once __DIR__ . '/../Models/ProductosDAO.php';
require_once __DIR__ . '/../Models/CarritoDAO.php';

// Verificar si el carrito existe en la sesión
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

$productosDAO = new ProductosDAO();
$carritoDAO = new CarritoDAO();

// Acciones del carrito
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['añadir'])) {
        // Añadir producto al carrito
        $producto_id = $_POST['producto_id'];

        // Verificar si el producto ya está en el carrito
        if (isset($_SESSION['carrito'][$producto_id])) {
            // Si ya está, aumentar la cantidad
            $_SESSION['carrito'][$producto_id]++;
        } else {
            // Si no está, añadirlo con cantidad 1
            $_SESSION['carrito'][$producto_id] = 1;
        }

        // Si el usuario ha iniciado sesión, guardar en la base de datos
        if (isset($_SESSION['usuario'])) {
            $carritoDAO->añadirProducto($_SESSION['usuario'], $producto_id, $_SESSION['carrito'][$producto_id]);
        }

        // Redirigir para evitar reenvío del formulario
        header('Location: index.php?action=carrito');
        exit;
    }
}

// Obtener los productos del carrito
$productos_en_carrito = [];
$total = 0;

if (!empty($_SESSION['carrito'])) {
    foreach ($_SESSION['carrito'] as $producto_id => $cantidad) {
        $producto = $productosDAO->getProductoById($producto_id);
        if ($producto) {
            $producto['cantidad'] = $cantidad;
            $productos_en_carrito[] = $producto;
            $total += $producto['precio'] * $cantidad;
        }
    }
}

// Cargar la vista del carrito
require __DIR__ . '/../Vistas/carrito.php';
?>