<?php
class Paciente {
    private $identificacion;
    private $nombres;
    private $apellidos;
    private $telefono;
    private $correo;

    public function __construct($id, $nom, $ape, $tel, $email) {
        $this->identificacion = $id;
        $this->nombres = $nom;
        $this->apellidos = $ape;
        $this->telefono = $tel;
        $this->correo = $email;
    }

    public function obtenerIdentificacion() {
        return $this->identificacion;
    }

    public function obtenerNombres() {
        return $this->nombres;
    }

    public function obtenerApellidos() {
        return $this->apellidos;
    }

    public function obtenerTelefono() {
        return $this->telefono;
    }

    public function obtenerCorreo() {
        return $this->correo;
    }
}
?>