<?php
setcookie("seleccionarIdioma", "es", time()+86000);

if (isset($_COOKIE["usuario"])) {
    session_start();
    $_SESSION["user"]=$_COOKIE["usuario"];;
    header("location: busquedaRemeras.php");
}
?>

<!DOCTYPE html>
<html lang="es">
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
    <link rel="stylesheet" href="../style/login.css">

    <title>Sin T.A.G.G. ~ Inicia sesi�n</title>
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
            <form class="mainform" action="../controller/ValidacionLogin.php" method="post">
        
                <h1>INICIAR SESION</h1>
                <div class="mainform--usuario">
                    <!--<label for="user" class="mainform--label">Usuario:</label> <br>-->
                    <input required placeholder="Usuario" class="mainform--input" type="text" id="user" name="user">
                </div>
            
                <div class="mainform--contraseña">
                    <!--<label for="pw" class="mainform--label">Contraseña:</label> <br>-->
                    <input required placeholder="Contraseña" class="mainform--input" type="password" id="pw" name="pw">
                </div>
            
                <div class="mainform--recordar">
                    <label for="recordar" class="recordar--label">Recordar contraseña
                        <input class="recordar--checkbox" type="checkbox" id="recordar" name="recordar">
                    </label>
                </div>
                
                <button type="submit" class="mainform--enviar" type="submit" id="boton" >Iniciar sesión</button>
            
            </form>
            
            <div class="mainformfooter">
                <a href="formRegistro.php" class="mainformfooter--link">No tengo una cuenta</a>
            </div>
        </div>
    </main>
    
    <footer class="footer">
        Teo Alejandro Costa Pires ~ SIN TAGG
    </footer>
    
</body>

</html>