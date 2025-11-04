<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de videojuegos</title>
    <link rel="stylesheet" href="imagenes/">>
    <link rel="stylesheet" href="../estilos/estilosNuevoJuego.css">
</head>
<body>
    <header>
        <img src="../imagenes/logoGame.png" alt="GAME" width="10%">
        <h1>GESTIÓN DE VIDEOJUEGOS</h1>
        <img src="../imagenes/logoAltF4.png" alt="Alt+F4" width="6%">
    </header>

    <div class="cajaVolver">
        <a href="../html/nuevoJuego.html" class="botonVolver">⬅️Volver</a>
    </div>

    <main style="text-align:center; margin-top: 50px;">
        <?php
            #Conexion
            $conexion= mysqli_connect("localhost","root","","videojuegos_db") 
            or die("Problemas con la conexión");

            #Todos los datos que quiero insertar
            $nombre=$_POST["nombre"];
            $precio=$_POST["precio"];
            $precio_seminuevo=$_POST["precioSeminuevo"];
            $precio_compra=$_POST["precioCompra"];
            $ano_publicacion=$_POST["anoPublicacion"];
            $estudio_desarrollo=$_POST["estudioDesarrollo"];

            //Si hay varias plataformas las unimos en una sola cadena
            if (isset($_POST["plataformas"])) {
                if (is_array($_POST["plataformas"])) {
                    $plataformas = implode(", ", $_POST["plataformas"]);
                } else {
                    $plataformas = $_POST["plataformas"];
                }
            } else {
                $plataformas = "";
            }

            //Insert
            $queryVideojuego = "INSERT INTO videojuego (titulo, anio_publicacion, estudio_desarrollo, plataforma)
                                VALUES ('$nombre', '$ano_publicacion', '$estudio_desarrollo', '$plataformas')";

            if (mysqli_query($conexion, $queryVideojuego)) {
                //Obtener el id del videojuego recién insertado
                $idVideojuego = mysqli_insert_id($conexion);

                //Insertar la copia (con precios y unidades por defecto)
                $queryCopia = "INSERT INTO copia(id_videojuego, precio_nuevo, precio_seminuevo, precio_compra, unidades)
                            VALUES ('$idVideojuego', '$precio', '$precio_seminuevo', '$precio_compra', 1)";

                if (mysqli_query($conexion, $queryCopia)) {
                    echo "<h2>Videojuego agregado correctamente.</h2>";
                } else {
                    echo "<h2>Error al insertar en copia: " . mysqli_error($conexion) . "</h2>";
                }
            } else {
                echo "<h2>Error al insertar en videojuego: " . mysqli_error($conexion) . "</h2>";
            }

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