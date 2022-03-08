<?php


class historialC{

	//miostar//
	static public function VerhistorialC($columna,$valor){
		$tablaBD="historial";

		$resultado= historialM::VerhistorialM($tablaBD,$columna,$valor);


		return $resultado;
	}


}


?>