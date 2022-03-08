<?php

require_once "ConexionBD.php";

 class carpetasM extends ConexionBD{
 	
 
		//mostrar//
	static public function VercarpetasM($tablaBD,$columna,$valor){  //las variables bd , columnas y valores //

			if($columna!=null){// si la columna esta null //
			

			$pdo=ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna=:$columna");  //preparamos la consulatA accediendo a la clase COnexionBD  
			// y la funcion estatica cBD() y con la fl
			
			$pdo->bindParam(":".$columna,$valor,PDO::PARAM_STR);  //traemos las columnas con us valores//
			$pdo->execute();   //ekecutamos los parametros del pdo//
			return $pdo->fetchAll();  //retornamos los valores con fetchall  //


		}else{
			$pdo=ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");
			$pdo->execute();
			return $pdo->fetchAll();
		}
	$pdo -> close(); //cerramos la condicion//
	$pdo = null;  


}


static public function perfilM($tablaBD,$id){
	$pdo=ConexionBD::cBD()->prepare("SELECT archivos, descripcion,id_archivos FROM $tablaBD WHERE id=:id");
	$pdo->bindParam("id",$id,PDO::PARAM_INT);
	$pdo->execute();
	return $pdo->fetch();
	$pdo ->close();
	$pdo=null;
	
}

//borrar archivos ///




 }


?>