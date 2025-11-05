<?php
    include '../BD/Conexiones.php';
class Copia extends Almacen{

    protected $id_copia;
    protected $precio_compra;
    protected $nuevo;
    protected $unidades; 
    protected $id_almacen;
    protected $id_videojuego;

    public function __construct($pIdCopia,$pPrecioCompra,$pNuevo,$pUnidades,$pIdAlmacen,$pIdVideojuego) {
        $this->id_copia = $pIdCopia;
        $this->precio_compra = $pPrecioCompra;
        $this->nuevo = $pNuevo;
        $this->unidades = $pUnidades;
        $this->id_almacen = $pIdAlmacen;
        $this->id_videojuego = $pIdVideojuego;
    }

    public function getIdCopia() {
        return $this->id_copia;
    }

    public function setIdCopia($pIdCopia) {
        $this->id_copia = $pIdCopia;
    }
    public function getPrecioCompra() {
        return $this->precio_compra;
    }

    public function setPrecioCompra($pPrecioCompra) {
        $this->precio_compra = $pPrecioCompra;
    }

    public function getNuevo() {
        return $this->nuevo;
    }

    public function setNuevo($pPrecioNuevo) {
        $this->nuevo = $pPrecioNuevo;
    }

    public function getUnidades() {
        return $this->unidades;
    }

    public function setUnidades($pUnidades) {
        $this->unidades = $pUnidades;
    }

    public function getIdAlmacen() {
        return $this->id_almacen;
    }

    public function setIdAlmacen($pIdAlmacen) {
        $this->id_almacen = $pIdAlmacen;
    }

    public function getIdVideojuego() {
        return $this->id_videojuego;
    }

    public function setIdVideojuego($pIdVideojuego) {
        $this->id_videojuego = $pIdVideojuego;
    }

    //ToDO funcion que cargue Copias de la BD
        public function cargarCopiasBD($listaCopias){
            global $conexion;
            $query = "SELECT * FROM copia";

            $execDatos = mysqli_query($conexion, $query);

            if ($execDatos && mysqli_num_rows($execDatos) > 0) {
                while ($datosCopias = mysqli_fetch_assoc($execDatos)) {

                    $listaCopias[] = new Copia(
                        $datosCopias['id_copia'],
                        $datosCopias['precio_compra'],
                        $datosCopias['nuevo'],
                        $datosCopias['unidades'],
                        $datosCopias['id_almacen'],
                        $datosCopias['id_videojuego']
                    );
                }
            }

            return $listaCopias;
        }
}
?>
