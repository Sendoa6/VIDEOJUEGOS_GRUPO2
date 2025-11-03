<?php
    #Conexion
    $conexion= mysqli_connect("localhost","root","","videojuegos_db") 
    or die("Problemas con la conexión");

    #Todos los datos que quiero insertar
    $nombre=$_POST["nombre"];
    $precio=$_POST["precio"];
    $precio_seminuevo=$_POST["precioSeminuevo"];
    $precio_Compra=$_POST["precioCompra"];
    $ano_publicacion=$_POST["anoPublicacion"];
    $estudio_desarrollo=$_POST["estudioDesarrollo"];
    $plataforma=$_POST["plataformas"];

    #Insert
    $query="INSERT INTO (id, nombre, stock, precioCompra, precioVenta) values('$id', '$nombre','$stock', '$precioCompra','$precioVenta')";
    
?>