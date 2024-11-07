<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inventario del Supermercado</title>
</head>
<body>
    <h1>Inventario del Supermercado</h1>
    
    <!-- Navegación principal -->
    <nav>
        <a href="main.php?method=buscarProducto">Buscar Producto</a> |
        <a href="main.php?method=registrarProducto">Registrar Producto</a> |
        <a href="main.php?method=valorTotal">Ver Valor Total del Inventario</a> |
        <a href="main.php?method=cerrarSesion">Cerrar Sesión</a>
    </nav>

    <h2>Productos en Inventario</h2>
    <table border="1">
        <tr>
            <th>Producto</th>
            <th>Stock</th>
            <th>Precio</th>
            <th>Eliminar</th>
        </tr>
        <?php foreach ($inventario as $index => $producto): ?>
        <tr>
            <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
            <td><?php echo htmlspecialchars($producto['stock']); ?></td>
            <td><?php echo htmlspecialchars($producto['precio']); ?></td>
            <td><a href="main.php?method=eliminarProducto&index=<?php echo $index; ?>">Eliminar</a></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <!-- Formulario para agregar un nuevo producto directamente desde la página principal -->
    <h3>Agregar Producto</h3>
    <form action="main.php?method=agregarProducto" method="post">
        <input type="text" name="nombre" placeholder="Nombre del producto" required>
        <input type="number" name="stock" placeholder="Stock" required>
        <input type="number" name="precio" placeholder="Precio" required>
        <button type="submit">Añadir</button>
    </form>
</body>
</html>
