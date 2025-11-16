<?php

session_start(); 

include '../../DataBase/conexiones.php';

if (!isset($_SESSION['id_trabajador'])) {
    session_destroy();
    header("Location: ../Sessions/inicio_sesion.php");
    exit();
}
if ($conexion->connect_error) {
    die("Error de conexión");
}

$query = $_GET["query"] ?? "";
// Se obtiene el texto que el usuario quiere buscar

// Se prepara una consulta que busca videojuegos cuyo título contenga el texto ingresado
$stmt = $conexion->prepare("SELECT id_videojuego, titulo, plataforma FROM videojuego WHERE titulo LIKE ?");
$like = "%$query%";
$stmt->bind_param("s", $like);
$stmt->execute();
$resultado = $stmt->get_result();

// Se guardan todos los resultados en una lista para devolverlos
$lista = [];
while ($fila = $resultado->fetch_assoc()) {
    $lista[] = $fila;
}

// Se envía la lista en formato JSON para que el front-end pueda usarla
echo json_encode($lista);
?>
