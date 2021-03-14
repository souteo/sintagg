<?php
require '../connection/Connection.php';

class GetFilter extends Connection{
    public function GetFilter(){
        parent::__construct();
    }
    
    
    public function getColores(){
        $sql= "SELECT id_color AS ID, nombre_color AS NOMBRE FROM colores";
        $sentencia = $this->conexiondb->prepare($sql);
        
        $sentencia->execute();
        
        return $sentencia;
        
        $sentencia->closeCursor();
        
        
        $this->conexiondb = null;
    }
    
    public function getSizes(){
        $sql= "SELECT id_talles AS ID, nombre_talles AS NOMBRE FROM talles";
        $sentencia = $this->conexiondb->prepare($sql);
        
        $sentencia->execute();
        
        return $sentencia;
        
        $sentencia->closeCursor();
        
        
        $this->conexiondb = null;
    }
    
    public function getDesigns(){
        $sql= "SELECT id_diseño AS ID, nombre_diseño AS NOMBRE FROM diseños";
        $sentencia = $this->conexiondb->prepare($sql);
        
        $sentencia->execute();
        
        return $sentencia;
        
        $sentencia->closeCursor();
        
        
        $this->conexiondb = null;
    }
}