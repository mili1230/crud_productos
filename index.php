<?php include 'conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD de Productos</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <h1>Lista de Productos</h1>
    <a href="crear.php">Agregar Nuevo Producto</a>
    <br><br>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Fecha Creación</th>
            <th>Acciones</th>
        </tr>
        <?php
        $sql = "SELECT * FROM productos";
        $res = $conn->query($sql);

        while ($fila = $res->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                <td>{$fila['id']}</td>
                <td>{$fila['nombre']}</td>
                <td>{$fila['descripcion']}</td>
                <td>{$fila['precio']}</td>
                <td>{$fila['stock']}</td>
                <td>{$fila['fecha_creacion']}</td>
                <td>
                    <a href='editar.php?id={$fila['id']}'>Editar</a> |
                    <a href='eliminar.php?id={$fila['id']}' onclick='return confirm(\"¿Estás seguro?\")'>Eliminar</a>
                </td>
            </tr>";
        }
        ?>
    </table>
</body>
</html>