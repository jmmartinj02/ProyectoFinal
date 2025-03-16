<?php
$host = 'mariadb'; // Nombre del servicio en docker-compose.yml
$dbname = $_ENV['MARIADB_DATABASE'] ?? 'tienda_escalada'; // Nombre de la base de datos
$username = $_ENV['MARIADB_USER'] ?? 'root'; // Usuario de la base de datos
$password = $_ENV['MARIADB_PASSWORD'] ?? 'changepassword'; // Contraseña de la base de datos

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "Conexión exitosa!"; // Mensaje de depuración
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>