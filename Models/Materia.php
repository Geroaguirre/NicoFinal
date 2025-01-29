<?php
require_once 'Conexion.php';
require_once 'Alumno.php';
require_once 'Profesor.php';

class Materia extends conexion
{
    public $id, $nombre;

    public function crear()
    { $this->conectar;
        $sql = "INSERT INTO materias (nombre) VALUES ('$this->nombre')";
        $pre->bind_param ("s", $this->nombre);
        $pre->execute();
}