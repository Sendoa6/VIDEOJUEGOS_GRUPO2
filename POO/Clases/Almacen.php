<?php
require_once __DIR__ . "/../BD/Conexiones.php";

    class Almacen{
        protected $id_almacen;
        protected $id_tienda;

        public function __construct($pIdAlmacen,$pIdTienda) {
            $this->id_almacen = $pIdAlmacen;
            $this->id_tienda = $pIdTienda;
        }

        public function getIdAlmacen() {
            return $this->id_almacen;
        }

        public function setIdAlmacen($pIdAlmacen) {
            $this->id_almacen = $pIdAlmacen;
        }

        public function getIdTienda() {
            return $this->id_tienda;
        }

        public function setIdTienda($pId_tienda) {
            $this->id_tienda = $pId_tienda;
        }

        //ToDO funcion que cargue almacenes de la BD
        public function cargarAlmacenesBD($listaAlmacenes){
            global $conexion;
            $query = "SELECT * FROM almacen";

            $execDatos = mysqli_query($conexion, $query);

            if ($execDatos && mysqli_num_rows($execDatos) > 0) {
                while ($datosAlmacenes = mysqli_fetch_assoc($execDatos)) {

                    $listaAlmacenes[] = new Almacen(
                        $datosAlmacenes['id_almacen'],
                        $datosAlmacenes['id_tienda']
                    );
                }
            }

            return $listaAlmacenes;
        }

    }

?>