<?php
require '../model/GetShirt.php';
$remeras = new GetShirt();

$filter = $_GET["filter"];
$value = $_GET["value"];

switch ($filter){
    case "getAll":
        $resultado = $remeras->getTodasLasRemeras()->fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode($resultado);
        break;
    case "maincontainer--menu--filter--sortByPrice":
        if ($value=="sortByPriceLTH") {
            $resultado = $remeras->getTodasLasRemerasPorPrecio(true)->fetchAll(PDO::FETCH_ASSOC);
        }
        else {
            $resultado = $remeras->getTodasLasRemerasPorPrecio(false)->fetchAll(PDO::FETCH_ASSOC);
        }
        
        echo json_encode($resultado)
        ;
        break;
    case "maincontainer--menu--filter--byColor":
        $color = $value;
        $resultado = $remeras->getRemeraPorColor($color)->fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode($resultado)
        ;
        break;
    case "maincontainer--menu--filter--bySize":
        $talle = $value;
        $resultado = $remeras->getRemeraPorTalle($talle)->fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode($resultado)
        ;
        break;
}

