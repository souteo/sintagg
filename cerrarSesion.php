<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("location: index.php");
}
if (isset($_COOKIE["usuario"])) {
    setcookie("usuario", $_SESSION["user"], time()-1);
}
session_destroy();

header("location: index.php")
?>