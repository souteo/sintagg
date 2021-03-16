import { getTopnav } from './PageModel.js';

getTopnav();


//Obtener la lista de filtros por color
const getColorsList = () => {

	let xhr = new XMLHttpRequest();

	xhr.open('GET', '../controller/ProductsMenuController.php?page=getColors')

	xhr.addEventListener('load', (data) => {
		const dataJSON = JSON.parse(data.target.response);
		
		const color_filter = document.getElementById("color--filter");
		const fragment = document.createDocumentFragment();


		for (const color of dataJSON) {
			let link = document.createElement("a");
			link.textContent = color.NOMBRE.charAt(0).toUpperCase();
			link.textContent += color.NOMBRE.slice(1);
			link.classList.add("maincontainer--menu--filter--byColor");
			link.setAttribute("id", color.NOMBRE);
			link.href = "#";
			fragment.appendChild(link);
		}
		color_filter.appendChild(fragment);

	});

	xhr.send();
}
getColorsList();


//Obtener los productos de la base de datos
const getProductos = (filter, value) => {
	let xhr = new XMLHttpRequest()
	
	xhr.open('GET', `../controller/ProductsListController.php?filter=${filter}&value=${value}`)

	xhr.addEventListener('load', (data) => {
		
		console.log(data.target.response);
		
		const dataJSON = JSON.parse(data.target.response)


		const productsList = document.getElementById("productslist");
		const fragment = document.createDocumentFragment();

		for (const product of dataJSON) {
			let p = document.createElement("a");
			p.classList.add("maincontainer--productslist--product")

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

	})

	xhr.send()
}

getProductos("getAll");

const menu = document.getElementById("maincontainer--menu");

menu.addEventListener('click', (e) => {
	if (e.target.nodeName == "A") {
		getProductos(e.target.className, e.target.id);
	}
});


//Obteniendo la lista de talles
const getSizesList = () => {
	let xhr = new XMLHttpRequest();

	xhr.open('GET', '../controller/ProductsMenuController.php?page=getSizes')

	xhr.addEventListener('load', (data) => {
		const dataJSON = JSON.parse(data.target.response);


		const color_filter = document.getElementById("size--filter");
		const fragment = document.createDocumentFragment();


		for (const size of dataJSON) {
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

	xhr.send();
}
getSizesList();


//Obteniendo la lista de diseños
const getDesignsList = () => {
	let xhr = new XMLHttpRequest();

	xhr.open('GET', '../controller/ProductsMenuController.php?page=getDesigns')

	xhr.addEventListener('load', (data) => {
		const dataJSON = JSON.parse(data.target.response);

		const color_filter = document.getElementById("design--filter");
		const fragment = document.createDocumentFragment();


		for (const size of dataJSON) {
			let link = document.createElement("a");
			link.textContent = size.NOMBRE.charAt(0).toUpperCase();
			link.textContent += size.NOMBRE.slice(1);
			link.classList.add("maincontainer--menu--filter--link");
			link.href = "#";
			fragment.appendChild(link);
		}
		color_filter.appendChild(fragment);
	});

	xhr.send();
}
getDesignsList();


/*
//Ordenando los productos por precio de menor a mayor
const sortProductListByPrice = () => {

	const container = document.getElementById("productslist");

	const sortArrayByPrice = (array) => {
		let sortedArray = [];
		while (array.length > 0) {
			let iMinor = 0;
			let value = parseInt(array[0].lastElementChild.innerText.slice(1));
			for (let i = 0; i < array.length; i++) {
				if (parseInt(array[i].lastElementChild.innerText.slice(1)) < value) {
					iMinor = i;
					value = parseInt(array[i].lastElementChild.innerText.slice(1));
				}
			}
			sortedArray.push(array[iMinor]);
			array.splice(iMinor, 1);
		}

		return sortedArray;
	}

	let items = [...container.children];

	let sorted = sortArrayByPrice(items);

	const nuevoMain = document.createElement("div");

	nuevoMain.classList.add(container.className);

	for (let i in sorted) {
		nuevoMain.appendChild(sorted[i])
	}

	container.replaceWith(nuevoMain);

}


const button = document.getElementById("sortByPrice");
button.addEventListener('click', () => {
	const container = document.getElementById("productslist");

	if (container) {
		sortProductListByPrice()
	}

});
*/
