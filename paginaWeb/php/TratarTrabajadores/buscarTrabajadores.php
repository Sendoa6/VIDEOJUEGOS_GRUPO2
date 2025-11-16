<?php
session_start();
include '../../DataBase/conexiones.php';

// Solo los administradores pueden acceder
if (!isset($_SESSION['id_trabajador']) || $_SESSION['admin'] != 1) {
    echo "
    <script>
        alert('Acceso restringido. Solo los administradores pueden entrar en esta sección.\\n\\nSi necesitas permisos, por favor habla con el encargado o un administrador autorizado.');
        window.location.href = '/paginaWeb/php/index.php';
    </script>";
    exit;
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
