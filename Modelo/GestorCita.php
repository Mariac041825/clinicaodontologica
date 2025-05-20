<?php
class GestorCita {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function agregarCita(Cita $cita) {
        $this->conexion->abrir();
        $fecha = $cita->obtenerFecha();
        $hora = $cita->obtenerHora();
        $paciente = $cita->obtenerPaciente();
        $medico = $cita->obtenerMedico();
        $consultorio = $cita->obtenerConsultorio();
        $estado = $cita->obtenerEstado();
        $observaciones = $cita->obtenerObservaciones();

        $sql = "INSERT INTO citas (CitFecha, CitHora, CitPaciente, CitMedico, CitConsultorio, CitEstado, CitObservaciones)
                VALUES ('$fecha', '$hora', '$paciente', '$medico', '$consultorio', '$estado', '$observaciones')";
        $this->conexion->consulta($sql);
        $citaId = $this->conexion->obtenerCitaId();
        $this->conexion->cerrar();
        return $citaId;
    }

    public function consultarCitaPorId($id) {
        $this->conexion->abrir();
        $sql = "SELECT pacientes., medicos., consultorios., citas.
                FROM Pacientes AS pacientes
                JOIN citas ON citas.CitPaciente = pacientes.PacIdentificacion
                JOIN Medicos AS medicos ON citas.CitMedico = medicos.MedIdentificacion
                JOIN Consultorios AS consultorios ON citas.CitConsultorio = consultorios.ConNumero
                WHERE citas.CitNumero = $id";
        $this->conexion->consulta($sql);
        $result = $this->conexion->obtenerResult();
        $this->conexion->cerrar();
        return $result;
    }

    public function consultarCitasPorDocumento($doc) {
        $this->conexion->abrir();
        $sql = "SELECT * FROM citas WHERE CitPaciente = '$doc' AND CitEstado = 'Solicitada'";
        $this->conexion->consulta($sql);
        $result = $this->conexion->obtenerResult();
        $this->conexion->cerrar();
        return $result;
    }

    public function cancelarCita($cita) {
        $this->conexion->abrir();
        $sql = "UPDATE citas SET CitEstado = 'Cancelada' WHERE CitNumero = $cita";
        $this->conexion->consulta($sql);
        $filasAfectadas = $this->conexion->obtenerFilasAfectadas();
        $this->conexion->cerrar();
        return $filasAfectadas;
    }

    public function consultarMedicos() {
        $this->conexion->abrir();
        $sql = "SELECT * FROM Medicos";
        $this->conexion->consulta($sql);
        $result = $this->conexion->obtenerResult();
        $this->conexion->cerrar();
        return $result;
    }

    public function consultarConsultorios() {
        $this->conexion->abrir();
        $sql = "SELECT * FROM Consultorios";
        $this->conexion->consulta($sql);
        $result = $this->conexion->obtenerResult();
        $this->conexion->cerrar();
        return $result;
    }

    public function consultarHorasDisponibles($medico, $fecha) {
        $this->conexion->abrir();
        $sql = "SELECT hora FROM horas WHERE hora NOT IN 
                (SELECT CitHora FROM citas WHERE CitMedico = '$medico' AND CitFecha = '$fecha' AND CitEstado = 'Solicitada')";
        $this->conexion->consulta($sql);
        $result = $this->conexion->obtenerResult();
        $this->conexion->cerrar();
        return $result;
    }
}
?>