import { getTopnav } from './PageModel.js';

getTopnav();

//divs, titulos, etc
const fechan = document.getElementById('fecha_nac');
const nombre = document.getElementById('nombre');
const apellido = document.getElementById('apellido');
const titulo = document.getElementById('titulo');
const mainform = document.getElementById('mainform');

//inputs
const signUp = document.getElementById('signUpBtn');
const submitBtn = document.getElementById('submitBtn');
const apellidoInput = document.getElementById('apellidoInput');
const nombreInput = document.getElementById('nombreInput');
const fecha_nacInput = document.getElementById('fecha_nacInput');
const recordar = document.getElementById('recordar');
const email = document.getElementById('email');
const password = document.getElementById('pw');


//cambiar del formulario de login al formulario de sign up
signUp.addEventListener("click", () => {
    fechan.classList.toggle('hidden');
    nombre.classList.toggle('hidden');
    apellido.classList.toggle('hidden');
    recordar.classList.toggle('hidden');
    if (!apellido.classList.contains('hidden')) {
        titulo.textContent = "REGISTRARSE";
        submitBtn.textContent = "Crear cuenta";
        mainform.setAttribute('action', '../controller/SignUpValidation.php')
        fecha_nacInput.setAttribute('required', 'true');
        nombreInput.setAttribute('required', 'true');
        apellidoInput.setAttribute('required', 'true');
    }
    else {
        titulo.textContent = "INICIAR SESIÓN";
        submitBtn.textContent = "Iniciar sesion";
        mainform.setAttribute('action', '../controller/ValidacionLogin.php')
        fecha_nacInput.removeAttribute("required");
        nombreInput.removeAttribute("required");
        apellidoInput.removeAttribute("required");
    }
});


//--------VALIDACIONES--------

submitBtn.addEventListener('click', (e) => {
    e.preventDefault();
    let valido = false;
    if (apellido.classList.contains('hidden')) {
        try {
            validateEmail(email.value);
            validatePassword(password.value);
            mainform.submit();
        }
        catch (e) {
            alert(e.message);
        }
    }
    else {
        try {
            validateName(nombreInput.value,apellidoInput.value);
            validateEmail(email.value);
            validatePassword(password.value);
            validateDate(fecha_nacInput.value);
            mainform.submit();
        }
        catch (e){
            alert(e.message);
        }
    }
});

const validateEmail = (email) => {
    const regEx = /^(([^<>()\[\]\\.,:\s@"]+(\.[^<>()\[\]\\.,:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    console.log(email);

    if (!regEx.test(email)) throw new Error("El email es inválido.")
}

const validatePassword = (password) => {
    //Should have 1 lowercase letter, 1 uppercase letter, 1 number, and be at least 8 characters long
    const regEx = /(?=(.*[0-9]))((?=.*[A-Za-z0-9])(?=.*[A-Z])(?=.*[a-z]))^.{8,}$/

    if (!regEx.test(password)) throw new Error("La contraseña debe constar de ocho carácteres como mínimo y tener al menos una mayuscula, una minuscula y un número.")
}

const validateName = (firstName, lastName) => {
    const regEx = /^([A-Z|a-z|Ç-Ü|á-ñ|\ ]{1,40})$/

    if (!regEx.test(firstName)) throw new Error("Ingrese un nombre sin carácteres especiales y que no sobrepase los 40 carácteres.");

    if (!regEx.test(lastName)) throw new Error("Ingrese un apellido sin carácteres especiales y que no sobrepase los 40 carácteres.");
}

const validateDate = (date) => {
    const regEx = /^([1-2][0-9][0-9][0-9])[./-]([0][1-9]|[1][0-2])[./-]([0][1-9]|[1|2][0-9]|[3][0|1])$/

    if (!regEx.test(date)) throw new Error("Ingrese una fecha válida.");
}