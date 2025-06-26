<?php
include 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM productos WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        echo "Error al eliminar el producto.";
    }
} else {
    echo "ID no especificado.";
}
?>