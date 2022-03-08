<?php
require_once "ConexionBD.php";


class SecretariasM extends ConexionBD{

	static public function IngresarSecretariaM($tablaBD,$datosC){
		

		$pdo = ConexionBD::cBD()->prepare("SELECT usuario,clave,nombre,apellido,foto,rol,id FROM $tablaBD WHERE usuario = :usuario AND clave=:clave");

		$pdo->bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
		$pdo->bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;
	}


// Mostrar Secretarias//

	static public function VerSecretariasM($tablaBD){

		// $pdo=ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD ORDER BY apellido ASC");
		$pdo=ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD ORDER BY apellido ASC");

		$pdo->execute();

		return $pdo->fetchAll();


		$pdo->close();
		$pdo=null;


	}




// // Mostrar Total de administradores//

	static public function VerTotalM($tablaBD){
		$pdo=ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE rol='editor'");

		$pdo->execute();

		return $pdo->fetchAll();


		$pdo->close();
		$pdo=null;

	}




// // Mostrar Total de secretarias//

	static public function VerTotalS($tablaBD){
		$pdo=ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE rol='lector'");

		$pdo->execute();

		return $pdo->fetchAll();


		$pdo->close();
		$pdo=null;

	}






	//mostrar secretarias por metodo Ajax//
	static public function SecretariaM($tablaBD,$columna,$valor){
		if($columna!=null){
			
			$pdo=ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna=:$columna");
			$pdo->bindParam(":".$columna,$valor,PDO::PARAM_STR);
			$pdo->execute();
			return $pdo->fetch();


		}

	$pdo -> close(); //cerramos la condicion//
	$pdo = null;  


}

//crear Secreatarias//

static public function CrearSecretariaM($tablaBD,$datosC){

	$pdo=ConexionBD::cBD()->prepare("INSERT INTO $tablaBD(usuario,clave,nombre,apellido,foto,rol) 
		VALUES(:usuario,:clave,:nombre,:apellido,:foto,:rol)");
	$pdo->bindParam(":usuario",$datosC["usuario"],PDO::PARAM_STR);
	$pdo->bindParam(":clave",$datosC["clave"],PDO::PARAM_STR);
	$pdo->bindParam(":nombre",$datosC["nombre"],PDO::PARAM_STR);
	$pdo->bindParam(":apellido",$datosC["apellido"],PDO::PARAM_STR);
	$pdo->bindParam(":foto",$datosC["foto"],PDO::PARAM_STR);
	$pdo->bindParam("rol",$datosC["rol"],PDO::PARAM_STR);
	if($pdo -> execute()){
		return true;
	}else{
		return false;
	}

	$pdo -> close();
	$pdo = null;


}

                      //borrar//


static public function BorrarSecretariaM($tablaBD,$id){
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






static public function ActualizarSecretariaM($tablaBD,$datosC){
	
		//hacemos la conexion con la bd/

	$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET usuario = :usuario ,clave = :clave ,nombre = :nombre ,apellido=:apellido , foto=:foto WHERE id = :id"); 

	$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
	$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
	$pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
	$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
	$pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
	$pdo -> bindParam(":foto", $datosC["foto"], PDO::PARAM_STR);
	

	if($pdo -> execute()){
		return true;
	}else{
		return false;
	}

	$pdo -> close();


}
}




