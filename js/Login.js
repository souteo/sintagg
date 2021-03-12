const button = document.getElementById('signUp');
const fechan = document.getElementById('fecha_nac');
const nombre = document.getElementById('nombre');
const apellido = document.getElementById('apellido');
const recordar = document.getElementById('recordar');
const signUpBtn = document.getElementById('signUpBtn');
const mainform = document.getElementById('mainform');
const titulo = document.getElementById('titulo');
const submit = document.getElementById('submit');
const apellidoInput = document.getElementById('apellidoInput');
const nombreInput = document.getElementById('nombreInput');
const fecha_nacInput = document.getElementById('fecha_nacInput');

//cambiar del formulario de login al formulario de sign up
button.addEventListener("click", () => {
    fechan.classList.toggle('hidden');
    nombre.classList.toggle('hidden');
    apellido.classList.toggle('hidden');
    recordar.classList.toggle('hidden');
    if(!apellido.classList.contains('hidden')){
        titulo.textContent="REGISTRARSE";
        submit.textContent="Crear cuenta";
        mainform.setAttribute('action', '../controller/ValidacionRegistro.php')
        fecha_nacInput.setAttribute('required','true');
        nombreInput.setAttribute('required','true');
        apellidoInput.setAttribute('required','true');
    }
    else{
    titulo.textContent="INICIAR SESIÓN";
    submit.textContent="Iniciar sesion";
    mainform.setAttribute('action', '../controller/ValidacionLogin.php')
    fecha_nacInput.removeAttribute("required");
    nombreInput.removeAttribute("required");
    apellidoInput.removeAttribute("required");
    }
});