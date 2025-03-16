<?php
require_once __DIR__ . '/../Models/UsuariosDAO.php';
$usuariosDAO = new UsuariosDAO();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['registrar'])) {
        // Registrar nuevo usuario
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $rol = 'usuario'; // Por defecto, los nuevos usuarios son "usuarios"

        if ($usuariosDAO->crearUsuario($nombre, $email, $password, $rol)) {
            $_SESSION['mensaje'] = "Usuario registrado correctamente.";
            header('Location: index.php?action=inicio');
            exit;
        } else {
            $_SESSION['error'] = "Error al registrar el usuario.";
        }
    }
}

// Cargar la vista de registro
require __DIR__ . '/../Vistas/registro.php';
?>