<?php

require_once 'Conexion.php';
require_once 'Materia.php';

class Alumno extends conexion
{ 
 public $id, $nombre, $apellido, $email;

 public function crear()
  { $this->conectar;
    $sql = "INSERT INTO alumno (nombre, apellido, email) VALUES ('$this->nombre, $this->apellido, $this->email)";
    $pre->bind_param ("sss", $this->nombre, $this->apellido, $this->email);
    $this->ejecutar($sql);
  }

  public function borrar()
  { $this->conectar;
    $sql = "DELETE FROM alumno WHERE id = '$this->id'";
    $this->ejecutar($sql);
    }

    public function actualizar()
    { $this->conectar;
        $sql = "UPDATE alumno SET nombre = '$this->nombre', apellido = '$this->apellido', email = '$this->email' WHERE id = '$this->id'";
        $pre->bind_param ("sss", $this->nombre, $this->apellido, $this->email);
        $this->ejecutar($sql);
    }
    
    public static function mostrar()
    {
        $conexion = new Conexion();
        $conexion->conectar();
        $result = mysqli_prepare($conexion->con, "SELECT * FROM alumno");
        $result->execute();
        $valoresDb = $result->get_result();
        $alumnos = [];
        while ($alumno = $valoresDb->fetch_object(Alumno::class)) { 

            $alumnos[] = $alumno;

        }
        return $alumnos;
    }
}