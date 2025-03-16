<?php
require_once __DIR__ . '/../db/database.php';
class CarritoDAO {
    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }
    
    public function obtenerProducto($usuario_id, $producto_id) {
        $stmt = $this->conn->prepare("SELECT * FROM carrito WHERE usuario_id = :usuario_id AND producto_id = :producto_id");
        $stmt->bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT);
        $stmt->bindParam(':producto_id', $producto_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function añadirProducto($usuario_id, $producto_id, $cantidad = 1) {
        // Verificar si el producto ya está en el carrito
        $productoEnCarrito = $this->obtenerProducto($usuario_id, $producto_id);
    
        if ($productoEnCarrito) {
            // Si ya está, aumentar la cantidad
            $nuevaCantidad = $productoEnCarrito['cantidad'] + $cantidad;
            return $this->actualizarCantidad($usuario_id, $producto_id, $nuevaCantidad);
        } else {
            // Si no está, añadirlo
            $stmt = $this->conn->prepare("INSERT INTO carrito (usuario_id, producto_id, cantidad) VALUES (:usuario_id, :producto_id, :cantidad)");
            $stmt->bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT);
            $stmt->bindParam(':producto_id', $producto_id, PDO::PARAM_INT);
            $stmt->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
            return $stmt->execute();
        }
    }

    public function obtenerProductos($usuario_id) {
        $stmt = $this->conn->prepare("
            SELECT p.id, p.nombre, p.descripcion, p.precio, p.imagen, c.cantidad
            FROM carrito c
            JOIN productos p ON c.producto_id = p.id
            WHERE c.usuario_id = :usuario_id
        ");
        $stmt->bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT);
        $stmt->execute();
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // Añadir la ruta base a la imagen
        foreach ($productos as &$producto) {
            $producto['imagen'] = '/miproyecto/imagenes/' . $producto['imagen'];
        }
    
        return $productos;
    }

    public function actualizarCantidad($usuario_id, $producto_id, $cantidad) {
        $stmt = $this->conn->prepare("UPDATE carrito SET cantidad = :cantidad WHERE usuario_id = :usuario_id AND producto_id = :producto_id");
        $stmt->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
        $stmt->bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT);
        $stmt->bindParam(':producto_id', $producto_id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>