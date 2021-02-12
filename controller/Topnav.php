<?php
session_start();
function getTopnav($file)
{
    if (isset($_SESSION["user"])) {
        switch ($file) {
            case "cuenta":
                echo '<li class="topnav--item">';
                echo '<a class="topnav--link" href="#home">';
                echo '<img class="home" src="../assets/images/logoperro.svg" alt="Logo SIN TAGG">';
                echo '</a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="Products.php"> PRODUCTOS </a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="AboutUs.php"> SOBRE SINTAGG </a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="ContactUs.php"> CONTACTANOS  </a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="Account.php" id="active"> CUENTA </a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<div class="mainform--usuario">';
                echo '<input placeholder="Busca un producto..." class="topnav--input" type="text" id="user" name="user">';
                echo '</div>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="../controller/Logout.php"> CERRAR SESION </a>';
                echo '</li>';
                break;

            case "aboutUs":
                
                echo '<li class="topnav--item">';
                echo '<a class="topnav--link" href="#home">';
                echo '<img class="home" src="../assets/images/logoperro.svg" alt="Logo SIN TAGG">';
                echo '</a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="Products.php"> PRODUCTOS </a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="AboutUs.php" id="active"> SOBRE SINTAGG </a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="ContactUs.php"> CONTACTANOS </a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="Account.php"> CUENTA </a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<div class="mainform--usuario">';
                echo '<input placeholder="Busca un producto..." class="topnav--input" type="text" id="user" name="user">';
                echo '</div>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="../controller/Logout.php"> CERRAR SESION </a>';
                echo '</li>';
                break;
                
            case "productos":
                
                echo '<li class="topnav--item">';
                echo '<a class="topnav--link" href="#home">';
                echo '<img class="home" src="../assets/images/logoperro.svg" alt="Logo SIN TAGG">';
                echo '</a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="Products.php" id="active"> PRODUCTOS </a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="AboutUs.php"> SOBRE SINTAGG </a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="ContactUs.php"> CONTACTANOS </a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="Account.php"> CUENTA </a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<div class="mainform--usuario">';
                echo '<input placeholder="Busca un producto..." class="topnav--input" type="text" id="user" name="user">';
                echo '</div>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="../controller/Logout.php"> CERRAR SESION </a>';
                echo '</li>';
                break;
                
                
            case "contactanos":
                
                echo '<li class="topnav--item">';
                echo '<a class="topnav--link" href="#home">';
                echo '<img class="home" src="../assets/images/logoperro.svg" alt="Logo SIN TAGG">';
                echo '</a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="Products.php"> PRODUCTOS </a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="AboutUs.php"> SOBRE SINTAGG </a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="ContactUs.php" id="active"> CONTACTANOS </a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="Account.php"> CUENTA </a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<div class="mainform--usuario">';
                echo '<input placeholder="Busca un producto..." class="topnav--input" type="text" id="user" name="user">';
                echo '</div>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="../controller/Logout.php"> CERRAR SESION </a>';
                echo '</li>';
                break;
                
    }
}
    else {
        switch ($file) {
            case "aboutUs":
                
                echo '<li class="topnav--item">';
                echo '<a class="topnav--link" href="#home">';
                echo '<img class="home" src="../assets/images/logoperro.svg" alt="Logo SIN TAGG">';
                echo '</a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="Products.php"> PRODUCTOS </a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="AboutUs.php" id="active"> SOBRE SINTAGG </a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="ContactUs.php"> CONTACTANOS </a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="Account.php"> CUENTA </a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<div class="mainform--usuario">';
                echo '<input placeholder="Busca un producto..." class="topnav--input" type="text" id="user" name="user">';
                echo '</div>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="Login.php"> INICIAR SESION </a>';
                echo '</li>';
                break;

            case "productos":
                
                echo '<li class="topnav--item">';
                echo '<a class="topnav--link" href="#home">';
                echo '<img class="home" src="../assets/images/logoperro.svg" alt="Logo SIN TAGG">';
                echo '</a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="Products.php" id="active"> PRODUCTOS </a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="AboutUs.php"> SOBRE SINTAGG </a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="ContactUs.php"> CONTACTANOS </a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="Account.php"> CUENTA </a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<div class="mainform--usuario">';
                echo '<input placeholder="Busca un producto..." class="topnav--input" type="text" id="user" name="user">';
                echo '</div>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="Login.php"> INICIAR SESION </a>';
                echo '</li>';
                break;
                
            case "login":
                
                echo '<li class="topnav--item">';
                echo '<a class="topnav--link" href="#home">';
                echo '<img class="home" src="../assets/images/logoperro.svg" alt="Logo SIN TAGG">';
                echo '</a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="Products.php"> PRODUCTOS </a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="AboutUs.php"> SOBRE SINTAGG </a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="ContactUs.php"> CONTACTANOS </a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<div class="mainform--usuario">';
                echo '<input placeholder="Busca un producto..." class="topnav--input" type="text" id="user" name="user">';
                echo '</div>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="Login.php"> REGISTRARSE </a>';
                echo '</li>';
                break;
                
            case "cuenta":
                
                echo '<li class="topnav--item">';
                echo '<a class="topnav--link" href="#home">';
                echo '<img class="home" src="../assets/images/logoperro.svg" alt="Logo SIN TAGG">';
                echo '</a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="Products.php"> PRODUCTOS </a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="AboutUs.php"> SOBRE SINTAGG </a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="ContactUs.php"> CONTACTANOS </a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="Account.php" id="active"> CUENTA </a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<div class="mainform--usuario">';
                echo '<input placeholder="Busca un producto..." class="topnav--input" type="text" id="user" name="user">';
                echo '</div>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="Login.php"> INICIAR SESION </a>';
                echo '</li>';
                break;
                
            case "contactanos":
                
                echo '<li class="topnav--item">';
                echo '<a class="topnav--link" href="#home">';
                echo '<img class="home" src="../assets/images/logoperro.svg" alt="Logo SIN TAGG">';
                echo '</a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="Products.php"> PRODUCTOS </a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="AboutUs.php"> SOBRE SINTAGG </a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="ContactUs.php" id="active"> CONTACTANOS </a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="Account.php"> CUENTA </a>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<div class="mainform--usuario">';
                echo '<input placeholder="Busca un producto..." class="topnav--input" type="text" id="user" name="user">';
                echo '</div>';
                echo '</li>';
                echo '<li css="topnav--item">';
                echo '<a class="topnav--link" href="Login.php"> INICIAR SESION </a>';
                echo '</li>';
                break;
                
        }
    }
}

?>';
