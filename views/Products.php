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
        <div class="maincontainer">
            <div class="maincontainer--menu">
                <h1 class="maincontainer--menu--title">filtros</h1>
                <div class="maincontainer--menu--filter">
                    <h2 class="maincontainer--menu--filter--title">Precio</h2>
                    <input value="0" type="range" name="preciomin" id="preciomin" min="0" max="10">
                    <input value="10" type="range" name="preciomax" id="preciomax" min="0" max="10">
                </div>
                <div class="maincontainer--menu--filter" id="color--filter">
                    <h2 class="maincontainer--menu--filter--title">Color</h2>
                </div>
                <div class="maincontainer--menu--filter">
                    <h2 class="maincontainer--menu--filter--title">Talle</h2>
                </div>
                <div class="maincontainer--menu--filter">
                    <h2 class="maincontainer--menu--filter--title">Stock</h2>
                </div>
                <div class="maincontainer--menu--filter">
                    <h2 class="maincontainer--menu--filter--title">Prenda</h2>
                </div>
                <div class="maincontainer--menu--filter">
                    <h2 class="maincontainer--menu--filter--title">Diseño</h2>
                </div>
            </div>
            <div class="maincontainer--productscontainer">
                <h1 class="maincontainer--productscontainer--title">Productos</h1>
                <div class="maincontainer--productslist">
                    
                </div>
        	<button id="boton">Toca el boton</button>
            </div>
        </div>
    </main>
    <footer class="footer">
        Teo Alejandro Costa Pires ~ SIN TAGG
    </footer>
    <script src="../js/Products.js"></script>
</body>

</html>