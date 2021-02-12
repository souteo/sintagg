<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Indumentaria urbana hecha a mano de 'Sin TAGG'">
    <meta name="keywords" content="ropa, remeras, indumentaria, indumentaria urbana, tie-dye, batik, sin tagg, sintagg">
    <meta name="author" content="Teo Alejandro Costa Pires">

    <link rel="apple-touch-icon" sizes="57x57" href="../assets/favicon.ico/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../assets/favicon.ico/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../assets/favicon.ico/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/favicon.ico/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../assets/favicon.ico/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../assets/favicon.ico/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../assets/favicon.ico/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../assets/favicon.ico/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/favicon.ico/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../assets/favicon.ico/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon.ico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../assets/favicon.ico/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon.ico/favicon-16x16.png">
    <link rel="manifest" href="../assets/favicon.ico/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="../style/normalize.css">
    <link rel="stylesheet" href="../style/products.css">

    <title>Sin T.A.G.G.</title>
</head>

<body>
    <header>
        <ul class="topnav">
        <?php require '../controller/Topnav.php'; 
            $file = "productos";
            getTopnav($file);
        ?>
        </ul>

    </header>
    <main>
        <div class="main-container">
            <div class="maincontainer--menu">
                <div class="maincontainer--menu--title">
                    <h1>filtros</h1>
                </div>
                <div class="maincontainer--menu--filter">
                    <a href="#">Precio</a>
                </div>
                <div class="maincontainer--menu--filter">
                    <a href="#">Color</a>
                </div>
                <div class="maincontainer--menu--filter">
                    <a href="#">Talle</a>
                </div>
                <div class="maincontainer--menu--filter">
                    <a href="#">Stock</a>
                </div>
                <div class="maincontainer--menu--filter">
                    <a href="#">Prenda</a>
                </div>
                <div class="maincontainer--menu--filter">
                    <a href="#">Diseño</a>
                </div>
            </div>
            <div class="maincontainer--productscontainer">
                <h1 class="maincontainer--productscontainer--title">Productos</h1>
                <div class="maincontainer--productslist">
                    <?php
                    require '../controller/GetShirt.php';
                    $remeras = new GetShirt();
                    $resultado = $remeras->getTodasLasRemeras();
                    while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
                        
                        echo '<a href="#" class="maincontainer--productslist--product">';
                        echo '<img src="../assets/images/vterminada.png" alt="">';
                        echo '<span class="maincontainer--productscontainer--producttitle">' . $registro['DISEÑO'] . '</span>';
                        echo '<span class="maincontainer--productscontainer--productdescription">' . $registro['PRECIO'] . '<br> 2 combinaciones de colores</span>';
                        echo '</a>';
                    }
                    ?>;
                    
                </div>
        
            </div>
        </div>
    </main>
    <footer class="footer">
        Teo Alejandro Costa Pires ~ SIN TAGG
    </footer>
</body>

</html>