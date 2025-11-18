<?php
require_once __DIR__ . "/../BD/Conexiones.php";
require_once __DIR__ . "/../Clases/Tienda.php";
require_once __DIR__ . "/../Clases/Trabajador.php";
require_once __DIR__ . "/../Clases/Copia.php";
require_once __DIR__ . "/../Clases/Videojuego.php";
require_once __DIR__ . "/../Clases/Historial.php";

class Main {
    private $conexion;

    public $copias = [];
    public $historiales = [];
    public $tiendas = [];
    public $trabajadores = [];
    public $videojuegos = [];

    public function __construct(){
        global $conexion;
        $this->conexion = $conexion;
    }

    public function cargarTodo(){
        $copias = new Copia(0, 0, true, 0, 0, 0);
        $this->copias = $copias->cargarCopiasBD($this->copias);

        $historiales = new Historial(0, "", 0);
        $this->historiales = $historiales->cargarHistorialesBD($this->historiales);

        $tiendas = new Tienda(0, "");
        $this->tiendas = $tiendas->cargarTiendasBD($this->tiendas);

        $trabajadores = new Trabajador(0, "", "", "", "", "", "", "", "", "");
        $this->trabajadores = $trabajadores->cargarTrabajadorBD($this->trabajadores);

        $videojuegos = new Videojuego(0, "", 0, "", "", 0, 0);
        $this->videojuegos = $videojuegos->cargarVideojuegosBD($this->videojuegos);
    }

    public function cuantosTrabajadores(){
        echo count($this->trabajadores);
    }

    public function queVideojuegos($plataforma) {

        $encontrado = false;

        foreach ($this->videojuegos as $videojuego) {
            if (strtolower($videojuego->getPlataforma()) == strtolower($plataforma)) {
                $encontrado = true;

                echo "<tr>";
                echo "<td>{$videojuego->getTitulo()}</td>";
                echo "<td>{$videojuego->getAnioPublicacion()}</td>";
                echo "<td>{$videojuego->getEstudioDesarrollo()}</td>";
                echo "<td>{$videojuego->getPlataforma()}</td>";
                echo "<td>{$videojuego->getPrecioNuevo()}</td>";
                echo "<td>{$videojuego->getPrecioSemiNuevo()}</td>";
                echo "</tr>";
            }
        }

        if (!$encontrado) {
            echo "<tr><td colspan='6' class='text-danger fw-bold text-center'>No hay videojuegos para '{$plataforma}'</td></tr>";
        }
    }

}
