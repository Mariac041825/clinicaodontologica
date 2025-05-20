<?php
class Controlador {
    public function verPagina($ruta) {
        require_once $ruta;
    }

    public function agregarCita($doc, $med, $fec, $hor, $con) {
        $cita = new Cita(null, $fec, $hor, $doc, $med, $con, "Solicitada", "Ninguna");
        $gestorCita = new GestorCita();
        $gestorCita->agregarCita($cita);
    }
}
?>