<link rel="stylesheet" href="../estilos/estilosConsultarVideojuegos.css">
<head>
    <title>Gestión de videojuegos</title>
    <link rel="icon" href="../imagenes/favicon.png">
</head>
<header>
    <img src="../imagenes/logoGame.png" alt="GAME" width="10%">
    <h1>GESTIÓN DE VIDEOJUEGOS</h1>
    <img src="../imagenes/logoAltF4.png" alt="Alt+F4" width="6%">
</header>

    <div class="cajaVolver">
        <a href="../html/index.html" class="botonVolver"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="currentColor" d="M7 20q-.825 0-1.412-.587T5 18v-7.15l-2 1.525q-.35.25-.75.213T1.6 12.2t-.2-.75t.4-.65l8.975-6.875q.275-.2.588-.3t.637-.1t.638.1t.587.3L16 6.05V5.5q0-.625.438-1.062T17.5 4t1.063.438T19 5.5v2.85l3.2 2.45q.325.25.388.65t-.188.75t-.65.388t-.75-.213l-2-1.525V18q0 .825-.587 1.413T17 20h-1q-.825 0-1.412-.587T14 18v-2q0-.825-.587-1.412T12 14t-1.412.588T10 16v2q0 .825-.587 1.413T8 20zm3-9.975h4q0-.8-.6-1.313T12 8.2t-1.4.513t-.6 1.312"/></svg></a>
    </div>
    <h2><i>Listado de videojuegos:</i></h2>
    <div class="tabla">
        <?php
            include '../DataBase/conexiones.php';
            $query = "SELECT v.id_videojuego, v.titulo, v.anio_publicacion, v.estudio_desarrollo, v.plataforma, c.precio_nuevo, c.precio_seminuevo, c.unidades
            FROM videojuego v JOIN copia c ON v.id_videojuego = c.id_videojuego;";
            $result = mysqli_query($conexion, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                echo "<table style='margin-bottom:10%;'>";
                echo "<tr>  
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Año</th>
                        <th>Desarolladores</th>
                        <th>Plataforma</th>
                        <th>Precio Nuevo</th>
                        <th>Precio Seminuevo</th>
                        <th>Unidades</th>
                    </tr>";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id_videojuego']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['titulo']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['anio_publicacion']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['estudio_desarrollo']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['plataforma']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['precio_nuevo']) . " €"."</td>";
                    echo "<td>" . htmlspecialchars($row['precio_seminuevo']) ." €". "</td>";
                    echo "<td>" . htmlspecialchars($row['unidades']). "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "<p>No hay Videojuegos registrados.</p>";
            }
        ?>
    </div>
        
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