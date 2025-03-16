<?php
require_once __DIR__ . '/../Models/ProductosDAO.php';

$productosDAO = new ProductosDAO();

// Obtener el tipo de producto desde la URL
$tipo = $_GET['tipo'] ?? '';

if (!empty($tipo)) {
    // Filtrar productos por tipo
    $productos = $productosDAO->getProductosByTipo($tipo);
    $titulo = "Productos de " . ucfirst($tipo);
} else {
    // Mostrar todos los productos
    $productos = $productosDAO->getAllProductos();
    $titulo = "Todos los productos";
}
// Acción para ver un producto específico
if (isset($_GET['action']) && $_GET['action'] === 'ver_producto' && isset($_GET['id'])) {
    $producto_id = $_GET['id'];
    $producto = $productosDAO->getProductoById($producto_id);

    // Cargar la vista detallada del producto
    require __DIR__ . '/../Vistas/ver_producto.php';
    exit;
}

// Cargar la vista de productos
require __DIR__ . '/../Vistas/productos.php';
?>