<?php
    include '../BD/Conexiones.php';
    class Almacen extends Tienda{
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

    }

?>