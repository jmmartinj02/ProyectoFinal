<?php
require_once __DIR__ . '/../Models/UsuariosDAO.php';
require_once __DIR__ . '/../Models/CarritoDAO.php';

$usuariosDAO = new UsuariosDAO();
$carritoDAO = new CarritoDAO();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verificar las credenciales
    $usuario = $usuariosDAO->verificarCredenciales($email, $password);
    if ($usuario) {
        // Iniciar sesión
        $_SESSION['usuario'] = $usuario['id'];
        $_SESSION['rol'] = $usuario['rol'];

        // Sincronizar el carrito de la sesión con la base de datos
        if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
            foreach ($_SESSION['carrito'] as $producto_id => $cantidad) {
                $carritoDAO->añadirProducto($usuario['id'], $producto_id, $cantidad);
            }
            // Limpiar el carrito de la sesión después de sincronizar
            unset($_SESSION['carrito']);
        }

        // Recuperar el carrito de la base de datos
        $carrito = $carritoDAO->obtenerProductos($usuario['id']);
        $_SESSION['carrito'] = [];
        foreach ($carrito as $item) {
            $_SESSION['carrito'][$item['id']] = $item['cantidad'];
        }

        header('Location: index.php?action=inicio');
        exit;
    } else {
        $error = "Credenciales incorrectas.";
    }
}

// Cargar la vista de login
require __DIR__ . '/../Vistas/login.php';
?>