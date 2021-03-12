<?php
require '../model/GetShirt.php';
$remeras = new GetShirt();

$page = $_GET["page"];
if ($page==1||$page=="1") {
    $resultado = $remeras->getTodasLasRemeras();
    echo json_encode($resultado);
}

?>;