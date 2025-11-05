<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de videojuegos</title>
    <link rel="stylesheet" href="../estilos/estilosNuevaCopia.css">
    <link rel="icon" href="../imagenes/favicon.png">

</head>

<body>
    <header>
        <img src="../imagenes/logoGame.png" alt="GAME" width="10%">
        <h1>GESTIÓN DE VIDEOJUEGOS</h1>
        <img src="../imagenes/logoAltF4.png" alt="Alt+F4" width="6%">
    </header>

    <div class="cajaVolver">
        <a href="../html/indexCopias.html" class="botonVolver">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="currentColor" d="m7.825 12l3.875 3.9q.275.275.288.688t-.288.712q-.275.275-.7.275t-.7-.275l-4.6-4.6q-.15-.15-.213-.325T5.426 12t.063-.375t.212-.325l4.6-4.6q.275-.275.688-.287t.712.287q.275.275.275.7t-.275.7zm6.6 0l3.875 3.9q.275.275.288.688t-.288.712q-.275.275-.7.275t-.7-.275l-4.6-4.6q-.15-.15-.213-.325T12.026 12t.063-.375t.212-.325l4.6-4.6q.275-.275.688-.287t.712.287q.275.275.275.7t-.275.7z"/></svg>
        </a>
    </div>

    <h2><i>Ingrese los datos de la copia:</i></h2>

    <div class="cajaFormularioCopia">
        <div class="formularioNuevaCopia">
            <form action="../php/tratarNuevaCopia.php" method="post" class="nuevo">

                Nombre del videojuego:<br>
                <input class="inputNombre" type="text" id="searchJuego" placeholder="Escribe el nombre..." autocomplete="off">
                <div id="listaJuegos" class="autocomplete-list"></div>

                <input type="hidden" name="id_videojuego" id="id_videojuego" required>

                <br><br>

                Precio de compra:
                <input type="float" name="precio_compra" required>
                <br><br>

                Unidades:
                <input type="number" name="unidades" required>
                <br><br>

                Es nuevo?
                <label>
                    <input type="radio" name="nuevo" value="si" required> Sí
                </label>
                <label>
                    <input type="radio" name="nuevo" value="no"> No
                </label>
                <br><br>

                <button type="submit">Enviar</button>
            </form>
        </div>
    </div>

    <footer>
        <div class="ordenarFooter">
            <div>
                <p>2025 GAME. Todos los derechos reservados</p>
                <p>
                    <a href="https://www.facebook.com/?locale=es_ES">Facebook</a><br>
                    <a href="https://www.instagram.com/">Instagram</a><br>
                    <a href="https://x.com/?lang=es">Twitter</a>
                </p>
                <p>
                    <a href="https://www.google.com/maps">📍Localización</a><br>
                    <a href="https://workspace.google.com/intl/es/gmail/">📩Contáctanos</a>
                </p>
            </div>
            <div class="imgCreativeCommons">
                <img src="../imagenes/creativeCommons.png" alt="" width="30%">
            </div>
        </div>
    </footer>

    <script>
        document.getElementById("searchJuego").addEventListener("input", function () {
            let texto = this.value;

            if (texto.length < 2) {
                document.getElementById("listaJuegos").innerHTML = "";
                return;
            }

            fetch("../php/buscarJuegos.php?query=" + texto)
                .then(res => res.json())
                .then(data => {
                    const lista = document.getElementById("listaJuegos");
                    lista.innerHTML = "";

                    data.forEach(juego => {
                        const item = document.createElement("div");
                        item.className = "item-juego";
                        item.textContent = `${juego.titulo} (${juego.plataforma})`;
                        item.dataset.id = juego.id_videojuego;
                        item.dataset.nombre = juego.titulo;

                        item.onclick = () => {
                            document.getElementById("searchJuego").value = item.dataset.nombre;
                            document.getElementById("id_videojuego").value = item.dataset.id;
                            lista.innerHTML = "";
                        };

                        lista.appendChild(item);
                    });
                });
        });
    </script>

</body>
</html>
