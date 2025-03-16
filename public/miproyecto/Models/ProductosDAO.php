<?php
require_once __DIR__ . '/../db/database.php';

class ProductosDAO {
    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    // Obtener todos los productos
    public function getAllProductos() {
        $stmt = $this->conn->query("SELECT * FROM productos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener productos por tipo
    public function getProductosByTipo($tipo) {
        $stmt = $this->conn->prepare("SELECT * FROM productos WHERE tipo = ?");
        $stmt->execute([$tipo]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener un producto por ID
    public function getProductoById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM productos WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $producto = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($producto) {
            // Añadir la ruta base a la imagen
            $producto['imagen'] = '/miproyecto/imagenes/' . $producto['imagen'];
        }
    
        return $producto;
    }
    public function crearProducto($nombre, $descripcion, $precio, $imagen, $tipo) {
        try {
            $stmt = $this->conn->prepare("
                INSERT INTO productos (nombre, descripcion, precio, imagen, tipo)
                VALUES (:nombre, :descripcion, :precio, :imagen, :tipo)
            ");
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
            $stmt->bindParam(':precio', $precio, PDO::PARAM_STR);
            $stmt->bindParam(':imagen', $imagen, PDO::PARAM_STR);
            $stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);
            return $stmt->execute();
        } catch (PDOException $e) {
            die("Error al crear el producto: " . $e->getMessage());
        }
    }
}
?>