

<?php
require_once "../Controladores/funcionariosC.php";
require_once "../Modelos/funcionariosM.php";

class funcionariosA{
	public $Did;
	
	public function EfuncionarioA(){
		$columna="id";
		$valor=$this->Did;
		$resultado =funcionariosC::funcionarioC($columna,$valor);
		echo json_encode($resultado);

	}

}

if(isset($_POST["Did"])){
 $eD = new funcionariosA();
 $eD-> Did = $_POST["Did"];
 $eD->EfuncionarioA();

}
?>