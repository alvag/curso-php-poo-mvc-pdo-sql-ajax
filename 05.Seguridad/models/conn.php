<?php 

	/**
	* clase de conexion
	*/
	class Conexion {
		
		public function conectar(){
			$link = new PDO('mysql:host=localhost;dbname=cursophp', 'root', '');	
			return $link;	
		}
	}

?>