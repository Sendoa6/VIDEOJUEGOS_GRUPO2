<?php
    include '../BD/Conexiones.php';
class Trabajador{
    protected $id_trabajador;
    protected $nombre;
    protected $apellidos;
    protected $dni;
    protected $fecha_nacimiento;
    protected $email;
    protected $usuario;
    protected $contrasena_hash;
    protected $admin;
    protected $id_tienda;

    public function __construct($pId_trabajador,$pNombre,$pApellidos,$pDni,$pFecha_nacimiento,$pEmail,$pUsuario,$pContrasena_hash,$pAdmin,$pIdTienda) {
        $this->id_trabajador = $pId_trabajador;
        $this->nombre = $pNombre;
        $this->apellidos = $pApellidos;
        $this->dni = $pDni;
        $this->fecha_nacimiento = $pFecha_nacimiento;
        $this->email = $pEmail;
        $this->usuario = $pUsuario;
        $this->contrasena_hash = hash('sha256', $pContrasena_hash);
        $this->admin = $pAdmin;
        $this->id_tienda = $pIdTienda;
    }

    public function getIdTrabajador() {
        return $this->id_trabajador;
    }

    public function setIdTrabajador($pId_trabajador) {
        $this->id_trabajador = $pId_trabajador;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($pNombre) {
        $this->nombre = $pNombre;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function setApellidos($pApellidos) {
        $this->apellidos = $pApellidos;
    }

    public function getDni() {
        return $this->dni;
    }

    public function setDni($pDni) {
        $this->dni = $pDni;
    }

    public function getFechaNacimiento() {
        return $this->fecha_nacimiento;
    }

    public function setFechaNacimiento($pFecha_nacimiento) {
        $this->fecha_nacimiento = $pFecha_nacimiento;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($pEmail) {
        $this->email = $pEmail;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($pUsuario) {
        $this->usuario = $pUsuario;
    }

    public function getContrasenaHash() {
        return $this->contrasena_hash;
    }

    public function setContrasenaHash($pContrasena_hash) {
        $this->contrasena_hash = $pContrasena_hash;
    }
    public function getAdmin() {
        return $this->admin;
    }

    public function setAdmin($pAdmin) {
        $this->admin = $pAdmin;
    }
    public function getIdTienda() {
        return $this->id_tienda;
    }

    public function setIdTienda($pId_tienda) {
        $this->id_tienda = $pId_tienda;
    }

        //ToDO funcion que cargue trabajadores de la BD
        public function cargarTrabajadorBD($listaTrabajadores){
            global $conexion;
            $query = "SELECT * FROM trabajador";

            $execDatos = mysqli_query($conexion, $query);

            if ($execDatos && mysqli_num_rows($execDatos) > 0) {
                while ($datosTrabajadores = mysqli_fetch_assoc($execDatos)) {

                    $listaTrabajadores[] = new Trabajador(
                        $datosTrabajadores['id_trabajador'],
                        $datosTrabajadores['nombre'],
                        $datosTrabajadores['apellidos'],
                        $datosTrabajadores['dni'],
                        $datosTrabajadores['fecha_nacimiento'],
                        $datosTrabajadores['email'],
                        $datosTrabajadores['usuario'],
                        $datosTrabajadores['contrasena_hash'],
                        $datosTrabajadores['admin'],
                        $datosTrabajadores['id_tienda']
                    );
                }
            }

            return $listaTrabajadores;
        }
}
?>
