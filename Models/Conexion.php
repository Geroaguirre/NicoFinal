<?php
class conexion {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "nico";
    private $con;


    public function conectar (){
        $this->con = new mysqli($this->host, $this->user, $this->password, $this->db);
        if ($this->con->connect_error) {
            die("Conexión fallida: " . $this->con->connect_error);
        }
    }
    
}