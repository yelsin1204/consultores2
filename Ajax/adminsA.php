<?php


require_once "../Controladores/secretariasC.php";
require_once "../Modelos/secretariasM.php";



class AdminsA{

	public $Sid;


	public function EAdminA(){

		$columna="id";
		$valor=$this->Sid;

		$resultado = SecretariasC::SecretariaC($columna,$valor);  //SecretariaC es una nueva function//
		echo json_encode($resultado);
	}




	// public $Norepetir;

	// public function NoRepetirUsuarioA(){

	// 	$columna="usuario";
	// 	$valor=$this->Norepetir;

	// 	$resultado=SecretariasC::VerSecretariasC($columna,$valor);
	// 	echo json_encode($resultado);


	// }
}



if(isset($_POST["Sid"])){

	$eD = new adminsA();  //de la clase AdministradoresA//
	$eD -> Sid = $_POST["Sid"];      //nos eejcute la funcion doctor ID//
	$eD -> EAdminA();      //nos eejcute la funcion editar doctor Ajax//

}


// if(isset($_POST["Norepetir"])){

// 	$Norepetir = new adminsA();  //de la clase AdministradoresA//
// 	$Norepetir -> Norepetir = $_POST["Norepetir"];      //nos eejcute la funcion doctor ID//
// 	$Norepetir -> NorepetirUsuarioA();      //nos eejcute la funcion editar doctor Ajax//

// }



?>


