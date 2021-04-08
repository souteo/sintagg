//Obtener el topnav bar
export const getTopnav = ()  => {
	let xhr = new  XMLHttpRequest();
	
	xhr.open('GET', `../php/Topnav.php`);
	
	xhr.addEventListener('load', (data)  => {
		const topnav = data.target.response;
		
		const container = document.getElementById("topnav--container");
		
		container.insertAdjacentHTML('afterbegin', topnav);
	})
	
	xhr.send();
}

//Averiguar si hay una sesion iniciada
export function getSession(){
	let xhr = new  XMLHttpRequest();
	
	xhr.open('GET', `../php/Session.php`);
	
	xhr.addEventListener('load', (data)  => {
		if(data.target.response!=1){
			window.location.href = "Products.html"
		}
	})
	
	xhr.send();
}