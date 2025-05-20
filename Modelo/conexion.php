<?php
class Conexion {
    private $mySQLI;
    private $sql;
    private $result;
    private $filasAfectadas;
    private $citaId;

    public function abrir(){
        $this->mySQLI = new mysqli("localhost", "root", "", "citas");
        if ($this->mySQLI->connect_error) {
            die("Error de conexión: " . $this->mySQLI->connect_error);
        }
    }

    public function cerrar(){
        $this->mySQLI->close();
    }

    public function consulta($sql) {
        $this->sql = $sql;
        $this->result = $this->mySQLI->query($this->sql);
        $this->filasAfectadas = $this->mySQLI->affected_rows;
        $this->citaId = $this->mySQLI->insert_id;
    }

    public function obtenerResult(){
        return $this->result;
    }

    public function obtenerFilasAfectadas(){
        return $this->filasAfectadas;
    }

    public function obtenerCitaId(){
        return $this->citaId;
    }
}
?>