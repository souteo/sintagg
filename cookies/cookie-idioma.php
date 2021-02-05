<?php
setcookie("seleccionarIdioma", $_GET["idioma"], time()+86000);

if($_COOKIE["seleccionarIdioma"]=="es"){
    header("location:../index.php");
    
}
elseif($_COOKIE["seleccionarIdioma"]=="en"){
    header("location:../index-en.php");
}



?>