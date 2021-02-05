<?php
setcookie("seleccionarIdioma", "en", time()+86000);

if (isset($_COOKIE["usuario"])) {
    session_start();
    $_SESSION["user"]=$_COOKIE["usuario"];;
    header("location: busquedaRemeras.php");
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
        <a href="#home">Home</a>
        <a href="">Products</a>
        <a href="">About us</a>
        <a class="active" href="#">Login</a>
</div>
<div class="formulario">
<h2>Account login</h2>
<form action="validacionLogin.php" method="post">
<div class="labelinput">
<br>
<label>Username:</label> 
<input type="text" id="user" name="user"> <br>
</div>
<div class="labelinput">
<label>Password:</label>
<input type="password" id="pass" name="pass"><br>
</div>


<div class="recorda">
<label>&nbsp; Remember password &nbsp;<input type="checkbox" id="recordar" name="recordar"></label>
</div>


<input type="submit" value="Login">
</form>
</div>
<div class="pie">
<footer>Change language:
<a href="index.php?cambiar=true">Spanish</a>

</footer>
</div>

		
</body>
</html>