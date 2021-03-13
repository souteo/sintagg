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
        <a href="#home">Home</a>
        <a href="">Productos</a>
        <a href="">Sobre SinTAGG</a>
        <a class="active" href="index.php">Iniciar sesión</a>
</div>

<div class="formulario">
<h2>Registrarse</h2>
<form action="validacionRegistro.php" method="post">

<div class="labelinput">
<label>Usuario:*</label> 
<input type="text" id="user" name="user"> <br>
</div>

<div class="labelinput">
<label>Contraseña:*</label>
<input type="password" id="pass" name="pass"><br>
</div>

<div class="labelinput">
<label>Correo electrónico:*</label> 
<input type="email" id="mail" name="mail"> <br>
</div>

<div class="labelinput">
<label>Número telefónico:</label> 
<input type="text" id="num" name="num"> <br>
</div>

<input type="submit"  id="boton" value="Registrarse">
</form>
</div>
<div class="pie">
<footer>Cambiar idioma:
<a href="index.php?cambiar=true">English</a>
</footer>
</div>

		
</body>
</html>