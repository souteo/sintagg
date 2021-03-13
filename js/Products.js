//Obtener la lista de filtros por color
const getColorsList = () => {
	
	let xhr = new XMLHttpRequest();

	xhr.open('GET', '../controller/ProductsMenuController.php?page=getAll')

	xhr.addEventListener('load', (data) => {
		const dataJSON = JSON.parse(data.target.response);

		console.log("entra");

		const color_filter = document.getElementById("color--filter");
		const fragment = document.createDocumentFragment();

		
		for (const color of dataJSON) {
			let link = document.createElement("a");
			link.textContent = color.NOMBRE.charAt(0).toUpperCase();
			link.textContent += color.NOMBRE.slice(1);
			link.classList.add("maincontainer--menu--filter--link");
			link.href = "#";
			fragment.appendChild(link);
		}
		color_filter.appendChild(fragment);
	
	});
	
	xhr.send();
}

getColorsList();

//Obtener los productos de la base de datos
const getProductos = () => {
	let xhr = new XMLHttpRequest()

	xhr.open('GET', '../controller/ProductsListController.php?page=getAll')

	xhr.addEventListener('load', (data) => {
		const dataJSON = JSON.parse(data.target.response)


		const productsList = document.getElementById("productslist");
		const fragment = document.createDocumentFragment();

		for (product of dataJSON) {
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
		productsList.appendChild(fragment);
	})

	xhr.send()
}

getProductos();
