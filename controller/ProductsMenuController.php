<?php
require '../model/GetFilter.php';
$colores = new GetFilter();

$page = $_GET["page"];
if ($page=="getAll") {
    $resultado = $colores->getTodosLosColores()->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($resultado)
    ;
}