<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/login.css">
    <title>SinTAGG</title>
</head>
<body>
<div class="topnav">
<?php 
require 'topnav.php'; 
getTopnav("aboutUs");
?>
</div>
<?php
session_start();
echo "Hola, " . $_SESSION["user"];
?>

<label>Sobre nosotros:</label>

<div class="pie">
<footer>Teo Alejandro Costa Pires, 2021</footer>
</div>
</body>
</html>