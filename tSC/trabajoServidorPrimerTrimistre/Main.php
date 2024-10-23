<?php
require_once 'App.php';

session_start(); // Utilizar sesiones si decides usar sesiones en lugar de cookies

$app = new App(); // Crear instancia de la clase App

// Si el formulario de registro de producto fue enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['registrarProducto'])) {
    $nombre = htmlspecialchars($_POST['nombre']);
    $stock = intval($_POST['stock']);
    $precio = floatval($_POST['precio']);
    $usuario = $_SESSION['usuario'] ?? 'desconocido';
    
    $app->registrarProducto($nombre, $stock, $precio, $usuario);
}

// Si el usuario cierra sesión
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit();
}

include 'views/home.php'; // Incluir la vista principal (home)
?>
