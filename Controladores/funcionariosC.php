<?php

class funcionariosC {


   //Crear Doctores //
	public function CrearfuncionarioC(){

		if (isset($_POST["rolD"])) {



	    $rutaImg = "";
	    
		if(isset($_FILES["foto"]["tmp_name"]) && !empty($_FILES["foto"]["tmp_name"])){ 

			//si existe el archvivo existe el archivo foto y esta vacia //

			if($_FILES["foto"]["type"] == "image/jpeg"){

				$nombre = mt_rand(10,999);

				$rutaImg = "Vistas/img/consultores/S".$nombre.".jpg";

				$imagen = imagecreatefromjpeg($_FILES["foto"]["tmp_name"]);

				imagejpeg($imagen, $rutaImg);

			}


			if($_FILES["foto"]["type"] == "image/png"){

				$nombre = mt_rand(10,999);

				$rutaImg = "Vistas/img/consultores/S".$nombre.".png";

				$imagen = imagecreatefrompng($_FILES["foto"]["tmp_name"]);

				imagepng($imagen, $rutaImg);

			}

		}


		//para subir cv//



			$countfile=count($_FILES["cv"]["name"]);			
		  //antes   $rutaArchivo = "";	
			for($i=0 ; $i < $countfile; $i++) {

				$filename=$_FILES["cv"]["name"][$i];

				$target_file="cv/".$filename;

				if (move_uploaded_file($_FILES["cv"]["tmp_name"][$i],$target_file)) {	


			$tablaBD = "consultores"; //base de datos//

			$datosC= array("rol" => $_POST["rolD"], "apellido" => $_POST["apellido"],"nombre" => $_POST["nombre"],
				"cargo" => $_POST["cargo"],"fecha"=>$_POST["fecha"],"telefono" => $_POST["telefono"],"telefono2" => $_POST["telefono2"],
				"telefono3" => $_POST["telefono3"],"correo" => $_POST["correo"],"correo2" => $_POST["correo2"],"institucion"  => $_POST["institucion"] ,"direccion"=>$_POST["direccion"], "foto"=>$rutaImg , "creado_por"=>$_POST["creado_por"],"nota"=>$_POST["nota"] ,"ciudad"=>$_POST["ciudad"],"dni"=>$_POST["dni"],"cv"=>$target_file);  

			//enviamos las propidades del arraY//

			$resultado = funcionariosM::CrearfuncionarioM($tablaBD,$datosC); //enviamos los parametros primero la bd y luego los datos de mi array//



			if($resultado==true) {
				echo'<script>
				window.location = "consultores";
				</script>';
			}else{
				echo "error";
			}

}
}
}
}




//vizaulizar los camposs   ///
	static public function verfuncionariosC($columna,$valor){
		$tablaBD="consultores";
		$resultado =funcionariosM::VerfuncionariosM($tablaBD,$columna,$valor);
		return $resultado;

	}


	//mostarar los campos para editar  //
	static public function funcionarioC($columna,$valor){
		$tablaBD="consultores";
		
		$resultado =funcionariosM::funcionarioM($tablaBD,$columna,$valor);
		return $resultado;

	}


	//editar mediante Ajax//
	public function ActualizarfuncionarioC(){
		if(isset($_POST["Did"])){


			$rutaImg = $_POST["imagenActual"];  //traemos la imagen actual //

			if(isset($_FILES["fotoE"]["tmp_name"])  && !empty($_FILES["fotoE"]["tmp_name"])){

				if(!empty($_POST["imagenActual"])){
					unlink($_POST["imagenActual"]); //si no viene vacia eliminamos esta variable//

				}else{
					mkdir($direc,0755);	
					
				}

				if($_FILES["fotoE"]["type"] == "image/jpeg"){ 

					$nombre = mt_rand(10,999);

					$rutaImg = "Vistas/img/admins/S".$nombre.".jpg";

					$imagen = imagecreatefromjpeg($_FILES["fotoE"]["tmp_name"]);  //para poder crear la nueva foto//

					imagejpeg($imagen, $rutaImg);

				}

				if($_FILES["fotoE"]["type"] == "image/png"){

					$nombre = mt_rand(10,999);

					$rutaImg = "Vistas/img/admins/S".$nombre.".png";

					$imagen = imagecreatefrompng($_FILES["fotoE"]["tmp_name"]); //creamos con el nuevo valor del id editar  //

					imagepng($imagen, $rutaImg);

				}
			}



			$tablaBD = "consultores";
			$datosC = array("id"=>$_POST["Did"],"apellido"=>$_POST["apellidoE"],"nombre"=>$_POST["nombreE"],"cargo" => $_POST["cargoE"],"fecha"=>$_POST["fechaE"],"telefono"=>$_POST["telefonoE"],"telefono2"=>$_POST["telefono2E"],"telefono3"=>$_POST["telefono3E"],"correo"=>$_POST["correoE"] ,"correo2"=>$_POST["correo2E"],"institucion"=>$_POST["institucionE"] ,"direccion"=>$_POST["direccionE"],"foto"=>$rutaImg, "creado_por"=>$_POST["creado_porE"],"nota"=>$_POST["notaE"]);  //trae el valor actual y lo reemplzas con el naem//

			$resultado = funcionariosM::ActualizarfuncionarioM($tablaBD,$datosC);
			if($resultado == true) {

				echo '<script>

				window.location= "consultores";
				</script>';
			}

		}

	}


	//Borrar Doctor Ajax//
	public function BorrarfuncionarioC(){

		if(isset($_GET["Did"])){
			$tablaBD="consultores";
			$id=$_GET["Did"];
			if($_GET["imgD"] != ""){
				unlink($_GET["imgD"]);
			}


			$resultado=funcionariosM::BorrarfuncionarioM($tablaBD,$id);

			if($resultado == true){
				echo '<script>
				window.location = "consultores";
				</script>';
			}

		}

	}


	public function perfilC(){
		$tablaBD="consultores";
		$id=substr($_GET["url"], 7);

		$resultado=funcionariosM::perfilM($tablaBD,$id);
		
		echo '<div class="box-body">

		<div class="col-md-6 bg-secondary" style="margin-top: 1%">

		<h4>Apellidos:</h4>  
		<h4>'.$resultado["apellido"].'</h4>

		<hr>

		<h4>Nombres:</h4>
		<h4>'.$resultado["nombre"].'</h4>
		<hr>
		<h4>Fecha nacimiento:</h4>
		<h4>'.$resultado["fecha"].'</h4>

		<hr>


		<hr>

		<h4>Cargo:</h4>
		<h4>'.$resultado["cargo"].'</h4>

		<hr>

		<h4>Teléfono:</h4>
		<h4>'.$resultado["telefono"].' </h4>
		<hr>
		<h4>Celular:</h4>
		<h4>'.$resultado["telefono2"].' </h4>
		<hr>
		<h4>Celular2:</h4>
		<h4>'.$resultado["telefono3"].' </h4>
		<hr>
		<h4>Correo institucional:</h4>
		<h4>Teléfono: '.$resultado["correo"].' </h4>
		<hr>
		<h4>Correo personal:</h4>
		<h4>Teléfono: '.$resultado["correo2"].' </h4>
		<hr>
		<h4>Institución:</h4>
		<h4>Teléfono: '.$resultado["institucion"].' </h4>
		<hr>
		<h4>Dirección:</h4>
		<h4>'.$resultado["direccion"].' </h4>
		<hr>
		<h4>Nota:</h4>
		<h4>'.$resultado["nota"].' </h4>
		<hr>
		<h4>Ciudad:</h4>
		<h4>'.$resultado["ciudad"].' </h4>
		<hr>
		<h4>Dni:</h4>
		<h4>'.$resultado["dni"].' </h4>
		<hr>

		</div>

		<div class="col-md-6">
		<h4 style="margin-left:20px">Foto:</h4>   
		<img src="http://localhost/Usuarios/'.$resultado["foto"].'" style="margin-top:60px; margin-left:20px;">

		</div>

		</div>';







	}
	
}