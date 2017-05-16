/*========================================
=            Validar Registro            =
========================================*/

function validarRegistro(){

	var usuario = document.querySelector('#usuario').value;
	var password = document.querySelector('#password').value;	
	var email = document.querySelector('#email').value;
	var terminos = document.querySelector('#terminos').checked;

	/* Validar usuario */

	if (usuario != "") {
		
		var expresion = /^[a-zA-Z0-9]*$/;

		if (usuario.length > 6) {
			document.querySelector("label[for='usuario']").innerHTML += "<br>Escriba por favor menos de 6 caracteres";
			return false;
		}

		if (!expresion.test(usuario)) {
			document.querySelector("label[for='usuario']").innerHTML += "<br>No escriba caracteres especiales";
			return false;
		}

	}

	/* validar password */
	
	if (password != "") {
		
		var expresion = /^[a-zA-Z0-9]*$/;

		if (password.length < 6) {
			document.querySelector("label[for='password']").innerHTML += "<br>Escriba más de 6 caracteres";
			return false;
		}

		if (!expresion.test(password)) {
			document.querySelector("label[for='email']").innerHTML += "<br>No escriba caracteres especiales";
			return false;
		}

	}

	/* Valida email */
	if (email != "") {
		
		var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

		if (!expresion.test(email)) {
			document.querySelector("label[for='email']").innerHTML += "<br>Escriba correctamente el email";
			return false;
		}

	}

	/* Validar terminos */

	if (!terminos) {
			
		document.querySelector("form").innerHTML += "<br>Debes aceptar los términos y condiciones";

		document.querySelector('#usuario').value = usuario;
		document.querySelector('#password').value = password;
		document.querySelector('#email').value = email;
		

		return false;
		
	}
	
	

	return true;
}


