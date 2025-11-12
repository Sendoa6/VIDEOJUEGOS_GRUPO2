<?php

session_start();
include '../../../DataBase/conexiones.php';
if (!isset($_SESSION['id_trabajador'])) {
    session_destroy();
    header("Location: ../Sessions/inicio_sesion.php");
    exit();
}

$conexion = new mysqli("localhost", "root", "", "videojuegos_db");

if ($conexion->connect_error) {
    die("Error de conexión");
}

$query = $_GET["query"] ?? "";

$stmt = $conexion->prepare("SELECT id_videojuego, titulo, plataforma FROM videojuego WHERE titulo LIKE ?");
$like = "%$query%";
$stmt->bind_param("s", $like);
$stmt->execute();
$resultado = $stmt->get_result();

$lista = [];
while ($fila = $resultado->fetch_assoc()) {
    $lista[] = $fila;
}

echo json_encode($lista);
?>
