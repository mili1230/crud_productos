<?php
include 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Obtener los datos actuales del producto
    $sql = "SELECT * FROM productos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $producto = $stmt->fetch(PDO::FETCH_ASSOC);

    // Si se enviaron los datos del formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];

        $sql = "UPDATE productos SET nombre=?, descripcion=?, precio=?, stock=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nombre, $descripcion, $precio, $stock, $id]);

        header("Location: index.php");
        exit();
    }
} else {
    echo "ID no proporcionado";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
</head>
<body>
    <h1>Editar Producto</h1>
    <form method="POST">
        <label>Nombre:</label><br>
        <input type="text" name="nombre" value="<?= $producto['nombre'] ?>" required><br><br>

        <label>Descripción:</label><br>
        <textarea name="descripcion" required><?= $producto['descripcion'] ?></textarea><br><br>

        <label>Precio:</label><br>
        <input type="number" step="0.01" name="precio" value="<?= $producto['precio'] ?>" required><br><br>

        <label>Stock:</label><br>
        <input type="number" name="stock" value="<?= $producto['stock'] ?>" required><br><br>

        <input type="submit" value="Actualizar">
    </form>
</body>
</html>