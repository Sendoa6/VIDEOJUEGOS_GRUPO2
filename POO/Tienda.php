<?php
    class Tienda{
        protected $id_tienda;
        protected $direccion;
        protected $trabajadores = [];
        protected $almacenes = [];

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
        public function addTrabajador($trabajador) {
            if ($trabajador instanceof Trabajador){
                array_push($this->trabajadores, $trabajador);
            }
        }

        public function addAlmacen($almacen) {
            if ($almacen instanceof Almacen){
                array_push($this->almacenes, $almacen);
            }
        }


    }

?>