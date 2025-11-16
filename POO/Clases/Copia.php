<?php
require_once __DIR__ . "/../BD/Conexiones.php";

class Copia {

    protected $id_copia;
    protected $precio_compra;
    protected $nuevo;
    protected $unidades;
    protected $id_tienda;       // ← cambiado
    protected $id_videojuego;

    public function __construct($pIdCopia, $pPrecioCompra, $pNuevo, $pUnidades, $pIdTienda, $pIdVideojuego) {
        $this->id_copia = $pIdCopia;
        $this->precio_compra = $pPrecioCompra;
        $this->nuevo = $pNuevo;
        $this->unidades = $pUnidades;
        $this->id_tienda = $pIdTienda;
        $this->id_videojuego = $pIdVideojuego;
    }

    public function cargarCopiasBD($listaCopias){
        global $conexion;
        $query = "SELECT * FROM copia";

        $execDatos = mysqli_query($conexion, $query);

        if ($execDatos && mysqli_num_rows($execDatos) > 0) {
            while ($datos = mysqli_fetch_assoc($execDatos)) {
                $listaCopias[] = new Copia(
                    $datos['id_copia'],
                    $datos['precio_compra'],
                    $datos['nuevo'],
                    $datos['unidades'],
                    $datos['id_tienda'],      // ← cambiado
                    $datos['id_videojuego']
                );
            }
        }
        return $listaCopias;
    }
}
?>
