<?php

require '../connection/Conexion.php';

try {
    
    $conexion = new PDO("mysql:dbname=sintagg; host:localhost", "root", "123456");
    
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql= "SELECT * FROM usuarios WHERE nombre_usuario = :user";
    
    $resultado= $conexion->prepare($sql);
    $user=htmlentities(addslashes($_POST["user"]));
    $pass=htmlentities(addslashes($_POST["pw"]));
    
    $resultado->bindValue(":user", $user);
    
    $resultado->execute();
    
    while ($fila=$resultado->fetch(PDO::FETCH_ASSOC)) {
        if (password_verify($pass, $fila["contraseña_usuario"])) {
            session_start();
            $_SESSION["user"]=$_POST["user"];
            if (isset($_POST["recordar"])) {
                setcookie("usuario", $_POST["user"], time()+86400);
            }
            header("location: ../views/Products.php");
        }
        else
        {
            header("location: ../views/Login.php");
        }
    }
} catch (Exception $e) {
    die("Error:" . $e->getMessage());
}

?>
