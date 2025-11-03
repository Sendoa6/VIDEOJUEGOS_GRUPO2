<?php
class Videojuego{

    protected $id_videojuego;
    protected $titulo;
    protected $anio_publicacion;
    protected $estudio_desarrollo;
    protected $plataforma; 

    public function __construct($pIdVideojuego,$pTitulo,$pAnioPublicacion,$pEstudioDesarrollo,$pPlataforma) {
        $this->id_videojuego = $pIdVideojuego;
        $this->titulo = $pTitulo;
        $this->anio_publicacion = $pAnioPublicacion;
        $this->estudio_desarrollo = $pEstudioDesarrollo;
        $this->plataforma = $pPlataforma;
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
}
?>
