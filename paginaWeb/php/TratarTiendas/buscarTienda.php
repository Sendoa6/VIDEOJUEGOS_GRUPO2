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
