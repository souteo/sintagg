<?php
require '../connection/Connection.php';

try {
    
    $conexion = new PDO("mysql:dbname=sintagg; host:localhost", "root", "123456");
    
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql= "SELECT * FROM usuarios WHERE mail_usuario = :user";
    
    $resultado= $conexion->prepare($sql);
    $user=htmlentities(addslashes($_POST["mail"]));
    $pass=htmlentities(addslashes($_POST["pw"]));
    
    $resultado->bindValue(":user", $user);
    
    $resultado->execute();
    
    while ($fila=$resultado->fetch(PDO::FETCH_ASSOC)) {
        if (password_verify($pass, $fila["contraseña_usuario"])) {
            session_start();
            $_SESSION["user"]=$_POST["mail"];
            if (isset($_POST["recordar"])) {
                //sesion iniciada 
            }
            header("location: ../index.php");
        }
        else
        {
            header("location: ../views/Login.html");
        }
    }
} catch (Exception $e) {
    die("Error:" . $e->getMessage());
}

?>
