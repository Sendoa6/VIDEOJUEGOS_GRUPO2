<?php
require_once __DIR__ . "/Main/Main.php";

$main = new Main();
$main->cargarTodo(); 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game - Sistema</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<!-- HEADER -->
<header class="bg-dark text-white py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <h2 class="m-0">GAME - SISTEMA</h2>
    </div>
</header>

<!-- CONTENIDO -->
<div class="container my-5">

    <!-- TARJETA DE INFORMACIÓN -->
    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white">
            <h4 class="m-0">Número de Trabajadores</h4>
        </div>
        <div class="card-body fs-4 text-center">
            <?php $main->cuantosTrabajadores(); ?>
        </div>
    </div>

    <!-- TABLA DE VIDEOJUEGOS -->
    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h4 class="m-0">Videojuegos para PS4</h4>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Título</th>
                            <th>Año</th>
                            <th>Estudio</th>
                            <th>Plataforma</th>
                            <th>Precio nuevo</th>
                            <th>2ª mano</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $main->queVideojuegos("ps4"); ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>

 <!-- FOOTER -->
    <footer class="bg-dark text-white mt-5 p-5">
        <div class="container d-flex justify-content-between align-items-center flex-wrap">

            <div class="mb-3">
                <p class="mb-1">2025 GAME. Todos los derechos reservados</p>

                <p class="mb-1">
                    <a href="https://www.game.es/" class="text-white text-decoration-underline">Página Oficial de GAME</a><br>
                    <a href="https://workspace.google.com/intl/es/gmail/" class="text-white text-decoration-underline">Contacto de GAME</a><br>
                </p>
            </div>
            <div class="mb-3">
                <p class="mb-1"><i>Sitio web desarrollado por ALT+F4</i></p>
                <p class="mb-1">
                    <a href="https://workspace.google.com/intl/es/gmail/" class="text-white text-decoration-underline">📲Contacto</a><br>
                    <a href="https://www.google.com/maps" class="text-white text-decoration-underline">🌍Localización</a>
                </p>
            </div>

            <div class="text-end">
                <img src="../paginaWeb/imagenes/creativeCommons.png" alt="Creative Commons" class="img-fluid" style="width: 40%;">
            </div>

        </div>
    </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
