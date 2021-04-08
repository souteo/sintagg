<?php
require '../api/GetFilter.php';
$filtros = new GetFilter();

$page = $_GET["page"];
switch($page){
    case "getColors":
        $resultado = $filtros->getColores()->fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode($resultado)
        ;
        break;
    case "getSizes":
        $resultado = $filtros->getSizes()->fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode($resultado)
        ;
        break;
    case "getDesigns":
        $resultado = $filtros->getDesigns()->fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode($resultado)
        ;
        break;
}