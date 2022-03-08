<?php

class SecretariasC {

public function IngresarSecretariaC(){

	if( isset($_POST["usuario"]) && isset($_POST["clave"]) ) {

		if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuario"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["clave"])){
			
			$tablaBD="usuarios";
			$datosC = array("usuario"=>$_POST["usuario"], "clave"=>$_POST["clave"]);

			$resultado = SecretariasM::IngresarSecretariaM($tablaBD, $datosC);

			//convertir el valor booleano en valor de arreglo//

	     if(is_array($resultado)){

             if($resultado["usuario"] == $_POST["usuario"] && $resultado["clave"] == $_POST["clave"]){

					$_SESSION["Ingresar"] = true;

					$_SESSION["id"] = $resultado["id"];
					$_SESSION["usuario"] = $resultado["usuario"];
					$_SESSION["clave"] = $resultado["clave"];
					$_SESSION["nombre"] = $resultado["nombre"];
					$_SESSION["apellido"] = $resultado["apellido"];
					$_SESSION["foto"] = $resultado["foto"];
					$_SESSION["rol"] = $resultado["rol"];
		


					echo '<script>

					window.location = "inicio";
					</script>';

				}

			} elseif(empty($_POST["usuario"]) || empty($_POST["clave"]) ){
				echo '<br><center><div class="alert alert-danger"> LLene campos</center></div>';
			}

				else{

					echo '<br><center><div class="alert alert-danger"> Datos Incorrectos Intente otra vez</center></div>';

				}





			}

		}




	}

	

	//miostar//
	static public function VerSecretariasC($columna,$valor){

		
		$tablaBD="usuarios";
		$resultado= SecretariasM::VerSecretariasM($tablaBD,$columna,$valor);
		return $resultado;
	}


	//para contar los valores totales de adaministradores //
	static public function VerTotalC($columna,$valor){

		$tablaBD="usuarios";
		$resultado= SecretariasM::VerTotalM($tablaBD);
		return $resultado;
	}



	//contar el total de secretarias //
static public function VerTotalS($columna,$valor){

	$tablaBD="usuarios";
	$resultado=SecretariasM::VerTotalS($tablaBD);
	return $resultado;

}




		//miostar por metodo Ajax//
	static public function SecretariaC($columna,$valor){
		$tablaBD="usuarios";

		$resultado= SecretariasM::SecretariaM($tablaBD,$columna,$valor);
		return $resultado;
	}








//crear//

public function CrearSecretariaC(){

	if(isset($_POST["rolS"])){

	//--encriptacion de contraseña--//	$salt =md5($_POST["nuevoPassword"]);
	//---encriptacion de contraseña //	$passwordE=crypt($_POST["nuevoPassword"],$salt);

		$rutaImg = "";

		if(isset($_FILES["foto"]["tmp_name"]) && !empty($_FILES["foto"]["tmp_name"])){

			if($_FILES["foto"]["type"] == "image/jpeg"){

				$nombre = mt_rand(10,999);

				$rutaImg = "Vistas/img/admins/S".$nombre.".jpg";

				$imagen = imagecreatefromjpeg($_FILES["foto"]["tmp_name"]);

				imagejpeg($imagen, $rutaImg);

			}

			if($_FILES["foto"]["type"] == "image/png"){

				$nombre = mt_rand(10,999);

				$rutaImg = "Vistas/img/admins/S".$nombre.".png";

				$imagen = imagecreatefrompng($_FILES["foto"]["tmp_name"]);

				imagepng($imagen, $rutaImg);

			}

		}


	

		$tablaBD="usuarios";
		$datosC= array("usuario" =>$_POST["usuario"] ,"clave" =>$_POST["clave"],"nombre" =>$_POST["nombre"],
			"apellido" =>$_POST["apellido"] , "foto"=>$rutaImg,"rol"=>$_POST["rol"]);


		$resultado=SecretariasM::CrearSecretariaM($tablaBD,$datosC);


		if($resultado == true){

			echo'<script>

			window.location="administradores";
			</script>';
		}else{
			echo "error al crear foto";
		}


	}
}



//borrar secretaria ///


public function BorrarSecretariaC(){
	if(isset($_GET["Sid"])){
		$tablaBD="usuarios";
		$id=$_GET["Sid"];
		if($_GET["bfoto"]!=""){
			unlink($_GET["bfoto"]);
		}

		$resultado=SecretariasM::BorrarSecretariaM($tablaBD,$id);
		if($resultado==true){

			echo'<script>

			window.location="administradores";
			</script>';
		}

	}

}



//actualizar Secretarias//
	//editar mediante Ajax//
public function ActualizarSecretariaC(){

	if(isset($_POST["Sid"])){

		

		$rutaImg = $_POST["imagenActual"];

		if(isset($_FILES["fotoE"]["tmp_name"])  && !empty($_FILES["fotoE"]["tmp_name"])){

			if(!empty($_POST["imagenActual"])){
					unlink($_POST["imagenActual"]); //si no viene vacia eliminamos esta variable//

				}else{
					mkdir($direc,0755);	
					
				}

				if($_FILES["fotoE"]["type"] == "image/jpeg"){

					$nombre = mt_rand(10,999);

					$rutaImg = "Vistas/img/admins/S".$nombre.".jpg";

					$imagen = imagecreatefromjpeg($_FILES["fotoE"]["tmp_name"]);

					imagejpeg($imagen, $rutaImg);

				}

				if($_FILES["fotoE"]["type"] == "image/png"){

					$nombre = mt_rand(10,999);

					$rutaImg = "Vistas/img/admins/S".$nombre.".png";

					$imagen = imagecreatefrompng($_FILES["fotoE"]["tmp_name"]); //creamos con el nuevo valor del id editar  //

					imagepng($imagen, $rutaImg);

				}




			}




		$tablaBD = "usuarios";  //traemos la tablabd //


		


		$datosC = array("id"=>$_POST["Sid"],"usuario"=>$_POST["usuarioE"],"clave"=>$_POST["claveE"],"nombre" => $_POST["nombreE"],"apellido"=>$_POST["apellidoE"] ,"foto"=>$rutaImg);

			$resultado = SecretariasM::ActualizarSecretariaM($tablaBD,$datosC); //del modelo secreatarioas creamos el metodo actualizar secretaria//
			if($resultado == true) {

				echo '<script>

				window.location= "administradores";
				</script>';
				
				echo "actualizado correctamente";
			}else{
				echo  "error al actualizar";
			}

		}
	}





}




