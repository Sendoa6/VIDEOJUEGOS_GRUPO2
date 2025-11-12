<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Copia - Procesar</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../estilos/estilosNuevaCopia.css">
    <link rel="icon" href="../imagenes/favicon.png">
</head>
<body>

    <!-- HEADER -->
    <header class="bg-light border-bottom py-3 d-flex justify-content-between align-items-center px-4">
        <img src="../imagenes/logoGame.png" alt="GAME" class="img-fluid" style="max-width: 10%;">
        <h1 class="text-center m-0">GESTIÓN DE VIDEOJUEGOS</h1>
        <img src="../imagenes/logoAltF4.png" alt="Alt+F4" class="img-fluid" style="max-width: 6%;">
    </header>

    <!-- BOTÓN VOLVER -->
    <div class="container my-4">
        <a href="../html/indexCopias.html" class="btn btn-light shadow rounded d-inline-flex align-items-center hover-scale">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="me-2" viewBox="0 0 24 24">
                <path d="m7.825 12l3.875 3.9q.275.275.288.688t-.288.712q-.275.275-.7.275t-.7-.275l-4.6-4.6q-.15-.15-.213-.325T5.426 12t.063-.375t.212-.325l4.6-4.6q.275-.275.688-.287t.712.287q.275.275.275.7t-.275.7zm6.6 0l3.875 3.9q.275.275.288.688t-.288.712q-.275.275-.7.275t-.7-.275l-4.6-4.6q-.15-.15-.213-.325T12.026 12t.063-.375t.212-.325l4.6-4.6q.275-.275.688-.287t.712.287q.275.275.275.7t-.275.7z"/>
            </svg>
            Volver
        </a>
    </div>

    <!-- CONTENIDO PRINCIPAL -->
    <main class="container p-5 my-5 text-center">

        <?php
        include "../../DataBase/conexiones.php";

        $id_videojuego = $_POST["id_videojuego"];
        $precio_compra = $_POST["precio_compra"];
        $nuevo = ($_POST['nuevo'] === "si") ? 1 : 0;
        $unidades = $_POST["unidades"];

        $check = mysqli_query($conexion, "SELECT v.id_videojuego, c.nuevo 
        FROM copia c JOIN videojuego v ON v.id_videojuego = c.id_videojuego
        WHERE v.id_videojuego = '$id_videojuego' AND c.nuevo = '$nuevo'");

        if (mysqli_num_rows($check) > 0) {

            $sqlUpdate = "UPDATE copia SET unidades = unidades + '$unidades' 
                          WHERE id_videojuego = '$id_videojuego' AND nuevo = '$nuevo'";

            mysqli_query($conexion, $sqlUpdate);

            echo "<div class='alert alert-success shadow rounded'>
                    Se ha actualizado el número de copias.
                  </div>";

        } else {

            $sqlInsert = "INSERT INTO copia (id_videojuego, precio_compra, nuevo, unidades) 
            VALUES ('$id_videojuego', '$precio_compra', '$nuevo', '$unidades')";

            if (mysqli_query($conexion, $sqlInsert)) {
                echo "<div class='alert alert-success shadow rounded'>
                        Se ha actualizado el número de copias del videojuego con ID: (ID: $id_videojuego).
                      </div>";
            } else {
                echo "<div class='alert alert-danger shadow rounded'>
                        Error al insertar copias: " . mysqli_error($conexion) . "
                      </div>";
            }
        }

        mysqli_close($conexion);
        ?>

    </main>

    <!-- FOOTER -->
    <footer class="bg-dark text-white mt-5 p-5">
        <div class="container d-flex justify-content-between align-items-center flex-wrap">
            <div class="mb-3">
                <p class="mb-1">2025 GAME. Todos los derechos reservados</p>
                <p class="mb-1">
                    <a href="https://www.facebook.com/?locale=es_ES" class="text-white text-decoration-underline">Facebook</a><br>
                    <a href="https://www.instagram.com/" class="text-white text-decoration-underline">Instagram</a><br>
                    <a href="https://x.com/?lang=es" class="text-white text-decoration-underline">Twitter</a>
                </p>
                <p class="mb-1">
                    <a href="https://www.google.com/maps" class="text-white text-decoration-underline">📍Localización</a><br>
                    <a href="https://workspace.google.com/intl/es/gmail/" class="text-white text-decoration-underline">📩Contáctanos</a>
                </p>
            </div>
            <div class="text-end">
                <img src="../imagenes/creativeCommons.png" alt="Creative Commons" class="img-fluid" style="width: 40%;">
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>