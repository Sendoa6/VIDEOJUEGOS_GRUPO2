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
    <title>Nueva Copia</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../estilos/estilosNuevaCopia.css">
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
        <a href="indexCopias.php" class="btn btn-light hover-scale shadow rounded d-inline-flex align-items-center hover-scale">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="me-2" viewBox="0 0 24 24">
                <path d="m7.825 12l3.875 3.9q.275.275.288.688t-.288.712q-.275.275-.7.275t-.7-.275l-4.6-4.6q-.15-.15-.213-.325T5.426 12t.063-.375t.212-.325l4.6-4.6q.275-.275.688-.287t.712.287q.275.275.275.7t-.275.7zm6.6 0l3.875 3.9q.275.275.288.688t-.288.712q-.275.275-.7.275t-.7-.275l-4.6-4.6q-.15-.15-.213-.325T12.026 12t.063-.375t.212-.325l4.6-4.6q.275-.275.688-.287t.712.287q.275.275.275.7t-.275.7z"/>
            </svg>
            Volver
        </a>
    </div>

    <!-- TITULO -->
    <h2 class="text-center my-4"><i>Ingrese los datos de la copia:</i></h2>

    <!-- FORMULARIO -->
    <div class="container d-flex justify-content-center my-5">
        <div class="card p-4 shadow rounded w-100" style="max-width: 500px;">
            <form action="tratarNuevaCopia.php" method="post" class="row g-3">

                <!-- Nombre del videojuego con autocomplete -->
                <div class="col-12">
                    <label for="searchJuego" class="form-label">Nombre del videojuego:</label>
                    <input type="text" id="searchJuego" class="form-control" placeholder="Escribe el nombre..." autocomplete="off">
                    <div id="listaJuegos" class="autocomplete-list"></div>
                    <input type="hidden" name="id_videojuego" id="id_videojuego" required>
                </div>

                <!-- Precio de compra -->
                <div class="col-12">
                    <label for="precio_compra" class="form-label">Precio de compra:</label>
                    <input type="number" step="0.01" name="precio_compra" id="precio_compra" class="form-control" required>
                </div>

                <!-- Unidades -->
                <div class="col-12">
                    <label for="unidades" class="form-label">Unidades:</label>
                    <input type="number" name="unidades" id="unidades" class="form-control" required>
                </div>

                <!-- Es nuevo -->
                <div class="col-12">
                    <label class="form-label">Es nuevo?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="nuevo" id="nuevoSi" value="nuevo" required>
                        <label class="form-check-label" for="nuevoSi">Sí</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="nuevo" id="nuevoNo" value="seminuevo">
                        <label class="form-check-label" for="nuevoNo">No</label>
                    </div>
                </div>

                <!-- Botón enviar -->
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary mt-3">Enviar</button>
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
                <img src="../imagenes/creativeCommons.png" alt="Creative Commons" class="img-fluid" style="width: 40%;">
            </div>

        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Detecta cuando el usuario escribe en el campo de búsqueda
    document.getElementById("searchJuego").addEventListener("input", function () {
        let texto = this.value;

        // Si el usuario ha escrito menos de 2 caracteres, se limpia la lista y no busca nada
        if (texto.length < 2) {
            document.getElementById("listaJuegos").innerHTML = "";
            return;
        }

        // Envía la búsqueda al servidor y recibe los resultados en JSON
        fetch("buscarJuegos.php?query=" + texto)
            .then(res => res.json())
            .then(data => {
                const lista = document.getElementById("listaJuegos");
                lista.innerHTML = ""; // Limpia resultados anteriores

                // Crea un elemento visual por cada juego encontrado
                data.forEach(juego => {
                    const item = document.createElement("div");
                    item.className = "item-juego p-2 border-bottom"; // Estilos del item
                    item.textContent = `${juego.titulo} (${juego.plataforma})`;

                    // Guarda información del juego en atributos del elemento
                    item.dataset.id = juego.id_videojuego;
                    item.dataset.nombre = juego.titulo;

                    // Cuando el usuario hace clic en un juego, se selecciona y se llena el input
                    item.onclick = () => {
                        document.getElementById("searchJuego").value = item.dataset.nombre;
                        document.getElementById("id_videojuego").value = item.dataset.id;
                        lista.innerHTML = ""; // Oculta la lista después de seleccionar
                    };

                    lista.appendChild(item); // Agrega el resultado a la lista
                });
            });
    });
</script>

</body>
</html>
