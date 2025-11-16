<?php
require_once __DIR__ . "/Main/Main.php";

$main = new Main();
$main->cargarTodo(); 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Game - Sistema</title>
</head>
<body>
    <?php
        $main->cuantosTrabajadores();
        $main->queVideojuegos("ps4");
    ?>
</body>
</html>
