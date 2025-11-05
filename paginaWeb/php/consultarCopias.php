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
        <a href="../html/indexCopias.html" class="botonVolver"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="currentColor" d="m7.825 12l3.875 3.9q.275.275.288.688t-.288.712q-.275.275-.7.275t-.7-.275l-4.6-4.6q-.15-.15-.213-.325T5.426 12t.063-.375t.212-.325l4.6-4.6q.275-.275.688-.287t.712.287q.275.275.275.7t-.275.7zm6.6 0l3.875 3.9q.275.275.288.688t-.288.712q-.275.275-.7.275t-.7-.275l-4.6-4.6q-.15-.15-.213-.325T12.026 12t.063-.375t.212-.325l4.6-4.6q.275-.275.688-.287t.712.287q.275.275.275.7t-.275.7z"/></svg></a>
    </div>
    <h2><i>Listado de copias de videojuegos:</i></h2>
    <div class="tabla">
        <?php
            include '../DataBase/conexiones.php';
            $query = "SELECT c.id_copia, c.id_videojuego, c.precio_compra, c.nuevo, c.unidades, v.titulo FROM copia c join videojuego v on c.id_videojuego=v.id_videojuego";
            $result = mysqli_query($conexion, $query);
            
            if ($result && mysqli_num_rows($result) > 0) {
                echo "<table style='margin-bottom:10%;'>";
                echo "<tr>  
                        <th>ID Copia</th>
                        <th>ID Videojuego</th>
                        <th>Titulo</th>
                        <th>Precio_compra</th>
                        <th>Nuevo</th>
                        <th>Unidades</th>
                    </tr>";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id_copia']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['id_videojuego']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['titulo']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['precio_compra']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['nuevo']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['unidades']) . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "<p>No hay Copias registradas.</p>";
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