<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Supermercado - Inventario</title>
</head>
<body>
    <h1>Supermercado Ficticio</h1>

    <header>
        <a href="buscarProducto.php">Buscar Producto</a> |
        <a href="registrarProducto.php">Registrar Producto</a> |
        <a href="valorTotal.php">Calcular Valor Total</a> |
        <a href="main.php?logout=true">Cerrar Sesión</a>
    </header>

    <h2>Inventario</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Stock</th>
                <th>Precio/unidad</th>
                <th>Añadido por</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($app->mostrarProductos() as $producto): ?>
            <tr>
                <td><?php echo $producto['nombre']; ?></td>
                <td><?php echo $producto['stock']; ?></td>
                <td><?php echo $producto['precio']; ?></td>
                <td><?php echo $producto['usuario']; ?></td>
                <td><button>Eliminar</button></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
