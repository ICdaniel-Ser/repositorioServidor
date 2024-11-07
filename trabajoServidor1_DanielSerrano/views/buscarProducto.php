<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Producto</title>
</head>
<body>
    <h1>Buscar Producto</h1>
    <form action="main.php?method=buscarProducto" method="post">
        <input type="text" name="nombre" placeholder="Nombre del producto" required>
        <button type="submit">Buscar</button>
    </form>

    <?php if (isset($resultado)): ?>
        <h2>Resultados de la búsqueda:</h2>
        <table border="1">
            <tr>
                <th>Producto</th>
                <th>Stock</th>
                <th>Precio</th>
            </tr>
            <?php foreach ($resultado as $producto): ?>
            <tr>
                <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
                <td><?php echo htmlspecialchars($producto['stock']); ?></td>
                <td><?php echo htmlspecialchars($producto['precio']); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <a href="main.php?method=home">Volver a la página principal</a>
</body>
</html>
