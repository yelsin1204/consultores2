<?php


class archivosC{

	public function CreararchivosC(){

		if(isset($_POST["rolA"])){


			$countfile=count($_FILES["archivos"]["name"]);			
		  //antes   $rutaArchivo = "";	
			for($i=0 ; $i < $countfile; $i++) {

				$filename=$_FILES["archivos"]["name"][$i];

				$target_file="archivos/".$filename;

				if (move_uploaded_file($_FILES["archivos"]["tmp_name"][$i],$target_file)) {		

					
		        $tablaBD = "archivos"; //base de datos//

		        $datosC= array("nombre" => $_POST["nombre"],"descripcion" => $_POST["descripcion"],"archivos"=>$target_file,"id_consultor"=>$_POST["id_consultor"]);  

			//enviamos las propidades del arraY//

			$resultado = archivosM::CreararchivosM($tablaBD,$datosC); //consultores condicion crear doctor//



			if($resultado==true) {
				echo'<script>
				window.location = "archivo";
				</script>';
			}else{
				echo "error";
			}
		}
		

	}
}
}



	//vizaulizar los camposs   ///
	static public function verarchivosC($columna,$valor){
		$tablaBD="archivos";
		$resultado =archivosM::VerarchivosM($tablaBD,$columna,$valor);
		return $resultado;

	}



	//Borrar Doctor Ajax//
	public function BorrarArchivosC(){

		if(isset($_GET["Sid"])){ //pasamos la variable Sid//
 			$tablaBD="archivos";

			$id=$_GET["Sid"];
		
			$resultado = archivosM::BorrararchivosM($tablaBD,$id);

			if($resultado == true){

				echo '<script>
				window.location = "archivo";
				</script>';
			}

		}

	}

}

