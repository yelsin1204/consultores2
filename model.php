<?php

require_once "Modelos/conexionBD.php";

class pdf extends ConexionBD{

	public function getcontacto(int $id){
	$query=$this->pdo->query("SELECT * FROM consultores WHERE  id = '.$id");
}
}
?>
