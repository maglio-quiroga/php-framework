<?php

namespace librerias\modelos;
use mysqli;

class Usuarios{

    protected $server=host;
    protected $user=user;
    protected $pass=pass;
    protected $db=db;
    protected $conn;

    public function __construct(){
        $this->conexion();
    }

    public function conexion(){

        $this->conn = new mysqli($this->server,$this->user,$this->pass,$this->db);
        if($this->conn->connect_error){
            die("Error de Conexion: ".$this->conn->connect_error);
        }
    }
}

?>