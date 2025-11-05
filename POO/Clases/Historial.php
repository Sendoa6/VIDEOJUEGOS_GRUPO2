<?php
    include '../BD/Conexiones.php';
class Historial{

    protected $id_historial;
    protected $concepto;
    protected $fecha;
    protected $id_trabajador; 

    public function __construct($pIdHistorial, $pConcepto, $pIdTrabajador) {
        $this->id_historial = $pIdHistorial;
        $this->concepto = $pConcepto;
        $this->fecha = date("d-m-y");
        $this->id_trabajador = $pIdTrabajador;
    }

    public function getIdHistorial() {
        return $this->id_historial;
    }

    public function getConcepto() {
        return $this->concepto;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getIdTrabajador() {
        return $this->id_trabajador;
    }

    public function setIdHistorial($id_historial) {
        $this->id_historial = $id_historial;
    }

    public function setConcepto($concepto) {
        $this->concepto = $concepto;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }
    public function setFechaHoy() {
        $this->fecha = date("d-m-y");
    }

    public function setIdTrabajador($id_trabajador) {
        $this->id_trabajador = $id_trabajador;
    }
        //ToDO funcion que cargue Historiales de la BD
        public function cargarHistorialesBD($listaHistoriales){
            global $conexion;
            $query = "SELECT * FROM historial";

            $execDatos = mysqli_query($conexion, $query);

            if ($execDatos && mysqli_num_rows($execDatos) > 0) {
                while ($datosHistorial = mysqli_fetch_assoc($execDatos)) {

                    $listaHistoriales[] = new Historial(
                        $datosHistorial['id_historial'],
                        $datosHistorial['concepto'],
                        $datosHistorial['id_trabajador']
                    );
                }
            }

            return $listaHistoriales;
        }
}
?>
