<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Producto</title>
</head>
<body>
    <h1>Registrar Producto</h1>
    <form action="main.php" method="POST">
        <label for="nombre">Nombre del producto:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="stock">Cantidad en stock:</label>
        <input type="number" id="stock" name="stock" required><br>

        <label for="precio">Precio por unidad:</label>
        <input type="number" step="0.01" id="precio" name="precio" required><br>

        <button type="submit" name="registrarProducto">Registrar</button>
    </form>

    <a href="home.php">Volver</a>
</body>
</html>
