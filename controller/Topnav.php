<?php
session_start();

echo '<li class="topnav--item">';
echo '<a class="topnav--link" href="#home">';
echo '<img class="home" src="../assets/images/logoperro.svg" alt="Logo SIN TAGG">';
echo '</a>';
echo '</li>';
echo '<li class="topnav--item">';
echo '<a class="topnav--link" href="Products.html"> PRODUCTOS </a>';
echo '</li>';
echo '<li class="topnav--item">';
echo '<a class="topnav--link" href="AboutUs.html"> SOBRE SINTAGG </a>';
echo '</li>';
echo '<li class="topnav--item">';
echo '<a class="topnav--link" href="ContactUs.html"> CONTACTANOS  </a>';
echo '</li>';
echo '<li class="topnav--item">';
echo '<div class="mainform--usuario">';
echo '<input placeholder="Busca un producto..." class="topnav--input" type="text" id="user" name="user">';
echo '</div>';
echo '</li>';

if (isset($_SESSION["user"])) {
    echo '<li class="topnav--item">';
    echo '<a class="topnav--link" href="Account.html"> CUENTA </a>';
    echo '</li>';
    echo '<li class="topnav--item">';
    echo '<a class="topnav--link--chart" href="Chart.html"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>';
    echo '</li>';
    echo '<li class="topnav--item">';
    echo '<a class="topnav--link" href="../controller/Logout.php"> CERRAR SESION </a>';
    echo '</li>';
} else {
    echo '<li class="topnav--item">';
    echo '<a class="topnav--link" href="Login.html"> INICIAR SESION </a>';
    echo '</li>';
};
