<?php
if (isset($_COOKIE["seleccionarIdioma"])&&!isset($_GET["cambiar"])) {
    if ($_COOKIE["seleccionarIdioma"]=="es") {
        header("location: index-es.php");
    } elseif ($_COOKIE["seleccionarIdioma"]=="en") {
        header("location: index-en.php");
    };
}

if (isset($_COOKIE["seleccionarIdioma"])&&isset($_GET["cambiar"])&&$_GET["cambiar"]==true) {
    if ($_COOKIE["seleccionarIdioma"]=="es") {
        setcookie("seleccionarIdioma","es", time()-1);
        setcookie("seleccionarIdioma","en", time()+86000);
        header("location: index-en.php");
    } elseif ($_COOKIE["seleccionarIdioma"]=="en") {
        setcookie("seleccionarIdioma","en", time()-1);
        setcookie("seleccionarIdioma","es", time()+86000);
        header("location: index-es.php");
    };
}

if (!isset($_COOKIE["seleccionarIdioma"])) {
    setcookie("seleccionarIdioma","en", time()+86000);
    header("location: index-en.php");;
}
?>
