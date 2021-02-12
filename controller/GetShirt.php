<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="./style/login.css">
<title>SinTAGG webpage</title>
</head>
<body>
<?php
require 'Conexion.php';

class GetShirt extends Conexion{
    public function GetShirt(){
        parent::__construct();
    }
    /* obtener con mysqli
    public function getRemera($color){
        $resultado= $this->conexiondb->query("SELECT nombre_color FROM colores WHERE id_color= '" . $color . "'");
        $remeras= $resultado->fetch_all(MYSQLI_ASSOC);
        return $remeras;
    }
    */
    
    public function getTodasLasRemeras(){
        $sql= "SELECT remera.id_remera AS REMERA, colores.nombre_color AS COLOR FROM remeras_colores JOIN remera ON remera.id_remera = remeras_colores.id_remera JOIN colores ON colores.id_color = remeras_colores.id_color ORDER BY remera.id_remera";
        
        $sentencia=$this->conexiondb->prepare($sql);
        
        $sentencia->execute(array());
        
        $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        $sentencia->closeCursor();
        
        return $resultado;
        
        $this->conexiondb = null;
    }
    
    public function getRemeraPorColor($entrada){
        
        $color ="%". $entrada."%";
        
        $sql= "SELECT remera.id_remera AS REMERA, diseños.nombre_diseño AS DISEÑO, colores.nombre_color AS COLOR FROM remeras_colores JOIN colores ON colores.id_color = remeras_colores.id_color JOIN remera ON remera.id_remera = remeras_colores.id_remera JOIN diseños ON remera.diseño_remera = diseños.id_diseño WHERE remera.id_remera IN (SELECT remera.id_remera FROM remeras_colores JOIN colores ON colores.id_color = remeras_colores.id_color JOIN remera ON remera.id_remera = remeras_colores.id_remera WHERE colores.nombre_color LIKE :color) ORDER BY remera.id_remera";
        
        $sentencia = $this->conexiondb->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        
        $sentencia->bindValue(':color', $color, PDO::PARAM_STR);
        
        $sentencia->execute();
        
        $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        $sentencia->closeCursor();
        
        return $resultado;
        
        
        $this->conexiondb = null;
    }
}
?>
</body>
</html>