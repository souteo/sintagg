import { getTopnav } from './PageModel.js';
import { Shirt } from '../model/Shirt.js';
getTopnav();

let products = [];

let productsList = document.getElementById("productslist");

const menu = document.getElementById("maincontainer--menu");
const restart = document.getElementById("restart");

const filters = {
	size: undefined,
	design: undefined,
	colors: []
}


//Imprimiendo los productos 
const printProductos = () => {
	productsList = document.getElementById("productslist");
	const fragment = document.createDocumentFragment();
	for (const product of products) {
		let p = document.createElement("a");
		p.classList.add("maincontainer--productslist--product");
		p.setAttribute("draggable", "true");

		let title = document.createElement("h2");
		let designString = product.design.charAt(0).toLowerCase();
		designString += product.design.slice(1);
		title.classList.add("maincontainer--productscontainer--producttitle");
		title.textContent = `Remera ${designString} `

		let description = document.createElement("span");
		description.classList.add("maincontainer--productscontainer--productdescription");
		description.textContent = product.description;

		let image = document.createElement("img");
		image.src = `../assets/images/remera${product.id}.png`;
		image.alt = product.design;

		let precio = document.createElement("div");
		precio.textContent = `$${product.price} `;

		p.appendChild(image);
		p.appendChild(title);
		p.appendChild(description);
		p.appendChild(precio);

		fragment.appendChild(p);
	};
	if (!productsList.hasChildNodes()) {
		productsList.appendChild(fragment);
	}
	else {
		const nuevoPList = document.createElement("div");

		nuevoPList.classList.add(productsList.className);

		nuevoPList.setAttribute('id', productsList.id);

		nuevoPList.appendChild(fragment);

		productsList.replaceWith(nuevoPList);
	}
}


//Obteniendo los productos de la base de datos
async function getProductos(filter, value, mostrar) {

	await fetch(`../controller/ProductsListController.php?filter=${filter}&value=${value}`)
		.then(res => res.ok ? Promise.resolve(res) : Promise.reject(res))
		.then(res => res.json())
		.then(res => {
			products = [];
			for (let p of res) {
				let shirt = new Shirt(p.REMERA, p.TALLE, p.PRECIO, p.DISEÑO, p.DESCRIPCIÓN);
				products.push(shirt);
			}
			if (mostrar) printProductos();
		})
}
getProductos("getAll", null, true);

productsList.addEventListener('dragstart', (e) => {
	e.preventDefault();
	let obj;
	e.target.nodeName == "A" ? obj = e.target : obj = e.target.parentElement;
	let id = obj.firstElementChild.src;
	id = id.slice(-8);
	var regex = /(\d+)/g;

	console.log(id.match(regex));


});



//----------------------------------------------
//-------------------FILTROS--------------------
//----------------------------------------------

//Obtener la lista de filtros por color
const printColorsList = () => {

	fetch('../controller/ProductsMenuController.php?page=getColors')
		.then(res => res.ok ? Promise.resolve(res) : Promise.reject(res))
		.then(res => res.json())
		.then(res => {

			const color_filter = document.getElementById("color--filter");
			const fragment = document.createDocumentFragment();


			for (const color of res) {
				let link = document.createElement("a");
				link.setAttribute("filter", "byColor");
				link.textContent = color.NOMBRE.charAt(0).toUpperCase();
				link.textContent += color.NOMBRE.slice(1);
				link.classList.add("maincontainer--menu--filter--byColor");
				link.setAttribute("id", color.NOMBRE);
				link.href = "#";
				fragment.appendChild(link);
			}
			color_filter.appendChild(fragment);
		}
		)
}
//printColorsList();

//Obteniendo la lista de talles
const printSizesList = () => {

	fetch('../controller/ProductsMenuController.php?page=getSizes')
		.then(res => res.ok ? Promise.resolve(res) : Promise.reject(res))
		.then(res => res.json())
		.then(res => {

			const color_filter = document.getElementById("size--filter");
			const fragment = document.createDocumentFragment();


			for (const size of res) {
				let link = document.createElement("a");
				link.setAttribute("data-filter", "bySize");
				link.textContent = size.NOMBRE.charAt(0).toUpperCase();
				link.textContent += size.NOMBRE.slice(1);
				link.classList.add("maincontainer--menu--filter--bySize");
				link.setAttribute('id', size.NOMBRE);
				link.href = "#";
				fragment.appendChild(link);
			}
			color_filter.appendChild(fragment);
		});
}
printSizesList();


//Obteniendo la lista de diseños
const printDesignsList = () => {

	fetch('../controller/ProductsMenuController.php?page=getDesigns')
		.then(res => res.ok ? Promise.resolve(res) : Promise.reject(res))
		.then(res => res.json())
		.then(res => {

			const color_filter = document.getElementById("design--filter");
			const fragment = document.createDocumentFragment();


			for (const size of res) {
				let link = document.createElement("a");
				link.setAttribute("filter", "byDesign");
				link.textContent = size.NOMBRE.charAt(0).toUpperCase();
				link.textContent += size.NOMBRE.slice(1);
				link.classList.add("maincontainer--menu--filter--byDesign");
				link.href = "#";
				fragment.appendChild(link);
			}
			color_filter.appendChild(fragment);
		});
}
printDesignsList();

//Escuchando los filtros
let newProducts = [];
menu.addEventListener('click', (e) => {
	async function filtrar() {
		await getProductos("getAll", null, false).then(() => {
			restart.classList.remove("hidden");
			if (e.target.className == "maincontainer--menu--filter--bySize") filters.size = e.target.textContent;
			else if (e.target.className == "maincontainer--menu--filter--byDesign") filters.design = e.target.textContent;
			else if (e.target.className == "maincontainer--menu--filter--byColor") filters.colors.push(e.target.textContent);
			else if (e.target.id == "restart") {
				console.log("entre a restart");
				restart.classList.add("hidden");
				filters.size = undefined;
				filters.design = undefined;
				filters.colors = undefined;
				newProducts = products;
			}

			//filtrando por tamaño
			if (filters.size == undefined) {
				console.log("talle no establecido");
			}
			else {
				console.log("talle: " + filters.size);
				newProducts = [];
				for (let p of products) {
					if (p.size == filters.size) newProducts.push(p);
				}
				products = newProducts;
			}

			//filtrando por diseño
			if (filters.design == undefined) {
				console.log("diseño no establecido");
			}
			else {
				console.log("diseño: " + filters.design);
				newProducts = [];
				for (let p of products) {
					if (p.design == filters.design) newProducts.push(p);
				}
				products = newProducts;
			}

			//ordenando por precio
			if (e.target.id == "sortByPriceLTH") products.sort((a, b) => (a.price > b.price) ? 1 : -1)
			else if (e.target.id == "sortByPriceHTL") products.sort((a, b) => (a.price < b.price) ? 1 : -1);
		})
	}

	if (e.target.className != "maincontainer--menu") {
		filtrar().then(() => {
			printProductos();
		})
	}
});



