<?php
require_once __DIR__ . "/../BD/Conexiones.php";

    class Tienda{
        protected $id_tienda;
        protected $direccion;

        public function __construct($pIdTienda,$pDireccion) {
            $this->id_tienda = $pIdTienda;
            $this->direccion = $pDireccion;
        }

        public function getIdTienda() {
            return $this->id_tienda;
        }

        public function setIdTienda($pId_tienda) {
            $this->id_tienda = $pId_tienda;
        }

        public function getDireccion() {
            return $this->direccion;
        }

        public function setDireccion($pDireccion) {
            $this->direccion = $pDireccion;
        }
        //ToDO funcion que cargue Tiendas de la BD
        public function cargarTiendasBD($listaTiendas){
            global $conexion;
            $query = "SELECT * FROM tienda";

            $execDatos = mysqli_query($conexion, $query);

            if ($execDatos && mysqli_num_rows($execDatos) > 0) {
                while ($datosTiendas = mysqli_fetch_assoc($execDatos)) {

                    $listaTiendas[] = new Tienda(
                        $datosTiendas['id_tienda'],
                        $datosTiendas['direccion']
                    );
                }
            }

            return $listaTiendas;
        }

    }

?>