<?php
require_once __DIR__ . '/../db/database.php'; // Incluir la conexión a la base de datos

class UsuariosDAO {
    private $conn;

    public function __construct() {
        global $conn; // Usar la conexión global definida en database.php
        $this->conn = $conn;
    }

    /**
     * Obtener todos los usuarios.
     *
     * @return array Lista de usuarios.
     */
    public function getAllUsers() {
        try {
            $stmt = $this->conn->prepare("SELECT id, nombre, email, password, rol FROM usuarios");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retornar resultados como un array asociativo
        } catch (PDOException $e) {
            die("Error al obtener usuarios: " . $e->getMessage());
        }
    }

    /**
     * Obtener un usuario por su email.
     *
     * @param string $email Email del usuario.
     * @return array|null Datos del usuario o null si no se encuentra.
     */
    public function getUsuarioByEmail($email) {
        try {
            $stmt = $this->conn->prepare("SELECT id, nombre, email, password, rol FROM usuarios WHERE email = :email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC); // Retornar un solo usuario
        } catch (PDOException $e) {
            die("Error al obtener usuario por email: " . $e->getMessage());
        }
    }

    /**
     * Verificar las credenciales de un usuario.
     *
     * @param string $email Email del usuario.
     * @param string $password Contraseña del usuario.
     * @return array|null Datos del usuario si las credenciales son correctas, o null si no.
     */
    public function verificarCredenciales($email, $password) {
        $usuario = $this->getUsuarioByEmail($email);
        if ($usuario && $password === $usuario['password']) {
            return $usuario;
        }
        return null;
    }

    /**
     * Crear un nuevo usuario.
     *
     * @param string $nombre Nombre del usuario.
     * @param string $email Email del usuario.
     * @param string $password Contraseña del usuario.
     * @param string $rol Rol del usuario (admin o usuario).
     * @return bool True si el usuario fue creado correctamente, False en caso contrario.
     */
    public function crearUsuario($nombre, $email, $password, $rol = 'usuario') {
        try {
            $stmt = $this->conn->prepare("INSERT INTO usuarios (nombre, email, password, rol) VALUES (:nombre, :email, :password, :rol)");
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            $stmt->bindParam(':rol', $rol, PDO::PARAM_STR);
            return $stmt->execute();
        } catch (PDOException $e) {
            die("Error al crear usuario: " . $e->getMessage());
        }
    }
}
?>