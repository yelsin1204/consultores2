
<?php

 header('Content-Type: text/html; charset=ISO-8859-1');

header("Content-type:application/vnd.ms-word; charset=iso-8859-1");
header("Content-Disposition: attachment; filename=contactos.doc");
require_once "Modelos/ConexionBD.php";

$conn=new ConexionBD();

// $link=$conn->conectarse();
// $query="SELECT * FROM usuarios";
// $result=mysqli_query($link,$query);

//$link=$conn->cBD();

//$cnx=mysqli_connect('localhost','root','','usuarios','3306');

//$query="SELECT * FROM doctores";
//$result = mysqli_query($cnx,$query);



//$data=$link->query("SELECT * FROM consultores")->fetchAll();
$data=ConexionBD::cBD()->query("SELECT * FROM consultores")->fetchAll(); 

?>

<table  border="1" align="center" width="-1000" height="1">
				
					<tr>
						
						<th>Apellido</th>
						<th>Nombre</th>
						<th>Cargo</th>
						<th>Telefono</th>
						<th>Correo</th>
						<th>Institucion</th>
					
					</tr>

					<!--$row= mysqli_fetah_assoc($result)-->
					
					<?php 

					 foreach ($data as $row ) { ?>  
				
	
				<tr>
									
									<td><?php echo   utf8_decode($row["apellido"]) ;?></td>
									<td><?php echo   utf8_decode ($row["nombre"]) ;?></td>
									<td><?php echo   utf8_decode  ($row["cargo"]) ;?></td>
									<td><?php echo   ($row["telefono"] );?></td>
									<td><?php echo   utf8_decode  ($row["correo"] );?></td>
									<td><?php echo   utf8_decode ($row["institucion"]) ;?></td>
						
				</tr>
				<?php

				 } 

			?>
				
</table>
