// llenar lista de filtros de colores
const color_filter = document.getElementById("color--filter");

const colors = ["verde", "rojo oscuro", "azul cielo", "negro", "blanco", "amarillo"];

const fragment = document.createDocumentFragment();

for (const color of colors) {
    const link = document.createElement("a");
    link.textContent= color.charAt(0).toUpperCase();
    link.textContent+= color.slice(1);
    link.classList.add("maincontainer--menu--filter--link");
    link.href="#";
    fragment.appendChild(link);
    console.log(link);
}

color_filter.appendChild(fragment);