<?php
class Movimiento extends Trabajador{

    protected $id_movimiento;
    protected $tipo;
    protected $fecha;
    protected $cantidad;
    protected $id_trabajador;
    protected $id_copia;

    public function __construct($pIdMovimiento,$pTipo,$pCantidad,$pIdTrabajador,$pIdCopia) {
        $this->id_movimiento = $pIdMovimiento;
        $this->tipo = $pTipo;
        $this->fecha = date("d-m-y");
        $this->cantidad = $pCantidad;
        $this->id_trabajador = $pIdTrabajador;
        $this->id_copia = $pIdCopia;
    }

    public function getIdMovimiento() {
        return $this->id_movimiento;
    }

    public function setIdMovimiento($pIdMovimiento) {
        $this->id_movimiento = $pIdMovimiento;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($pTipo) {
        $this->tipo = $pTipo;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($pFecha) {
        $this->fecha = $pFecha;
    }

    public function setFechaHoy() {
        $this->fecha = date("d-m-y");
    }
    public function getCantidad() {
        return $this->cantidad;
    }

    public function setCantidad($pCantidad) {
        $this->cantidad = $pCantidad;
    }

    public function getIdTrabajador() {
        return $this->id_trabajador;
    }

    public function setIdTrabajador($pIdTrabajador) {
        $this->id_trabajador = $pIdTrabajador;
    }

    public function getIdCopia() {
        return $this->id_copia;
    }

    public function setIdCopia($pIdCopia) {
        $this->id_copia = $pIdCopia;
    }

        //ToDO funcion que cargue Movimientos de la BD
}
?>
