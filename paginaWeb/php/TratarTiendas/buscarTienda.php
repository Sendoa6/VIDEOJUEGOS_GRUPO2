<?php
session_start();

include '../../DataBase/conexiones.php';

// Si no hay sesión activa, se cierra y se redirige al inicio de sesión
if (!isset($_SESSION['id_trabajador'])) {
    session_destroy();
    header("Location: ../Sessions/inicio_sesion.php");
    exit();
}

$query = $_GET["query"] ?? "";
// Obtiene el texto que el usuario está buscando (o vacío si no se envió nada)

// Prepara una consulta para buscar tiendas cuya dirección coincida parcialmente
$stmt = $conexion->prepare("SELECT id_tienda, direccion FROM tienda WHERE direccion LIKE ?");
$like = "%$query%";
$stmt->bind_param("s", $like);
$stmt->execute();
$resultado = $stmt->get_result();

// Guarda los resultados en un arreglo
$lista = [];
while ($fila = $resultado->fetch_assoc()) {
    $lista[] = $fila;
}

header('Content-Type: application/json');
// Indica que la respuesta será un JSON

echo json_encode($lista);
// Devuelve la lista de direcciones encontradas en formato JSON

$stmt->close();
$conexion->close();
// Cierra la consulta y la conexión con la base de datos
?>
