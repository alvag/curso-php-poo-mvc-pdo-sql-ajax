<?php

class MvcController{

	#LLAMADA A LA PLANTILLA
	#-------------------------------------

	public function pagina(){	
		
		include "views/template.php";
	
	}

	#ENLACES
	#-------------------------------------

	public function enlacesPaginasController(){

		if(isset( $_GET['action'])){
			
			$enlaces = $_GET['action'];
		
		}

		else{

			$enlaces = "index";
		}

		$respuesta = Paginas::enlacesPaginasModel($enlaces);

		include $respuesta;

	}

	#Registro de usuarios
	public function registrarUsuarioController(){

		if (isset($_POST['usuario'])) {

			if (preg_match('/^[a-zA-Z0-9]*$/', $_POST['usuario']) &&
				preg_match('/^[a-zA-Z0-9]*$/', $_POST['password'])
				) {

				$usuario = array(
				'usuario' => $_POST['usuario'],
				'password' => $_POST['password'],
				'email' => $_POST['email']
				);

				$respuesta = Datos::registrarUsuarioModel($usuario, 'usuarios');

				if($respuesta == "success"){
					header("location:index.php?action=ok");
				} else {
					header("location:index.php");
				}
				
			}
			
		}
			
	}


	#Ingreso de usuarios
	public function loginController(){

		if (isset($_POST['usuario'])) {
			$usuario = array(
				'usuario' => $_POST['usuario'],
				'password' => $_POST['password']			
			);

			$respuesta = Datos::loginModel($usuario, 'usuarios');

			if($respuesta['usuario'] == $_POST['usuario'] && $respuesta['password'] == $_POST['password']){

				session_start();
				$_SESSION['validar'] = true;

				header('location:index.php?action=usuarios');
			} else {
				header('location:index.php?action=fallo');
			}
		}

	}

	#Listado de usuarios
	public function getUsers(){
		$respuesta = Datos::getUsers('usuarios');

		foreach ($respuesta as $usuario => $item) {
			echo '<tr>
				<td>'.$item["usuario"].'</td>
				<td>'.$item["password"].'</td>
				<td>'.$item["email"].'</td>
				<td><a href="index.php?action=editar&id='.$item["id"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=usuarios&idBorrar='.$item["id"].'"><button>Borrar</button></a></td>
			</tr>';
		}		
	}

	public function getUser(){

		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$respuesta = Datos::getUser($id, 'usuarios');

			echo '<input type="hidden" name="id" value="'.$respuesta["id"].'">

				<input type="text" value="'.$respuesta["usuario"].'" name="usuario" required>

				<input type="text" value="'.$respuesta["password"].'" name="password" required>

				<input type="email" value="'.$respuesta["email"].'" name="email" required>

				<input type="submit" value="Actualizar">';
		}

		
	}

	public function actualizarUsuarioController(){

		if (isset($_POST['id'])) {

			$usuario = array(
				'id' => $_POST['id'],
				'usuario' => $_POST['usuario'],
				'password' => $_POST['password'],
				'email' => $_POST['email']
			);

			$respuesta = Datos::actualizarUsuarioModel($usuario, 'usuarios');

			if($respuesta == "success"){
				header("location:index.php?action=cambio");
			} else {
				echo 'Error al actualizar';
			}
		}
			
	}

	public function borrarUsuario(){
		if (isset($_GET['idBorrar'])) {
			$respuesta = Datos::deleteUser($_GET['idBorrar'], 'usuarios');

			if($respuesta == "success"){
				header("location:index.php?action=usuarios");
			} else {
				echo 'Error al eliminar usuario';
			}
		}
	}

	

}

?>