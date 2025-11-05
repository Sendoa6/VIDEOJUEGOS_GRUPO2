<?php
require_once "../BD/Conexiones.php"; 
require_once "../Clases/Tienda.php";
require_once "../Clases/Trabajador.php";
require_once "../Clases/Almacen.php";
require_once "../Clases/Copia.php";
require_once "../Clases/Videojuego.php";
require_once "../Clases/Historial.php";

class Main {

    private $conexion;
    public $almacenes = [];
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

        $almacenes = new Almacen(0, 0);
        $this->almacenes = $almacenes->cargarAlmacenesBD($this->almacenes);

        $copias = new Copia(0, 0, true, 0, 0,0);
        $this->copias = $copias->cargarCopiasBD($this->copias);

        $historiales = new Historial(0, "", 0);
        $this->historiales = $historiales->cargarHistorialesBD($this->historiales);

        $tiendas = new Tienda(0, "");
        $this->tiendas = $tiendas->cargarTiendasBD($this->tiendas);

        $trabajadores = new Trabajador(0, "", "", "", "", "", "", "", "", "");
        $this->trabajadores = $trabajadores->cargarTrabajadorBD($this->trabajadores);

        $videojuegos = new Videojuego(0, "",0,"","",0,0);
        $this->videojuegos = $videojuegos->cargarVideojuegosBD($this->videojuegos);
    }
}
