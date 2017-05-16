<h1>REGISTRO DE USUARIO</h1>

<form method="post" action="">
	
	<input type="text" placeholder="Usuario" name="usuario" required>

	<input type="password" placeholder="Contraseña" name="password" required>

	<input type="email" placeholder="Email" name="email" required>

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