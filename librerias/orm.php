<?php

include "conexion.php";

class Orm(){

    protected $tabla;
    protected $db;

    public function __construct($tabla){

        $this->tabla = $tabla;
        $this->db = $conn;

    }
    public function selectall(){
        $smt = $this->db->prepare("SELECT * FROM {$this->tabla}");
        $smt->execute();
        $smt->close();
        return $smt->fetch_object();
    }
    public function selectby($id){
        $smt = $this->db->prepare("SELECT * FROM {$this->tabla} WHERE id={$id}");
        $smt->execute();
        $smt->close();
        return $smt->fetch_object();
    }
    public function insert($filas,$valores){
        $smt = $this->db->prepare("INSERT INTO {$this->tabla} $filas VALUES $valores");
        $smt->execute();
        $smt->close();
    }
    public function delete($id){
        $smt = $this->db->prepare("DELETE * FROM {$this->tabla} WHERE id={$id}");
        $smt->execute();
        $smt->close();
    }
    public function update($id,$valores){
        $smt = $this->db->prepare("UPDATE {$this->tabla} SET $valores  WHERE id={$id}");
        $smt->execute();
        $smt->close();
    }

}

?>