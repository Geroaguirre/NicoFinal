<?php

require_once 'Conexion.php';
require_once 'Materia.php'

class Profesor extends conexion
{
    public $id, $nombre, $apellido, $email;

    public function crear()
    {
        $this->conectar;
        $sql = "INSERT INTO profesor (nombre, apellido, email) VALUES ('$this->nombre', '$this->apellido', '$this->email')";
        $pre = $this->con->prepare($sql);
        $pre->bind_param("sss", $this->nombre, $this->apellido, $this->email);
        $pre->execute();
    }

    public function borrar()
    {
        $this->conectar;
        $sql = "DELETE FROM profesor WHERE id = '$this->id'";
        $pre = $this->con->prepare($sql);
        $pre->bind_param("i", $this->id);
        $pre->execute();
    }

    public function actualizar()
    {
        $this->conectar;
        $sql = "UPDATE profesor SET nombre = '$this->nombre', apellido = '$this->apellido', email = '$this->email' WHERE id = '$this->id'";
        $pre = $this->con->prepare($sql);
        $pre->bind_param("sssi", $this->nombre, $this->apellido, $this->email, $this->id);
        $pre->execute();
    }

    public static function mostrar()
    {
        $conexion = new Conexion();
        $conexion->conectar();
        $result = mysqli_prepare($conexion->con, "SELECT * FROM profesor");
        $result->execute();
        $valoresDb = $result->get_result();
        $profesores = [];
        while ($profesor = $valoresDb->fetch_object(Profesor::class)) {
            $profesores[] = $profesor;
        }
        return $profesores;
    }
}