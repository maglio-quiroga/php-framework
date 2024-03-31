<?php

namespace librerias\modelos;
use mysqli;

class Usuarios{

    protected $server=host;
    protected $user=user;
    protected $pass=pass;
    protected $db=db;
    protected $conn;
    protected $query;

    public function __construct(){
        $this->conexion();
    }

    public function conexion(){

        $this->conn = new mysqli($this->server,$this->user,$this->pass,$this->db);
        if($this->conn->connect_error){
            die("Error de Conexion: ".$this->conn->connect_error);
        }
    }
    public function consulta($sql){
        $this->query = $this->conn->query($sql);

        if(!$this->query){
            die("Error en la consulta SQL: " . $this->conn->error);
        }else{
            return $this;
        }
    }

    public function todos(){
        $registros = [];
        while ($obj = $this->query->fetch_object()) {
            $registros[] = $obj;
        }
        return $registros;
    }
    
    
}

?>