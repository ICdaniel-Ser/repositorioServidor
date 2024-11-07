<head>
    <meta charset="UTF-8">
    <title>Tabla Estilizada</title>
    <style>
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Edad</th>
    </tr>
    <?php
    // Datos de ejemplo
    $personas = [
        ['id' => 1, 'nombre' => 'Ana', 'edad' => 28],
        ['id' => 2, 'nombre' => 'Luis', 'edad' => 32],
        ['id' => 3, 'nombre' => 'Carlos', 'edad' => 25],
    ];

    // Generar filas dinámicamente
    foreach ($personas as $persona) {
        echo "<tr>";
        echo "<td>{$persona['id']}</td>";
        echo "<td>{$persona['nombre']}</td>";
        echo "<td>{$persona['edad']}</td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>
