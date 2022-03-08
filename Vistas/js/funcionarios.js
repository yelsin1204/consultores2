
//editar  mediante el metodo Ajax//

$(".DT").on("click",".EditarDoctor",function(){

	var Did = $(this).attr("Did");
	var datos = new FormData();


	datos.append("Did", Did);
	$.ajax({

		url:"Ajax/funcionariosA.php",
		method:"POST",
		data: datos, 
		dataType:"json",
		contentType:false,
		cache: false,
		processData:false,

		success: function(resultado){


			$("#Did").val(resultado["id"]); //el id ddel formulario form//
			$("#imagenActual").val(resultado["foto"]);  //traemos la foto actual//

			if(resultado["foto"] != ""){   //si la foto  esta llena//
				$(".visor").attr("src", resultado["foto"]);
			}else{
				$(".visor").attr("src", "Vistas/img/defecto.png");  //sino solo la vemos la de defecto //
			}

			$("#Did").val(resultado["id"]);   //aca captamos la variable de los daotos del id de los consultores  y con la variable resultado traemos el name de la bd//
			$("#apellidoE").val(resultado["apellido"]);  
			$("#nombreE").val(resultado["nombre"]);
			$("#cargoE").val(resultado["cargo"]);
			$("#fechaE").val(resultado["fecha"]);
			$("#telefonoE").val(resultado["telefono"]);
			$("#telefono2E").val(resultado["telefono2"]);
			$("#telefono3E").val(resultado["telefono3"]);
			$("#correoE").val(resultado["correo"]);
			$("#correo2E").val(resultado["correo2"]);
			$("#institucionE").val(resultado["institucion"]);
			$("#direccionE").val(resultado["direccion"]);
			$("#creado_porE").val(resultado["creado_por"]);
			$("#notaE").val(resultado["nota"]);
		
	
		}


	})

})


//eliminar mediante ell metodo ajax//

$(".DT").on("click", ".EliminarDoctor", function(){

	var Did = $(this).attr("Did");


	window.location ="index.php?url=consultores&Did="+Did;

})



//configurar mi tabla modal//

$(".DT").DataTable({
	"language":{
		"sSearch":"Buscador:",
		"sEmptyTable":"no hay datos en la tabla",
		"sZeroRecords":"No hay datos en la Tabla",
		"sInfo":"Mostrando registros del _START_ al _END_ de un total _TOTAL_",
		"sInfoEmpty":"Mostrando registros del 0 al 0  de un total de 0",
		"sInfoFiltered":"(filtrando de un total de _MAX_ registros)",
		"oPaginate":{
			"sFirst":"Primero",
			"sLast":"Ultimo",
			"sNext":"Siguiente",
			"sPrevious":"Anterior"
		},


		"sLoadingRecords":"Cargando....",


		"sLengthMenu":"Mostrar _MENU_ Registros"

	},

	})

$('[data-mask]').inputmask();
