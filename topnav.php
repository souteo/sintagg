<?php

function getTopnav($file)
{
    if (isset($_SESSION["user"])) {
        switch ($file) {
            case "cuenta":
                echo '<ul class="topnav">';
                echo '<li class="topnav--item">';
                echo '    <a class="topnav--link" href="#home">Home</a>;';
                echo '</li>';
                echo '<li class="topnav--item">';
                echo '    <a class="topnav--link" href="busquedaRemeras.php">Productos</a>;';
                echo '</li>';
                echo '<li class="topnav--item">';
                echo '    <a class="topnav--link" href="aboutUs.php">Sobre SinTAGG</a>;';
                echo '</li>';
                echo '<li class="topnav--item">';
                echo '    <a class="topnav--link" href="cuenta.php" id="active">Cuenta</a>;';
                echo '</li>';
                echo '<li class="topnav--item">';
                echo '    <a class="topnav--link" href="cerrarSesion.php">Cerrar sesión</a>;';
                echo '</li>';
                echo '</ul>';
                break;

            case "aboutUs":
                echo '<ul class="topnav">';
                echo '<li class="topnav--item">';
                echo '    <a class="topnav--link" href="#home">Home</a>;';
                echo '</li>';
                echo '<li class="topnav--item">';
                echo '    <a class="topnav--link" href="busquedaRemeras.php">Productos</a>;';
                echo '</li>';
                echo '<li class="topnav--item">';
                echo '    <a class="topnav--link" href="aboutUs.php" id="active">Sobre SinTAGG</a>;';
                echo '</li>';
                echo '<li class="topnav--item">';
                echo '    <a class="topnav--link" href="cuenta.php">Cuenta</a>;';
                echo '</li>';
                echo '<li class="topnav--item">';
                echo '    <a class="topnav--link" href="cerrarSesion.php">Cerrar sesión</a>;';
                echo '</li>';
                echo '</ul>';
                break;

            case "productos":
                echo '<ul class="topnav">';
                echo '<li class="topnav--item">';
                echo '    <a class="topnav--link" href="#home">Home</a>;';
                echo '</li>';
                echo '<li class="topnav--item">';
                echo '    <a class="topnav--link" href="busquedaRemeras.php" id="active">Productos</a>;';
                echo '</li>';
                echo '<li class="topnav--item">';
                echo '    <a class="topnav--link" href="aboutUs.php">Sobre SinTAGG</a>;';
                echo '</li>';
                echo '<li class="topnav--item">';
                echo '    <a class="topnav--link" href="cuenta.php">Cuenta</a>;';
                echo '</li>';
                echo '<li class="topnav--item">';
                echo '    <a class="topnav--link" href="cerrarSesion.php">Cerrar sesión</a>;';
                echo '</li>';
                echo '</ul>';
                break;
        }
    }
    else {
        switch ($file) {
            case "aboutUs":
                echo '<ul class="topnav">';
                echo '<li class="topnav--item">';
                echo '    <a class="topnav--link" href="#home">Home</a>;';
                echo '</li>';
                echo '<li class="topnav--item">';
                echo '    <a class="topnav--link" href="busquedaRemeras.php">Productos</a>;';
                echo '</li>';
                echo '<li class="topnav--item">';
                echo '    <a class="topnav--link" href="aboutUs.php" id="active">Sobre SinTAGG</a>;';
                echo '</li>';
                echo '<li class="topnav--item">';
                echo '    <a class="topnav--link" href="cerrarSesion.php">Cerrar sesión</a>;';
                echo '</li>';
                echo '</ul>';
                break;

            case "productos":
                echo '<ul class="topnav">';
                echo '<li class="topnav--item">';
                echo '    <a class="topnav--link" href="#home">Home</a>;';
                echo '</li>';
                echo '<li class="topnav--item">';
                echo '    <a class="topnav--link" href="busquedaRemeras.php" id="active">Productos</a>;';
                echo '</li>';
                echo '<li class="topnav--item">';
                echo '    <a class="topnav--link" href="aboutUs.php">Sobre SinTAGG</a>;';
                echo '</li>';
                echo '<li class="topnav--item">';
                echo '    <a class="topnav--link" href="cerrarSesion.php">Cerrar sesión</a>;';
                echo '</li>';
                echo '</ul>';
                break;

            case "index":
                echo '<ul class="topnav">';
                echo '<li class="topnav--item">';
                echo '    <a class="topnav--link" href="#home" id="active">Home</a>;';
                echo '</li>';
                echo '<li class="topnav--item">';
                echo '    <a class="topnav--link" href="busquedaRemeras.php">Productos</a>;';
                echo '</li>';
                echo '<li class="topnav--item">';
                echo '    <a class="topnav--link" href="aboutUs.php">Sobre SinTAGG</a>;';
                echo '</li>';
                echo '<li class="topnav--item">';
                echo '    <a class="topnav--link" href="cerrarSesion.php">Cerrar sesión</a>;';
                echo '</li>';
                echo '</ul>';
                break;
        }
    }
}

?>
