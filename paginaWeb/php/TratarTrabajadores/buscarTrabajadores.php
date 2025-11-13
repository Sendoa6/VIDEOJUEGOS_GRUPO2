<?php
session_start();
include '../../DataBase/conexiones.php';

if (!isset($_SESSION['id_trabajador'])) {
    session_destroy();
    header("Location: ../Sessions/inicio_sesion.php");
    exit();
}

$query = $_GET["query"] ?? "";
$like = "%" . $query . "%";

$stmt = $conexion->prepare("
    SELECT id_trabajador, nombre, apellidos 
    FROM trabajador 
    WHERE nombre LIKE ? OR apellidos LIKE ?
");
$stmt->bind_param("ss", $like, $like);
$stmt->execute();
$resultado = $stmt->get_result();

$lista = [];
while ($fila = $resultado->fetch_assoc()) {
    $lista[] = $fila;
}

echo json_encode($lista, JSON_UNESCAPED_UNICODE);
?>
