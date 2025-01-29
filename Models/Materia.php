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
    public function borrar()
    { $this->conectar;
        $sql = "DELETE FROM materias WHERE id = '$this->id'";
        $pre->bind_param ("i", $this->id);
        $pre->execute();
        }
    public function actualizar()
    { $this->conectar;
        $sql = "UPDATE materias SET nombre = '$this->nombre' WHERE id = '$this->id'";
        $pre ->bind_param ("si", $this->nombre, $this->id);
        $pre->execute();
        }
    public static function mostrar()
    {
        $conexion = new Conexion();
        $conexion->conectar();
        $result = mysqli_prepare($conexion->con, "SELECT * FROM materia");
        $result->execute();
        $valoresDb = $result->get_result();
        $materias = [];
        while ($materia = $valoresDb->fetch_object(Materia::class)) { 

            $materias[] = $materia;

        }
        return $materias;
    }
 }