<?php
require '../connection/Connection.php';

class GetShirt extends Connection
{

    public function GetShirt()
    {
        parent::__construct();
    }
    
    //Obtener todas las remeras de la base de datos
    public function getTodasLasRemeras()
    {
        $sql = "SELECT remeras.id_remera AS REMERA, remeras.precio_remera AS PRECIO, diseños.nombre_diseño AS DISEÑO, diseños.descripción_diseño AS DESCRIPCIÓN FROM remeras JOIN diseños ON remeras.diseño_remera = diseños.id_diseño ;";
        
        $sentencia = $this->conexiondb->prepare($sql);
        
        $sentencia->execute();
        
        return $sentencia;
        
        $sentencia->closeCursor();
        
        $this->conexiondb = null;
    }
   
    
    //Obtener todas las remeras de la base de datos que coincidan con el color ingresado
    public function getRemeraPorColor($color){
        // filtrar por color: SELECT remeras.id_remera AS REMERA, remeras.precio_remera AS PRECIO, diseños.nombre_diseño AS DISEÑO, diseños.descripción_diseño AS DESCRIPCIÓN FROM remeras_colores JOIN colores ON colores.id_color = remeras_colores.id_color JOIN remeras ON remeras.id_remera = remeras_colores.id_remera JOIN diseños ON remeras.diseño_remera = diseños.id_diseño WHERE remeras.id_remera IN (SELECT remeras.id_remera FROM remeras_colores JOIN colores ON colores.id_color = remeras_colores.id_color JOIN remeras ON remeras.id_remera = remeras_colores.id_remera WHERE colores.nombre_color LIKE :color) ORDER BY remeras.id_remera
        
        $sql = "SELECT remeras.id_remera AS REMERA, remeras.precio_remera AS PRECIO, diseños.nombre_diseño AS DISEÑO, diseños.descripción_diseño AS DESCRIPCIÓN FROM remeras_colores JOIN colores ON colores.id_color = remeras_colores.id_color JOIN remeras ON remeras.id_remera = remeras_colores.id_remera JOIN diseños ON remeras.diseño_remera = diseños.id_diseño WHERE remeras.id_remera IN (SELECT remeras.id_remera FROM remeras_colores JOIN colores ON colores.id_color = remeras_colores.id_color JOIN remeras ON remeras.id_remera = remeras_colores.id_remera WHERE colores.nombre_color = :color) GROUP BY remeras.id_remera";

        $sentencia = $this->conexiondb->prepare($sql, array(
            PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY
        ));

        $sentencia->bindValue(':color', $color, PDO::PARAM_STR);

        $sentencia->execute();
        
        return $sentencia;
        
        $sentencia->closeCursor();
        
        $this->conexiondb = null;
    }
    
    public function getRemeraPorTalle($talle){
        // filtrar por color: SELECT remeras.id_remera AS REMERA, remeras.precio_remera AS PRECIO, diseños.nombre_diseño AS DISEÑO, diseños.descripción_diseño AS DESCRIPCIÓN FROM remeras_colores JOIN colores ON colores.id_color = remeras_colores.id_color JOIN remeras ON remeras.id_remera = remeras_colores.id_remera JOIN diseños ON remeras.diseño_remera = diseños.id_diseño WHERE remeras.id_remera IN (SELECT remeras.id_remera FROM remeras_colores JOIN colores ON colores.id_color = remeras_colores.id_color JOIN remeras ON remeras.id_remera = remeras_colores.id_remera WHERE colores.nombre_color LIKE :color) ORDER BY remeras.id_remera
        
        $sql = "SELECT remeras.id_remera AS REMERA, remeras.precio_remera AS PRECIO, diseños.nombre_diseño AS DISEÑO, diseños.descripción_diseño AS DESCRIPCIÓN FROM remeras JOIN diseños ON remeras.diseño_remera = diseños.id_diseño JOIN talles ON remeras.talle_remera = talles.id_talles WHERE talles.nombre_talles = :talle";
        
        $sentencia = $this->conexiondb->prepare($sql, array(
            PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY
        ));
        
        $sentencia->bindValue(':talle', $talle, PDO::PARAM_STR);
        
        $sentencia->execute();
        
        return $sentencia;
        
        $sentencia->closeCursor();
        
        $this->conexiondb = null;
    }
    
    //Obtener todas las remeras de la base de datos ordenadas por precio
    public function getTodasLasRemerasPorPrecio($menorAMayor){
        if ($menorAMayor) {
            $sql = "SELECT remeras.id_remera AS REMERA, remeras.precio_remera AS PRECIO, diseños.nombre_diseño AS DISEÑO, diseños.descripción_diseño AS DESCRIPCIÓN FROM remeras JOIN diseños ON remeras.diseño_remera = diseños.id_diseño ORDER BY remeras.precio_remera;";
        } else {
            $sql = "SELECT remeras.id_remera AS REMERA, remeras.precio_remera AS PRECIO, diseños.nombre_diseño AS DISEÑO, diseños.descripción_diseño AS DESCRIPCIÓN FROM remeras JOIN diseños ON remeras.diseño_remera = diseños.id_diseño ORDER BY remeras.precio_remera DESC;";
        }

        $sentencia = $this->conexiondb->prepare($sql);

        $sentencia->execute();

        return $sentencia;

        $sentencia->closeCursor();

        $this->conexiondb = null;
    }
}