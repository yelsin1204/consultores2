$(".DT").on("click", ".EliminarA", function(){ //le damos click en eliminarA//

	var Sid = $(this).attr("Sid"); //en una variable Sid con esto le damos atributo//


	window.location ="index.php?url=archivo&Sid="+Sid;


})
