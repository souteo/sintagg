<?php
require 'Conexion.php';

try {
    
    $conexion = new PDO("mysql:dbname=sintagg; host:localhost", "root", "123456");
    
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $user=$_POST["user"];
    
    $pass=$_POST["pass"];
    $pass_encriptada = password_hash($pass, PASSWORD_DEFAULT, array("cost"=>13));
    
    $mail=$_POST["mail"];
    
    $num=$_POST["num"];
    
    if (!isset($num)) {
        $num = NULL;
    }
    
    $sql= "INSERT INTO `usuarios`(`nombre_usuario`, `contraseña_usuario`, `mail_usuario`, `numero_usuario`) VALUES (:user, :pass, :mail, :num)";
    
    $resultado= $conexion->prepare($sql);
    
    $resultado->execute(array(":user"=>$user, ":pass"=>$pass_encriptada, "mail"=>$mail, ":num"=>$num));
    
    $resultado->closeCursor();
    
    header("location: index.php");
    
    
} catch (Exception $e) {
    die("Error:" . $e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/login.css">
    <title>SinTAGG webpage</title>
</head>
<body>
</body>
</html>