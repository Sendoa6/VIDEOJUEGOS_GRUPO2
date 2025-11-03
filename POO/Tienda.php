<?php
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


    }

?>