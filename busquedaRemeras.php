<?php
session_start();
require 'devuelveRemera.php';
$remeras = new devuelveRemera();


$arrayRemeras= $remeras->getTodasLasRemeras();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/productos.css">
    <title>SinTAGG webpage</title>
</head>
<body>
<div class="topnav">
<?php 
require 'topnav.php'; 
getTopnav("productos");
?>
</div>
<?php
echo "Hola, " . $_SESSION["user"] . ", este es el listado de remeras disponibles";
?>

<div class="tabla">
<table>
<tr>
<td>Id de remera:</td> 
<td>Color 1:</td>
<td>Color 2:</td>
<td>Color 3:</td>

<?php
$idViejo = NULL;
foreach ($arrayRemeras as $reme) {
    $id = $reme->REMERA;
    
    if (isset($idViejo) && $id == $idViejo) {
        echo "<td>" . $reme->COLOR . "</td>";
    } else {
        echo "</tr><tr><td>" . $id . "</td><td>" . $reme->COLOR . "</td>";
    }
    $idViejo = $id;
 }
?>

</table>
</div>

<br> <br>


<form action="">
<label>Buscar remeras por color:</label>
<input type="text" id="buscar" name="buscar">
<input type="submit" value="Enviar">
</form>

<div class="tabla">
<table>
<tr>
<td>Id de remera:</td> 
<td>Diseño:</td> 
<td>Color 1:</td>
<td>Color 2:</td>
<td>Color 3:</td>
<?php
$idViejo = NULL;

if (isset($_GET["buscar"])) {
    $entrada=$_GET["buscar"];
    $remeraPorColor= $remeras->getRemeraPorColor($entrada);
}

foreach ($remeraPorColor as $reme) {
    $id = $reme->REMERA;
    
    if (isset($idViejo) && $id == $idViejo) {
        echo "<td>" . $reme->COLOR . "</td>";
    } else {
        echo "</tr><tr><td>" . $id . "</td><td>" . $reme->DISEÑO . "</td><td>" . $reme->COLOR . "</td>";
    }
    $idViejo = $id;
 } ?>
</table>
</div>

<div class="pie">
<footer>Teo Alejandro Costa Pires, 2021</footer>
</div>
</body>
</html>