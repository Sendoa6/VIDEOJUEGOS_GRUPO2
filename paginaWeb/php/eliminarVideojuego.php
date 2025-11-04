<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de videojuegos</title>
    <link rel="icon" href="../imagenes/favicon.png">
    <link rel="stylesheet" href="../estilos/estilosEliminarJuego.css">
</head>
<body>
    <header>
        <img src="../imagenes/logoGame.png" alt="GAME" width="10%">
        <h1>GESTIÓN DE VIDEOJUEGOS</h1>
        <img src="../imagenes/logoAltF4.png" alt="Alt+F4" width="6%">
    </header>

    <div class="cajaVolver">
        <a href="../html/eliminarJuego.html" class="botonVolver"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="currentColor" d="m7.825 12l3.875 3.9q.275.275.288.688t-.288.712q-.275.275-.7.275t-.7-.275l-4.6-4.6q-.15-.15-.213-.325T5.426 12t.063-.375t.212-.325l4.6-4.6q.275-.275.688-.287t.712.287q.275.275.275.7t-.275.7zm6.6 0l3.875 3.9q.275.275.288.688t-.288.712q-.275.275-.7.275t-.7-.275l-4.6-4.6q-.15-.15-.213-.325T12.026 12t.063-.375t.212-.325l4.6-4.6q.275-.275.688-.287t.712.287q.275.275.275.7t-.275.7z"/></svg></a>
    </div>

    <main style="text-align:center; margin-top: 50px;">
        <?php
            #Conexión a la base de datos
            $conexion = mysqli_connect("localhost", "root", "", "videojuegos_db") 
                or die("Problemas con la conexión");

            #Obtenemos el ID
            $id = $_POST['idVideojuego'];

            #Verificamos si el videojuego existe
            $registro = mysqli_query($conexion, "SELECT * FROM videojuego WHERE id_videojuego = '$id'");

            if (mysqli_num_rows($registro) > 0) {
                #Eliminamos primero las copias asociadas
                mysqli_query($conexion, "DELETE FROM copia WHERE id_videojuego = '$id'")
                    or die("Problemas al eliminar las copias asociadas: " . mysqli_error($conexion));

                # Luego eliminamos el videojuego
                mysqli_query($conexion, "DELETE FROM videojuego WHERE id_videojuego = '$id'")
                    or die("Problemas al eliminar el videojuego: " . mysqli_error($conexion));

                echo "<h2 style='margin-top:7%;'>El videojuego con ID <strong>$id</strong> ha sido eliminado correctamente.</h2>";
            } else {
                echo "<h2 style='margin-top:7%;'>No se encontró ningún videojuego con el ID <strong>$id</strong>.</h2>";
            }

            # Cerramos la conexión
            mysqli_close($conexion);
        ?>
    </main>

    <footer>
        <div class="ordenarFooter">
            <div>
                <p>2025 GAME. Todos los derechos reservados</p>
                <p>
                    <a href="https://www.facebook.com/?locale=es_ES">Facebook</a><br>
                    <a href="https://www.instagram.com/">Instagram</a><br>
                    <a href="https://x.com/?lang=es">Twitter</a>
                </p>
                <p>
                    <a href="https://www.google.com/maps">📍Localización</a><br>
                    <a href="https://workspace.google.com/intl/es/gmail/">📩Contáctanos</a>
                </p>
            </div>
            <div class="imgCreativeCommons">
                <img src="../imagenes/creativeCommons.png" alt="" width="30%">
            </div>
        </div>
    </footer>
</body>
</html>