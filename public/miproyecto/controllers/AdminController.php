<?php
require_once __DIR__ . '/../Models/ProductosDAO.php';

// Verificar si el usuario es administrador
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header('Location: index.php?action=inicio');
    exit;
}

$productosDAO = new ProductosDAO();

// Procesar el formulario de añadir producto
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre']);
    $descripcion = trim($_POST['descripcion']);
    $precio = floatval($_POST['precio']);
    $tipo = $_POST['tipo'];

    // Manejar la subida de la imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $nombreArchivo = basename($_FILES['imagen']['name']);
        $rutaDestino = __DIR__ . '/../imagenes/' . $nombreArchivo;

        // Mover el archivo subido a la carpeta de destino
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino)) {
            // Añadir el nuevo producto con la ruta de la imagen
            if ($productosDAO->crearProducto($nombre, $descripcion, $precio, $nombreArchivo, $tipo)) {
                $_SESSION['mensaje'] = "Producto añadido correctamente.";
            } else {
                $_SESSION['error'] = "Error al añadir el producto.";
            }
        } else {
            $_SESSION['error'] = "Error al subir la imagen.";
        }
    } else {
        $_SESSION['error'] = "Debes seleccionar una imagen válida.";
    }
    if (headers_sent()) {
        die("Error: Las cabeceras ya han sido enviadas.");
    } else {
        header('Location: index.php?action=admin');
        exit;
    }
    // Redirigir a la página de administración
   // header('Location: index.php?action=admin');
    //exit;
}

// Cargar la vista de administración
require __DIR__ . '/../Vistas/añadir_producto.php';
?>