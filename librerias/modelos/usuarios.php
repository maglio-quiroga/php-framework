<?php

namespace librerias\modelos;
use mysqli;

class Modelo{

    protected $server=host;
    protected $user=user;
    protected $pass=pass;
    protected $db=db;
    protected $conn;
    protected $query;
    protected $tabla;

    public function __construct($tabla){
        $this->conexion();
        $this->tabla = $tabla
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
    public function insertar($datos){

        $columnas = array_keys($datos);
        $columnas = implode(', ',$datos);

        $valores = array_values($datos);
        $valores = "'". implode("', '",$datos) ."'";

        $sql = "INSERT INTO {$this->tabla} ({$columnas}) VALUES ({$valores})";
        $this->query = $this->conn->query($sql);
    }
    public function actualizar($id, $datos){

        $campos  = [];
        foreach($datos as $key => $value){
            $campos[] = "{$key} = '{$value}'";
        }
        $campos = implode(', ',$campos);
        $sql = "UPDATE {$this->tabla} SET {$campos} WHERE id={$id}";
        $this->query = $this->conn->query($sql);
    }
    public function eliminar($id){

        $sql = "DELETE FROM {$this->table} WHERE id={$id}";
        $thsi->query = $this->conn->query($sql);
    }
    
}

?>