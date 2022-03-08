<?php

require_once "ConexionBD.php";

 class archivosM extends ConexionBD{
 	
 	//crear//
	static public function CreararchivosM($tablaBD,$datosC){
		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD(nombre,descripcion,archivos,id_consultor) VALUES(:nombre,:descripcion,:archivos,:id_consultor)");


		
		$pdo->bindParam(":nombre",$datosC["nombre"],PDO::PARAM_STR);  //insertar datos multiples//
		$pdo->bindParam(":descripcion",$datosC["descripcion"],PDO::PARAM_STR);
		$pdo->bindParam(":archivos",$datosC["archivos"],PDO::PARAM_STR);
		$pdo->bindParam(":id_consultor",$datosC["id_consultor"],PDO::PARAM_INT);		

		if($pdo -> execute()){ //si se ejecuta correctamente retornamos valor verdadero//
			return true;
		}else{
			return false;//si se ejecuta correctamente retornamos valor falso//	
		}

		$pdo -> close(); //cerramos la condicion//
	    $pdo = null;  //vaceamos la condicion//
	}




		//mostrar//
	static public function VerarchivosM($tablaBD,$columna,$valor){  //las variables bd , columnas y valores //

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

static public function BorrarArchivosM($tablaBD,$id){
	$pdo=ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id =:id");
	$pdo->bindParam(":id",$id,PDO::PARAM_INT);

	if($pdo -> execute()){
		return true;
	}else{
		return false;
	}

	$pdo -> close();
	$pdo = null;
}



 }


?>