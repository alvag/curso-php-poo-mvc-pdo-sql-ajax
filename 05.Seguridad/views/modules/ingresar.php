<h1>INGRESAR</h1>

	<form method="post" action="">
		
		<input type="text" placeholder="Usuario" name="usuario" required>

		<input type="password" placeholder="Contraseña" name="password" required>

		<input type="submit" value="Enviar">

	</form>

<?php 

$login = new MvcController();
$login->loginController();

if (isset($_GET['action'])) {

	if ($_GET['action'] == 'fallo') {
		echo 'Error en el login';
	}
	
}

?>