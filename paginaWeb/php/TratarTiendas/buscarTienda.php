<?php
session_start();
include '../../DataBase/conexiones.php';
if (!isset($_SESSION['id_trabajador'])) {
    session_destroy();
    header("Location: ../Sessions/inicio_sesion.php");
    exit();
}

$query = $_GET["query"] ?? "";

$stmt = $conexion->prepare("SELECT id_tienda, direccion FROM tienda WHERE direccion LIKE ?");
$like = "%$query%";
$stmt->bind_param("s", $like);
$stmt->execute();
$resultado = $stmt->get_result();

$lista = [];
while ($fila = $resultado->fetch_assoc()) {
    $lista[] = $fila;
}

header('Content-Type: application/json');
echo json_encode($lista);

$stmt->close();
$conexion->close();
?>
