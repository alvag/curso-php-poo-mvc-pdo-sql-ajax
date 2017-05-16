<h1>REGISTRO DE USUARIO</h1>

<form method="post" action="" onsubmit="return validarRegistro()">
	
	<label for="usuario">Usuario</label>
	<input type="text" placeholder="Máximo 6 caracteres" name="usuario" id="usuario" maxlength="6" required>

	<label for="password">Contraseña</label>
	<input type="password" placeholder="Mínimo 6 caracteres, incluir numero(s) y una mayúscula" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" required>

	<label for="email">Correo Electrónico</label>
	<input type="email" placeholder="Escriba su correo electrónico correctamente" name="email" id="email" required>

	<p style="text-align: center;"><input type="checkbox" id="terminos"><a href="#">Acepta Términos y Condiciones</a></p>

	<input type="submit" value="Enviar">

</form>

<?php 

$registro = new MvcController();
$registro->registrarUsuarioController();

if (isset($_GET['action'])) {

	if ($_GET['action'] == 'ok') {
		echo 'Registro Exitoso';
	} else {
		echo 'Error al registrar';
	}
	
}

?>