<?php
session_start(); // Iniciar sesión

// Obtener la acción desde la URL
$action = $_GET['action'] ?? 'inicio';

// Enrutador básico
switch ($action) {
    case 'inicio':
        require_once __DIR__ . '/miproyecto/Vistas/inicio.php';
        break;
    case 'productos':
        require_once __DIR__ . '/miproyecto/controllers/ProductosController.php';
        break;
    case 'ver_producto':
        require_once __DIR__ . '/miproyecto/controllers/ProductosController.php';
        break;
    case 'carrito':
        require_once __DIR__ . '/miproyecto/controllers/CarritoController.php';
        break;
    case 'login':
        require_once __DIR__ . '/miproyecto/controllers/LoginController.php';
        break;
    case 'admin':
        require_once __DIR__ . '/miproyecto/controllers/AdminController.php';
        break;
    case 'añadir_al_carrito':
        require_once __DIR__ . '/miproyecto/controllers/CarritoController.php';
        break;
    case 'logout':
        // Lógica para cerrar sesión
        session_destroy();
        header('Location: index.php?action=inicio');
        exit;
    default:
        header('Location: index.php?action=inicio');
        exit;
}
?>