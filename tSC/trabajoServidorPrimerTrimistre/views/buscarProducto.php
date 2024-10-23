<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Producto</title>
</head>
<body>
    <h1>Buscar Producto</h1>
    <form action="buscarProducto.php" method="GET">
        <label for="nombre">Nombre del producto:</label>
        <input type="text" id="nombre" name="nombre" required>
        <button type="submit">Buscar</button>
    </form>

    <?php if (isset($producto)): ?>
        <h2>Producto encontrado:</h2>
        <p>Nombre: <?php echo $producto['nombre']; ?></p>
        <p>Stock: <?php echo $producto['stock']; ?></p>
        <p>Precio: <?php echo $producto['precio']; ?></p>
        <p>Añadido por: <?php echo $producto['usuario']; ?></p>
    <?php endif; ?>

    <a href="home.php">Volver</a>
</body>
</html>
