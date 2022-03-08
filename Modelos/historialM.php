<?php
require_once "ConexionBD.php";



class historialM extends ConexionBD{

	static public function VerhistorialM($tablaBD){

		$pdo=ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD ");

		$pdo->execute(); //ejecutamos

		return $pdo->fetchAll();  //traemos los varlores


		$pdo->close();   //cerramos la consulta //
		$pdo=null;   //vacemoss los campos


	}




	

	}



?>