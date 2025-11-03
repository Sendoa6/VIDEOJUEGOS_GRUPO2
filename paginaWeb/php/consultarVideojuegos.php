<link rel="stylesheet" href="../estilos/estilosConsultarVideojuegos.css">
<?php
    include '../DataBase/conexiones.php';
    $query = "SELECT v.id_videojuego, v.titulo, v.anio_publicacion, v.estudio_desarrollo, v.plataforma, c.precio_nuevo, c.precio_seminuevo
    FROM videojuego v JOIN copia c ON v.id_videojuego = c.id_videojuego;
";
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