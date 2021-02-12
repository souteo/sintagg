<?php
require 'DBConfig.php';

class Conexion{
protected $conexiondb;

/* conectar con mysqli
public function Conexion(){
    $this->conexiondb = new mysqli(host,user,password,db);
    if ($this->conexiondb->connect_errno) {
        echo "Fallo al conectar sql: " . $this->conexiondb->connect_error;
        
        return;
    }
    $this->conexiondb->set_charset(charset);
}
*/


public function Conexion(){
    try {
        $this->conexiondb = new PDO('mysql:dbname=sintagg;host=localhost', 'root', '123456');
        
        $this->conexiondb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $this->conexiondb->exec("SET CHARACTER SET utf8");
        
        return $this->conexiondb;
    } catch (Exception $e) {
        echo "La linea de codigo de error es:" . $e->getLine();
    }
}
}