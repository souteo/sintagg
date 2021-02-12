<?php
setcookie("seleccionarIdioma", "en", time()+86000);

if (isset($_COOKIE["usuario"])) {
    session_start();
    $_SESSION["user"]=$_COOKIE["usuario"];;
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
<div class="topnav">
<?php require 'Topnav.php'; 
$file = "cuenta";
getTopnav($file);
?>
</div>
<?php 
echo $file;
?>

<div class="pie">
<footer>Teo Alejandro Costa Pires, 2021</footer>
</div>

		
</body>
</html>