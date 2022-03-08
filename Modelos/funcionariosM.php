<?php
require_once "ConexionBD.php";




class funcionariosM extends ConexionBD{
	
	//crear//
	static public function CrearfuncionarioM($tablaBD,$datosC){
		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD(apellido,nombre,cargo,fecha,telefono,telefono2,telefono3,correo,correo2,institucion,direccion,foto,creado_por,nota,ciudad,dni,cv) VALUES(:apellido,:nombre,:cargo,:fecha,:telefono,:telefono2,:telefono3,:correo,:correo2,:institucion,:direccion,:foto,:creado_por,:nota,:ciudad,:dni,:cv)");
//conexion para los valores de nuestras funcionarios Controladores//

		
		$pdo->bindParam(":apellido",$datosC["apellido"],PDO::PARAM_STR);  //insertar datos multiples//
		$pdo->bindParam(":nombre",$datosC["nombre"],PDO::PARAM_STR);
		$pdo->bindParam(":cargo",$datosC["cargo"],PDO::PARAM_STR);
		$pdo->bindParam(":fecha",$datosC["fecha"],PDO::PARAM_STR);
		$pdo->bindParam(":telefono",$datosC["telefono"],PDO::PARAM_STR);
		$pdo->bindParam(":telefono2",$datosC["telefono2"],PDO::PARAM_STR);  //insertar datos multiples//
		$pdo->bindParam(":telefono3",$datosC["telefono3"],PDO::PARAM_STR);
		$pdo->bindParam(":correo",$datosC["correo"],PDO::PARAM_STR);
		$pdo->bindParam(":correo2",$datosC["correo2"],PDO::PARAM_STR);
		$pdo->bindParam(":institucion",$datosC["institucion"],PDO::PARAM_STR);
		$pdo->bindParam(":direccion",$datosC["direccion"],PDO::PARAM_STR);
		$pdo->bindParam(":foto",$datosC["foto"],PDO::PARAM_STR);
		$pdo->bindParam(":creado_por",$datosC["creado_por"],PDO::PARAM_STR);
		$pdo->bindParam(":nota",$datosC["nota"],PDO::PARAM_STR);
		$pdo->bindParam(":ciudad",$datosC["ciudad"],PDO::PARAM_STR);
		$pdo->bindParam(":dni",$datosC["dni"],PDO::PARAM_STR);
		$pdo->bindParam(":cv",$datosC["cv"],PDO::PARAM_STR);
	
	

		if($pdo -> execute()){ //si se ejecuta correctamente retornamos valor//
			return true;
		}else{
			return false;
		}

		$pdo -> close(); //cerramos la condicion//
	    $pdo = null;  //vaceamos la conexion//
	}



	//mostrar//
	static public function VerfuncionariosM($tablaBD,$columna,$valor){  //las variables bd , columnas y valores //

			if($columna==null){// si la columna esta null //
			 //retornamos los valores con fetchall  //

			$pdo=ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");
			$pdo->execute();
			return $pdo->fetchAll();


		}else{


			$pdo=ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna=:$columna");  //preparamos la consulatA accediendo a la clase COnexionBD  
			// y la funcion estatica cBD() y con la fl
			
			$pdo->bindParam(":".$columna,$valor,PDO::PARAM_STR);  //si la columna es 1 el valor que sea 1//
			$pdo->execute();   //ekecutamos los parametros del pdo//
			return $pdo->fetchAll(); 

		}

}


	//mo
	////mostarar los campos para editar  Ajax/

static public function funcionarioM($tablaBD,$columna,$valor){
	if($columna!=null){	
		$pdo=ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna=:$columna");
		$pdo->bindParam(":".$columna,$valor,PDO::PARAM_STR);
		$pdo->execute();
		return $pdo->fetch();


	}
	$pdo -> close(); //cerramos la condicion//
	$pdo = null;  


}


	//Actualizar mediante ///

static public function ActualizarfuncionarioM($tablaBD,$datosC){
	
	$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET apellido = :apellido ,nombre = :nombre  ,cargo=:cargo, fecha=:fecha, telefono = :telefono,telefono2 = :telefono2,telefono3=:telefono3,correo = :correo,correo2 = :correo2,institucion = :institucion, direccion = :direccion ,foto =:foto,creado_por=:creado_por,nota=:nota  WHERE id = :id"); 


	$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
	$pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
	$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
	$pdo -> bindParam(":cargo", $datosC["cargo"], PDO::PARAM_STR);
	$pdo -> bindParam(":fecha", $datosC["fecha"], PDO::PARAM_STR);
	$pdo -> bindParam(":telefono", $datosC["telefono"], PDO::PARAM_STR);
	$pdo -> bindParam(":telefono2", $datosC["telefono2"], PDO::PARAM_STR);
	$pdo -> bindParam(":telefono3", $datosC["telefono3"], PDO::PARAM_STR);
	$pdo -> bindParam(":correo", $datosC["correo"], PDO::PARAM_STR);
	$pdo -> bindParam(":correo2", $datosC["correo2"], PDO::PARAM_STR);
	$pdo -> bindParam(":institucion", $datosC["institucion"], PDO::PARAM_STR);
	$pdo -> bindParam(":direccion", $datosC["direccion"], PDO::PARAM_STR);
	$pdo -> bindParam(":foto", $datosC["foto"], PDO::PARAM_STR);
    $pdo -> bindParam(":creado_por", $datosC["creado_por"], PDO::PARAM_STR);
    $pdo->bindParam(":nota",$datosC["nota"],PDO::PARAM_STR);



	

	if($pdo -> execute()){
		return true;
	}

	$pdo -> close();
	$pdo = null;

}


	//Eliminar Doctor//

static public function BorrarfuncionarioM($tablaBD,$id){
	$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");
	$pdo -> bindParam("id",$id, pdo::PARAM_INT);
	if($pdo->execute()){
		return true;

	}
	$pdo->close();
	$pdo = null;

}

static public function perfilM($tablaBD,$id){
	$pdo=ConexionBD::cBD()->prepare("SELECT id,apellido,nombre,cargo,fecha,telefono,telefono2,telefono3,correo,correo2,institucion,direccion,foto,nota,ciudad,dni FROM $tablaBD WHERE id=:id");
	$pdo->bindParam("id",$id,PDO::PARAM_INT);
	$pdo->execute();
	return $pdo->fetch();
	$pdo ->close();
	$pdo=null;
}


}


?>