<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de videojuegos</title>
    <link rel="stylesheet" href="imagenes/">
    <link rel="stylesheet" href="../estilos/estilosNuevoJuego.css">
    <link rel="icon" href="../imagenes/favicon.png">
</head>

<body>
    <header>
        <img src="../imagenes/logoGame.png" alt="GAME" width="10%">
        <h1>GESTIÓN DE VIDEOJUEGOS</h1>
        <img src="../imagenes/logoAltF4.png" alt="Alt+F4" width="6%">
    </header>

    <div class="cajaVolver">
        <a href="../html/index.html" class="botonVolver"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="currentColor" d="M7 20q-.825 0-1.412-.587T5 18v-7.15l-2 1.525q-.35.25-.75.213T1.6 12.2t-.2-.75t.4-.65l8.975-6.875q.275-.2.588-.3t.637-.1t.638.1t.587.3L16 6.05V5.5q0-.625.438-1.062T17.5 4t1.063.438T19 5.5v2.85l3.2 2.45q.325.25.388.65t-.188.75t-.65.388t-.75-.213l-2-1.525V18q0 .825-.587 1.413T17 20h-1q-.825 0-1.412-.587T14 18v-2q0-.825-.587-1.412T12 14t-1.412.588T10 16v2q0 .825-.587 1.413T8 20zm3-9.975h4q0-.8-.6-1.313T12 8.2t-1.4.513t-.6 1.312"/></svg></a>
    </div>
    <h2><i>Ingrese los datos de la copia:</i></h2>


 <!-- BUSCADOR DE ID POR NOMBRE DE JUEGO -->


    <h2>Buscador de ID</h2>

    <form method="GET">
        <input type="text" name="buscador" placeholder="Escribe el nombre..." required>
        <button type="submit">Buscar</button>
    </form>

<hr>


    <?php
$conn = new mysqli("localhost", "root", "", "videojuegos_db");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$resultados = [];

if (isset($_GET['buscador'])) {
    $busqueda = $_GET['buscador'];

    $stmt = $conn->prepare("SELECT id_videojuego, titulo, plataforma FROM videojuego WHERE titulo LIKE ?");
    $like = "%$busqueda%";
    $stmt->bind_param("s", $like);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($fila = $result->fetch_assoc()) {
        $resultados[] = $fila;
    }
}
if (!empty($resultados)): ?>
    <h3>Resultados:</h3>
    <ul>
        <?php foreach ($resultados as $juego): ?>
            <li>
                <?= htmlspecialchars($juego['titulo']) ?> 
                <?= htmlspecialchars($juego['plataforma']) ?>: 
                ID <?= $juego['id_videojuego'] ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php elseif (isset($_GET['buscador'])): ?>
    <p>No se encontraron resultados.</p>
<?php endif; ?>



<!-- FORMULARIO HTML -->

</body>
</html>



    <div class="formularioNuevo">
        <form action="../php/insertarNuevoVideojuego.php" method="post" class="nuevo">
            ID del videojuego:
            <input type="number" name="id_videojuego" required>
            <br>
            <br>
            Precio de compra:
            <input type="float" name="precio_compra" required>
            <br>
            <br>
            Unidades:
            <input type="number" name="unidades" required>
            <br>
            <br>
            Es nuevo? :
            <label>
            <input type="radio" name="nuevo" value="si" required>
            Si
            </label>
            <label>
            <input type="radio" name="nuevo" value="no">
            No
            </label>
            <br>
            <br>
            <button type="submit">Envíar</button>
        </form>
    </div>


    <!-- TRATADO DEL FORMULARIO HTML -->

    <?php
        $id_videojuego=$_POST["id_videojuego"];
        $precio_compra=$_POST["precio_compra"];
        $nuevo = $_POST['nuevo'];
        $unidades = $_POST["unidades"];
        if ($nuevo === "si") {
            $nuevo = true;
        } else {
            $nuevo = false;
        }
            
        $check = mysqli_query($conexion, "SELECT id_videojuego FROM copia WHERE id_videojuego = '$id_videojuego'");
        if (mysqli_num_rows($check) > 0) {
            $sqlUpdate= "UPDATE copia SET unidades = unidades + '$unidades' WHERE id_videojuego = '$id_videojuego'";
            mysqli_query($conexion, $sqlUpdate);
            header("Refresh: 0.1; url=formulario.php");
            exit;


        }else{
            $sqlInsert = "INSERT INTO copia (id_videojuego, precio_compra, nuevo, unidades) VALUES ('$id_videojuego', '$precio_compra', '$nuevo', '$unidades')";
        }
        


        $result = mysqli_query($conexion, $sqlInsert);
        header("Refresh: 0.1; url=formulario.php");
    

        ?>




    <footer>
        <div class="ordenarFooter">
            <div>
                <p>2025 GAME. Todos los derechos reservados</p>
                <p>
                    <a href="https://www.facebook.com/?locale=es_ES">Facebook</a>
                    <br>
                    <a href="https://www.instagram.com/">Instagram</a>
                    <br>
                    <a href="https://x.com/?lang=es">Twitter</a>
                </p>
                <p>
                    <a href="https://www.google.com/maps">📍Localización</a>
                    <br>
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