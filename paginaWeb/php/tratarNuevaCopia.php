<?php
$conexion = new mysqli("localhost", "root", "", "videojuegos_db");

$id_videojuego = $_POST["id_videojuego"];
$precio_compra = $_POST["precio_compra"];
$nuevo = $_POST['nuevo'];
$unidades = $_POST["unidades"];

$nuevo = ($nuevo === "si") ? "nuevo" : "seminuevo";

$check = mysqli_query($conexion, "SELECT v.id_videojuego, c.nuevo FROM copia c JOIN videojuego v ON v.id_videojuego=c.id_videojuego
WHERE v.id_videojuego = '$id_videojuego' and c.nuevo= '$nuevo'");

if (mysqli_num_rows($check) > 0) {
    $sqlUpdate = "UPDATE copia SET unidades = unidades + '$unidades' WHERE id_videojuego = '$id_videojuego'";
    mysqli_query($conexion, $sqlUpdate);
    header("Refresh: 0.1; url=../php/nuevaCopia.php");
    exit;
} else {
    $sqlInsert = "INSERT INTO copia (id_videojuego, precio_compra, nuevo, unidades) 
                  VALUES ('$id_videojuego', '$precio_compra', '$nuevo', '$unidades')";
}

$result = mysqli_query($conexion, $sqlInsert);
header("Refresh: 0.1; url=../php/nuevaCopia.php");
?>
