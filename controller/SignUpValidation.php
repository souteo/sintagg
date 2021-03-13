<?php
require '../connection/Conexion.php';

try {
    
    $conexion = new PDO("mysql:dbname=sintagg; host:localhost", "root", "123456");
    
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $user=$_POST["user"];
    
    $pass=$_POST["pw"];
    $pass_encriptada = password_hash($pass, PASSWORD_DEFAULT, array("cost"=>13));
    $mail=$_POST["user"];
    $fecha_nac=$_POST["fecha_nac"];
    
    $sql= "INSERT INTO `usuarios`(`nombre_usuario`, `contraseña_usuario`, `mail_usuario`, `fechaNac_usuario`) VALUES (:user, :pass, :mail, :fecha_nac)";
    
    $resultado= $conexion->prepare($sql);
    
    $resultado->execute(array(":user"=>$user, ":pass"=>$pass_encriptada, "mail"=>$mail, ":fecha_nac"=>$fecha_nac));
    
    $resultado->closeCursor();
    
    header("location: ../index.php");
    
    
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