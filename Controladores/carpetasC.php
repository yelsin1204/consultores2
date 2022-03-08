<?php


class carpetasC{



	//vizaulizar los camposs   ///
	static public function VercarpetasC($columna,$valor){
		$tablaBD="carpetas";
		$resultado =archivosM::VerarchivosM($tablaBD,$columna,$valor);
		return $resultado;

	}



	//Borrar Doctor Ajax//

		public function perfilC(){
		$tablaBD="carpetas";
		$id=substr($_GET["url"], 9);

		$resultado=carpetasM::perfilM($tablaBD,$id);
		
		echo '<div class="box-body">

		<div class="col-md-6 bg-secondary" style="margin-top: 1%">

		<h4>Apellidos:</h4>  
		<h4>'.$resultado["descripcion"].'</h4>

		<hr>

		<h4>Nombres:</h4>
		<h4>'.$resultado["nombre"].'</h4>
		<hr>
		
		<hr>
		</div>

		<div class="col-md-6">

		</div>

		</div>';


	}

	

}

