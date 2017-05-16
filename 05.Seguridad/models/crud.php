<?php 

require_once "conn.php";

class Datos extends Conexion{
	
	public function registrarUsuarioModel($usuario, $tabla){
		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usuario, password, email) VALUES (:usuario, :password, :email)");
		$stmt->bindParam(':usuario', $usuario['usuario'], PDO::PARAM_STR);
		$stmt->bindParam(':password', $usuario['password'], PDO::PARAM_STR);
		$stmt->bindParam(':email', $usuario['email'], PDO::PARAM_STR);

		if ($stmt->execute()) {
			return 'success';
		} else {
			return 'error';
		}

		$stmt->close();

	}

	public function actualizarUsuarioModel($usuario, $tabla){
		
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuario = :usuario, password = :password, email = :email WHERE id = :id");		
		$stmt->bindParam(':usuario', $usuario['usuario'], PDO::PARAM_STR);
		$stmt->bindParam(':password', $usuario['password'], PDO::PARAM_STR);
		$stmt->bindParam(':email', $usuario['email'], PDO::PARAM_STR);
		$stmt->bindParam(':id', $usuario['id'], PDO::PARAM_INT);

		if ($stmt->execute()) {
			return 'success';
		} else {
			return 'error';
		}

		$stmt->close();

	}

	public function loginModel($usuario, $tabla){
		
		$stmt = Conexion::conectar()->prepare("SELECT usuario, password FROM $tabla WHERE usuario = :usuario");
		$stmt->bindParam(':usuario', $usuario['usuario'], PDO::PARAM_STR);		
		$stmt->execute();

		return $stmt->fetch();
		$stmt->close();
	}

	public function getUsers($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt->execute();

		return $stmt->fetchAll();
		$stmt->close();
	}

	public function getUser($id, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where id = :id");
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetch();
		$stmt->close();
	}

	public function deleteUser($id, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla where id = :id");
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();

		if ($stmt->execute()) {
			return 'success';
		} else {
			return 'error';
		}
		
		$stmt->close();
	}

}

?>