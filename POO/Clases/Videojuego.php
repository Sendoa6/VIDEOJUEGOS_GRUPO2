<?php
    include '../BD/Conexiones.php';
class Videojuego{

    protected $id_videojuego;
    protected $titulo;
    protected $anio_publicacion;
    protected $estudio_desarrollo;
    protected $plataforma; 
    protected $precio_nuevo;
    protected $precio_seminuevo;

    public function __construct($pIdVideojuego,$pTitulo,$pAnioPublicacion,$pEstudioDesarrollo,$pPlataforma,$pPrecioNuevo,$pPrecioSemiNuevo) {
        $this->id_videojuego = $pIdVideojuego;
        $this->titulo = $pTitulo;
        $this->anio_publicacion = $pAnioPublicacion;
        $this->estudio_desarrollo = $pEstudioDesarrollo;
        $this->plataforma = $pPlataforma;
        $this->precio_nuevo = $pPrecioNuevo;
        $this->precio_seminuevo = $pPrecioSemiNuevo;
    }

    public function getIdVideojuego() {
        return $this->id_videojuego;
    }

    public function setIdVideojuego($pIdVideojuego) {
        $this->id_videojuego = $pIdVideojuego;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($pTitulo) {
        $this->titulo = $pTitulo;
    }

    public function getAnioPublicacion() {
        return $this->anio_publicacion;
    }

    public function setAnioPublicacion($pAnioPublicacion) {
        $this->anio_publicacion = $pAnioPublicacion;
    }

    public function getEstudioDesarrollo() {
        return $this->estudio_desarrollo;
    }

    public function setEstudioDesarrollo($pEstudioDesarrollo) {
        $this->estudio_desarrollo = $pEstudioDesarrollo;
    }

    public function getPlataforma() {
        return $this->plataforma;
    }

    public function setPlataforma($pPlataforma) {
        $this->plataforma = $pPlataforma;
    }

    public function getPrecioNuevo() {
        return $this->precio_nuevo;
    }

    public function setPrecioNuevo($pPrecioNuevo) {
        $this->precio_nuevo = $pPrecioNuevo;
    }

    public function getPrecioSemiNuevo() {
        return $this->precio_seminuevo;
    }

    public function setPrecioSemiNuevo($pPrecioSemiNuevo) {
        $this->precio_seminuevo = $pPrecioSemiNuevo;
    }

        //ToDO funcion que cargue videojuegos de la BD
        public function cargarVideojuegosBD($listaVideojuegos){
            global $conexion;
            $query = "SELECT * FROM videojuego";

            $execDatos = mysqli_query($conexion, $query);

            if ($execDatos && mysqli_num_rows($execDatos) > 0) {
                while ($datosVideojuegos = mysqli_fetch_assoc($execDatos)) {

                    $listaVideojuegos[] = new Videojuego(
                        $datosVideojuegos['id_videojuego'],
                        $datosVideojuegos['titulo'],
                        $datosVideojuegos['anio_publicacion'],
                        $datosVideojuegos['estudio_desarrollo'],
                        $datosVideojuegos['plataforma'],
                        $datosVideojuegos['precio_nuevo'],
                        $datosVideojuegos['precio_seminuevo']
                    );
                }
            }

            return $listaVideojuegos;
        }
}
?>
