<?php
session_start();
include '../../DataBase/conexiones.php';
// Solo los administradores pueden acceder
if (!isset($_SESSION['id_trabajador']) || $_SESSION['admin'] != 1) {
    echo "
    <script>
        alert('Acceso restringido. Solo los administradores pueden entrar en esta sección.\\n\\nSi necesitas permisos, por favor habla con el encargado o un administrador autorizado.');
        window.location.href = '/paginaWeb/php/index.php';
    </script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Trabajador</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../estilos/estilosEliminarJuego.css">
    <link rel="icon" href="../../imagenes/favicon.png">
</head>
<body>

    <!-- HEADER -->
    <header class="bg-light border-bottom py-3 d-flex align-items-center justify-content-center px-4 gap-3">
        <a href="../index.php"><img src="../../imagenes/logoGame.png" alt="GAME" class="img-fluid header-img"></a>

        <h1 class="text-center m-0 flex-grow-1">GESTIÓN DE VIDEOJUEGOS</h1>

        <a href="../Sessions/cerrar_sesion.php">
            <img src="../../imagenes/iconoCerrarSession.png" alt="Cerrar sesión" class="header-img-small">
        </a>
    </header>

    <!-- BOTON VOLVER -->
    <div class="container my-4">
        <a href="indexTrabajadores.php" class="btn hover-scale btn-light shadow rounded d-inline-flex align-items-center hover-scale">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="me-2" viewBox="0 0 24 24">
                <path d="m7.825 12l3.875 3.9q.275.275.288.688t-.288.712q-.275.275-.7.275t-.7-.275l-4.6-4.6q-.15-.15-.213-.325T5.426 12t.063-.375t.212-.325l4.6-4.6q.275-.275.688-.287t.712.287q.275.275.275.7t-.275.7zm6.6 0l3.875 3.9q.275.275.288.688t-.288.712q-.275.275-.7.275t-.7-.275l-4.6-4.6q-.15-.15-.213-.325T12.026 12t.063-.375t.212-.325l4.6-4.6q.275-.275.688-.287t.712.287q.275.275.275.7t-.275.7z"/>
            </svg>
            Volver
        </a>
    </div>

    <!-- TITULO -->
    <h2 class="text-center my-4"><i>Ingresa el trabajador a eliminar:</i></h2>

    <!-- FORMULARIO -->
    <div class="container d-flex justify-content-center my-5 p-3">
        <div class="card p-4 shadow rounded w-100" style="max-width: 400px;">
            <form action="procesarEliminarTrabajador.php" method="post" class="row g-3">

                <div class="col-12">
                    <label for="searchTrabajador" class="form-label">Busca el trabajador:</label>
                    <input type="text" id="searchTrabajador" class="form-control" placeholder="Escribe el nombre del trabajador..." autocomplete="off">
                    <input type="hidden" name="idTrabajador" id="id_trabajador">
                    <div id="listaTrabajadores" class="border rounded mt-2" style="max-height: 200px; overflow-y: auto;"></div>
                </div>

                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-danger mt-3">Eliminar</button>
                </div>

            </form>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="bg-dark text-white mt-5 p-5">
        <div class="container d-flex justify-content-between align-items-center flex-wrap">

            <div class="mb-3">
                <p class="mb-1">2025 GAME. Todos los derechos reservados</p>

                <p class="mb-1">
                    <a href="https://www.game.es/" class="text-white text-decoration-underline">Página Oficial de GAME</a><br>
                    <a href="https://workspace.google.com/intl/es/gmail/" class="text-white text-decoration-underline">Contacto de GAME</a><br>
                </p>
            </div>
            <div class="mb-3">
                <p class="mb-1"><i>Sitio web desarrollado por ALT+F4</i></p>
                <p class="mb-1">
                    <a href="https://workspace.google.com/intl/es/gmail/" class="text-white text-decoration-underline">📲Contacto</a><br>
                    <a href="https://www.google.com/maps" class="text-white text-decoration-underline">🌍Localización</a>
                </p>
            </div>

            <div class="text-end">
                <img src="../../imagenes/creativeCommons.png" alt="Creative Commons" class="img-fluid" style="width: 40%;">
            </div>

        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


    <script>
    document.getElementById("searchTrabajador").addEventListener("input", function () {
        let texto = this.value.trim();

        if (texto.length < 2) {
            document.getElementById("listaTrabajadores").innerHTML = "";
            return;
        }

        fetch("../TratarTrabajadores/buscarTrabajadores.php?query=" + encodeURIComponent(texto))
            .then(res => res.json())
            .then(data => {
                const lista = document.getElementById("listaTrabajadores");
                lista.innerHTML = "";

                data.forEach(trabajador => {
                    const item = document.createElement("div");
                    item.className = "item-trabajador p-2 border-bottom";
                    item.textContent = `${trabajador.nombre} ${trabajador.apellidos}`;
                    item.dataset.id = trabajador.id_trabajador;
                    item.dataset.nombre = `${trabajador.nombre} ${trabajador.apellidos}`;

                    item.onclick = () => {
                        document.getElementById("searchTrabajador").value = item.dataset.nombre;
                        document.getElementById("id_trabajador").value = item.dataset.id;
                        lista.innerHTML = "";
                    };

                    lista.appendChild(item);
                });
            })
            .catch(err => console.error("Error:", err));
    });
    </script>

</body>
</html>
