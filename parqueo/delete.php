<?php
include('../app/config.php'); // Asegúrate de que este archivo contenga la conexión a la base de datos

if (isset($_GET['id'])) {
    $id_map = $_GET['id'];

    // Preparar la consulta de eliminación
    $query = $pdo->prepare("DELETE FROM tb_mapeos WHERE id_map = :id_map");

    // Asociar el parámetro
    $query->bindParam(':id_map', $id_map, PDO::PARAM_INT);

    // Ejecutar la consulta
    if ($query->execute()) {
        // Redirigir después de eliminar
        header('Location: mapeo-de-vehiculos.php?msg=deleted');
        exit();
    } else {
        echo "Error al eliminar el mapeo.";
    }
} else {
    echo "ID no proporcionado.";
}
?>
