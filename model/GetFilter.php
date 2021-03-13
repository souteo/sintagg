<?php
require '../connection/Conexion.php';

class GetFilter extends Conexion{
    public function GetFilter(){
        parent::__construct();
    }
    
    
    public function getTodosLosColores(){
        $sql= "SELECT id_color AS ID, nombre_color AS NOMBRE FROM colores";
        $sentencia = $this->conexiondb->prepare($sql);
        
        $sentencia->execute();
        
        return $sentencia;
        
        $sentencia->closeCursor();
        
        
        $this->conexiondb = null;
    }
}