<?php
require '../model/GetShirt.php';
$remeras = new GetShirt();

$page = $_GET["page"];
if ($page==1) {
    $resultado = $remeras->getTodasLasRemeras()->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($resultado)
    ;
}


?>