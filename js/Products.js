// llenar lista de filtros de colores
const color_filter = document.getElementById("color--filter");

const colors = ["verde", "rojo oscuro", "azul cielo", "negro", "blanco", "amarillo"];

let products = ["a","b","c","d"];

const fragment = document.createDocumentFragment();

for (const color of colors) {
    let link = document.createElement("a");
    link.textContent= color.charAt(0).toUpperCase();
    link.textContent+= color.slice(1);
    link.classList.add("maincontainer--menu--filter--link");
    link.href="#";
    fragment.appendChild(link);
}

const getData = () =>{
    let xhr = new XMLHttpRequest();

    xhr.open('GET', '../controller/GetShirt.php');

    xhr.addEventListener('load', (data)=>{
        const dataJSON = parseJSON(data.target.response);

        console.log(dataJSON);
    });

    xhr.send();
}

addEventListener('load', getData());

/*
for (const product of products){
    const aProd = document.createElement("a");
    aProd.classList.add("maincontainer--productslist--product");
    a.href="#";

}

let productsList = document.getElementById("maincontainer--productslist");

*/

color_filter.appendChild(fragment);