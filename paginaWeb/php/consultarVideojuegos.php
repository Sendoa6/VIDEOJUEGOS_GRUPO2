<link rel="stylesheet" href="../estilos/estilosConsultarVideojuegos.css">
<header>
        <img src="../imagenes/logoGame.png" alt="GAME" width="10%">
        <h1>GESTIÓN DE VIDEOJUEGOS</h1>
        <img src="../imagenes/logoAltF4.png" alt="Alt+F4" width="6%">
    </header>
<?php
    include '../DataBase/conexiones.php';
    $query = "SELECT v.id_videojuego, v.titulo, v.anio_publicacion, v.estudio_desarrollo, v.plataforma, c.precio_nuevo, c.precio_seminuevo
    FROM videojuego v JOIN copia c ON v.id_videojuego = c.id_videojuego;";
    $result = mysqli_query($conexion, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<h2>Listado de Videojuegos</h2>";
        echo "<table>";
        echo "<tr>  
                <th>ID</th>
                <th>Titulo</th>
                <th>Año</th>
                <th>Desarolladores</th>
                <th>Plataforma</th>
                <th>Precio Nuevo</th>
                <th>Precio Seminuevo</th>
              </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id_videojuego']) . "</td>";
            echo "<td>" . htmlspecialchars($row['titulo']) . "</td>";
            echo "<td>" . htmlspecialchars($row['anio_publicacion']) . "</td>";
            echo "<td>" . htmlspecialchars($row['estudio_desarrollo']) . "</td>";
            echo "<td>" . htmlspecialchars($row['plataforma']) . "</td>";
            echo "<td>" . htmlspecialchars($row['precio_nuevo']) . "</td>";
            echo "<td>" . htmlspecialchars($row['precio_seminuevo']) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No hay Videojuegos registrados.</p>";
    }
?>
    <a href="../html/index.html"><button>Volver al inicio</button></a>
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