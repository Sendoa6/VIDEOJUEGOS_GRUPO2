
    <?php
        $conexion = new mysqli("localhost", "root", "", "videojuegos_db");

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
            header("Refresh: 0.1; url=nuevaCopia.php");
            exit;


        }else{
            $sqlInsert = "INSERT INTO copia (id_videojuego, precio_compra, nuevo, unidades) VALUES ('$id_videojuego', '$precio_compra', '$nuevo', '$unidades')";
        }
        


        $result = mysqli_query($conexion, $sqlInsert);
        header("Refresh: 0.1; url=nuevaCopia.php");
    

        ?>