<?php
session_start();
include '../../DataBase/conexiones.php';
if (!isset($_SESSION['id_trabajador'])) {
    session_destroy();
    header("Location: ../Sessions/inicio_sesion.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Tienda</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../estilos/estilosEliminarJuego.css">
    <link rel="icon" href="../../imagenes/favicon.png">
</head>
<body>

    <header class="bg-light border-bottom py-3 d-flex justify-content-between align-items-center px-4">
        <img src="../../imagenes/logoGame.png" alt="GAME" class="img-fluid" style="max-width: 10%;">
        <h1 class="text-center m-0">GESTIÓN DE TIENDAS</h1>
        <img src="../../imagenes/logoAltF4.png" alt="Alt+F4" class="img-fluid" style="max-width: 6%;">
    </header>

    <div class="container my-4">
        <a href="indexTiendas.php" class="btn hover-scale btn-light shadow rounded d-inline-flex align-items-center hover-scale">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="me-2" viewBox="0 0 24 24">
                <path d="m7.825 12l3.875 3.9q.275.275.288.688t-.288.712q-.275.275-.7.275t-.7-.275l-4.6-4.6q-.15-.15-.213-.325T5.426 12t.063-.375t.212-.325l4.6-4.6q.275-.275.688-.287t.712.287q.275.275.275.7t-.275.7zm6.6 0l3.875 3.9q.275.275.288.688t-.288.712q-.275.275-.7.275t-.7-.275l-4.6-4.6q-.15-.15-.213-.325T12.026 12t.063-.375t.212-.325l4.6-4.6q.275-.275.688-.287t.712.287q.275.275.275.7t-.275.7z"/>
            </svg>
            Volver
        </a>
    </div>

    <h2 class="text-center my-4"><i>Ingresa la tienda a eliminar:</i></h2>

    <div class="container d-flex justify-content-center my-5 p-3">
        <div class="card p-4 shadow rounded w-100" style="max-width: 400px;">
            <form action="procesarEliminarTienda.php" method="post" class="row g-3">

                <div class="col-12">
                    <label for="searchTienda" class="form-label">Busca la tienda:</label>
                    <input type="text" id="searchTienda" class="form-control" placeholder="Escribe la dirección de la tienda..." autocomplete="off">
                    <input type="hidden" name="idTienda" id="id_tienda">
                    <div id="listaTiendas" class="border rounded mt-2" style="max-height: 200px; overflow-y: auto;"></div>
                </div>

                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-danger mt-3">Eliminar</button>
                </div>

            </form>
        </div>
    </div>

    <footer class="bg-dark text-white mt-5 p-5">
        <div class="container d-flex justify-content-between align-items-center flex-wrap">
            <div class="mb-3">
                <p class="mb-1">2025 GAME. Todos los derechos reservados</p>
            </div>
            <div class="text-end">
                <img src="../../imagenes/creativeCommons.png" alt="Creative Commons" class="img-fluid" style="width: 40%;">
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Detecta cuando el usuario escribe algo en el buscador de tiendas
    document.getElementById("searchTienda").addEventListener("input", function () {
        let texto = this.value;

        // Si escribió menos de 2 caracteres, se limpia la lista y no se hace búsqueda
        if (texto.length < 2) {
            document.getElementById("listaTiendas").innerHTML = "";
            return;
        }

        // Llama al servidor para buscar tiendas que coincidan con lo escrito
        fetch("buscarTienda.php?query=" + texto)
            .then(res => res.json())
            .then(data => {
                const lista = document.getElementById("listaTiendas");
                lista.innerHTML = ""; // Limpia resultados anteriores

                // Crea un elemento por cada tienda encontrada
                data.forEach(tienda => {
                    const item = document.createElement("div");
                    item.className = "item-tienda p-2 border-bottom"; // Estilo visual
                    item.textContent = tienda.direccion;

                    // Guarda datos de la tienda dentro del elemento
                    item.dataset.id = tienda.id_tienda;
                    item.dataset.nombre = tienda.direccion;

                    // Cuando el usuario hace clic, se selecciona la tienda y se llena el formulario
                    item.onclick = () => {
                        document.getElementById("searchTienda").value = item.dataset.nombre;
                        document.getElementById("id_tienda").value = item.dataset.id;
                        lista.innerHTML = ""; // Oculta la lista después de elegir
                    };

                    lista.appendChild(item); // Agrega el ítem a la lista visible
                });
            });
    });
</script>

</body>
</html>
