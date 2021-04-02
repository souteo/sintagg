import { getTopnav } from './PageModel.js';
import { Shirt } from '../model/Shirt.js';
getTopnav();

let productos;
let fdiseño = false;
let ftalle = false;

const menu = document.getElementById("maincontainer--menu");
const productsList = document.getElementById("productslist");
const restart = document.getElementById("restart");

let shirt = new Shirt(33,"","","","");
setTimeout(function(){ console.log(shirt.colors); }, 700);

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


//imprimir los productos 
const printProductos = (data) => {
	const fragment = document.createDocumentFragment();

	for (const product of data) {
		let p = document.createElement("a");
		p.classList.add("maincontainer--productslist--product");
		p.setAttribute('draggable', true);
		
		let title = document.createElement("h2");
		let design = product.DISEÑO.charAt(0).toLowerCase();
		design += product.DISEÑO.slice(1);
		title.classList.add("maincontainer--productscontainer--producttitle");
		title.textContent = `Remera ${design} `

		let description = document.createElement("span");
		description.classList.add("maincontainer--productscontainer--productdescription");
		description.textContent = product.DESCRIPCIÓN;

		let image = document.createElement("img");
		image.src = `../assets/images/remera${product.REMERA}.png`;
		image.alt = product.DISEÑO;



		let precio = document.createElement("div");
		precio.textContent = `$${product.PRECIO} `;

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


//Obtener los productos de la base de datos
const getProductos = (filter, value, mostrar) => {

	fetch(`../controller/ProductsListController.php?filter=${filter}&value=${value}`)
		.then(res => res.ok ? Promise.resolve(res) : Promise.reject(res))
		.then(res => res.json())
		.then(res => {
			productos = [...res];
			if (mostrar) printProductos(res);
		})
}
getProductos("getAll", null, true);

productsList.addEventListener('dragstart',(e) => {
	e.preventDefault();
	let obj;
	e.target.nodeName=="A"? obj = e.target : obj= e.target.parentElement;
	let id = obj.firstElementChild.src;
	id= id.slice(-8);
	var regex = /(\d+)/g;
	
	console.log(id.match(regex));
	
	
} );

//reiniciar filtros
restart.addEventListener('click', () => {
	restart.classList.add("hidden");
	getProductos("getAll", null, true);
})


//Escuchando los filtros
menu.addEventListener('click', (e) => {
	let p2 = [];
	if (e.target.className == "maincontainer--menu--filter--bySize") {
		if (ftalle) getProductos("getAll", null, false);
		for (let p of productos) {
			if (p.TALLE == e.target.textContent) {
				p2.push(p);
			}
		}
		ftalle = true;
		productos = p2;
		printProductos(productos);
	}
	else if (e.target.className == "maincontainer--menu--filter--byDesign") {
		if (fdiseño) getProductos("getAll", null, false);
		for (let p of productos) {
			if (p.DISEÑO == e.target.textContent) {
				p2.push(p);
			}
		}
		fdiseño = true;
		productos = p2;
		printProductos(productos);
	}
	else if (e.target.className == "maincontainer--menu--filter--sortByPrice") {
		if (e.target.id == "sortByPriceLTH") productos.sort((a, b) => (a.PRECIO > b.PRECIO) ? 1 : -1)
		else productos.sort((a, b) => (a.PRECIO < b.PRECIO) ? 1 : -1);

		printProductos(productos);
	}

	restart.classList.remove("hidden");
});


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

