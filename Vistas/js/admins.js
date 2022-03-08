$(".DT").on("click", ".EliminarSecretaria", function(){

	var Sid = $(this).attr("Sid");
	var bfoto =$(this).attr("bfoto");


	window.location ="index.php?url=administradores&Sid="+Sid+"&bfoto="+bfoto;


})



$(".DT").on("click",".EditarSecretaria", function(){

	var Sid = $(this).attr("Sid"); //variable post//
	var datos = new FormData();  // compilar los valor por metodo ajax//

	datos.append("Sid",Sid);   /// variable post del ID ////

	$.ajax({

		url: "Ajax/adminsA.php",  //donde se ejecutara el ajax//
		method:"POST",
		data: datos,   // para poder vizualizar  los datos de la empresa//  
	    dataType:"json",
		contentType:false,
		cache:false,
		processData:false,

		success: function(resultado){

			
			$("#Sid").val(resultado["id"]); //el id ddel formulario//
			$("#imagenActual").val(resultado["foto"]);

			if(resultado["foto"] != ""){
				$(".visor").attr("src", resultado["foto"]);
			}else{
				$(".visor").attr("src", "Vistas/img/defecto.png");
			}



			$("#usuarioE").val(resultado["usuario"]);  //su id de editar  con su variable post//
			$("#claveE").val(resultado["clave"]);
			$("#nombreE").val(resultado["nombre"]);
			$("#apellidoE").val(resultado["apellido"]);


		}



	})

})


$("#usuario").change(function(){ //caundo cambiamos ejecutaremos la funcion//
	
	$(".alert").remove();

	var usuario = $(this).val();
	var datos = new FormData();
	datos.append("Norepetir", usuario); 

	$.ajax({

		url: "Ajax/adminsA.php",  //donde se ejecutara el ajax//
		method:"POST",
		data: datos,   // para poder vizualizar  los datos de la empresa//  
	    dataType:"json",
	    cache:false,
		contentType:false,
		
		processData:false,

		success: function(resultado){

			if(resultado){
				$("#usuario").parent().after('<div class="alert alert-danger">El usuario ya existe</div>');
				$("#usuario").val("");
			}
			

		}



	})

})


$("#usuarioE").change(function(){ //caundo cambiamos ejecutaremos la funcion//
	
	$(".alert").remove();

	var usuario = $(this).val();
	var datos = new FormData();
	datos.append("Norepetir", usuario); 

	$.ajax({

		url: "Ajax/adminsA.php",  //donde se ejecutara el ajax//
		method:"POST",
		data: datos,   // para poder vizualizar  los datos de la empresa//  
	    dataType:"json",
	    cache:false,
		contentType:false,
		
		processData:false,

		success: function(resultado){

			if(resultado){
				$("#usuarioE").parent().after('<div class="alert alert-danger">El usuario ya existe</div>');
				$("#usuarioE").val("");
				
			}
			

		}



	})

})






