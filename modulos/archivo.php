

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     Archivos
    </h1>
    </section>

      <section class="content">
    <div class="box">
        <div class="box-header">
      <button class="btn btn-primary btn-lg" data-toggle="modal" tabindex="-1" data-target="#CrearArchivos">Crear Archivo</button>
    </div>
  <div class="box-body">

        <table class="table table-bordered table-hover table-striped DT" id="example">
          <thead>
            <tr>
              <th>N</th>
              <th>Nombre</th>
              <th>Descripcion</th>
              <th>Descargar Archivos</th>
               <th>Personas </th>
              <th>Editar /Eliminar</th>

            </tr>
          </thead>

          <tbody>

          <?php

            $columna=null;
            $valor=null;

            
            $resultado = archivosC::VerarchivosC($columna,$valor);

            foreach ($resultado as $key => $value) {

              echo '<tr>
              
              <td>'.($key+1).'</td>

              <td>'.$value["nombre"].'</td>
              <td>'.$value["descripcion"].'</td>
               <td>'.$value["nombre"].'-<a href="http://localhost/Usuarios/'.$value["archivos"].'"  download="'.$value["nombre"].'" <button >Descargar</button></td>

               <td>';

          
                  $columna = "id";
                  $valor = $value["id_consultor"];

                  $funcionarios = funcionariosC::verfuncionariosC($columna, $valor);

                  foreach ($funcionarios as $key2 => $value2) {

                    echo $value2["nombre"];
                  }

                  '<td>';
               echo 
               '<td>
              <div class="btn-group">
               <button class="btn btn-success EditarSecretaria" data-toggle="modal" data-target="#EditarSecretaria"><i class="fa fa-pencil"></i>
               </button>
               <button class="btn btn-danger EliminarA"  Sid="'.$value["id"].'"><i class="fa fa-times"></i>
               </button>
               
  
              </div>
              </td>

              </tr>';
}
            


            ?>
            
            
          </tbody>
          
        </table>
      
        </div>
      </div>
      
    </section>
    <!-- /.content -->
  </div>





<!---crear-->

<div class="modal fade" rol="dialog" id="CrearArchivos">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" role="form" enctype="multipart/form-data">
        <div class="modal-header d-block bg-primary">
          <h3 class="modal-title text-center">Archivos</h3>
          <button type="button" class="close" data-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <div class="box-body">
            <div class="col-xs-5">

              <h4>Nombres</h4>
              <input type="text" class="form-control input-lg" name="nombre" >
              <input type="hidden" name="rolA" > 
              
            </div>
            <div class="col-lg-5">
              <h4>Descripción</h4>
              <input type="
              " class="form-control input-lg" name="descripcion" >
              
            </div>

        
            <div class="col-lg-5">
              <h4>Archivos</h4>
              <input type="file" class="form-control input-lg" name="archivos[]" multiple >
              <p class="help-block">Peso permitido 200MB MAX</p>
           <!--   <img src="Vistas/img/defecto.png" class="img-thumbnail" width="60px";>-->

              
            </div>

            <div>

            <div class="col-lg-5">
              <h4>Persona</h4>
              <select class="form-control input-lg" name="id_consultor" id="select2x"  required>
                <option value="">Seleccionar</option>
         
                <?php

                $columna = null;
                $valor = null;

                $resultado = funcionariosC::VerfuncionariosC($columna, $valor);

                foreach ($resultado as $key => $value) {
                  
                  echo '<option value="'.$value["id"].'"> '.$value["nombre"].'</option>';

                }

                ?>

              </select>
            </div>

        </div>
            
          </div>
          
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Crear</button>
            <button type="submit" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          </div>

           <?php

          $crear = new archivosC();
          $crear -> CreararchivosC();

          ?>



        </div>
        
      </form>
    </div>
  </div>
</div>




<!-------////  EDITAR MODALLLL--  //-->
<div class="modal fade" rol="dialog" id="EditarSecretaria">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" role="form" enctype="multipart/form-data">
        <div class="modal-header d-block bg-primary">
          <h3 class="modal-title text-center">Administradores</h3>
          <button type="button" class="close" data-dismiss="modal"></button>
        </div>
        
        <div class="modal-body">
          <div class="box-body">
            <div class="col-lg-5">

              <h3>Usuario</h3>
              <input type="text" class="form-control input-lg" name="usuarioE" id="usuarioE" >
              <input type="hidden" name="Sid" id="Sid">  
              
            </div>
            <div class="col-lg-5">
              <h3>Clave</h3>
              <input type="text" class="form-control input-lg" name="claveE" id="claveE" >
              
            </div>

            <div class="col-lg-5">
              <h3>Nombre</h3>
              <input type="text" class="form-control input-lg" name="nombreE" id="nombreE" >
              
            </div>
            <div class="col-lg-5">
              <h3>Apellido</h3>
              <input type="text" class="form-control input-lg" name="apellidoE" id="apellidoE" >
            </div>
            <div class="col-lg-5">
              <h3>Foto</h3>
              <input type="file"  name="fotoE" id="fotoE" >
              <img src="Vistas/img/defecto.png" class="img-thumbnail visor" width="100px";>
              <p class="help-block">Peso permitido de 200MB</p>
              <input type="hidden" name="imagenActual" id="imagenActual" >
            </div>

          </div>
        </div>
        
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Guardar Datos</button>
          <button type="submit" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>

        <?php

        $actualizarD = new SecretariasC();
        $actualizarD -> ActualizarSecretariaC();

        ?>
      </div>
      
    </form>
  </div>
</div>


<?php
$borrarD = new archivosC();
$borrarD -> BorrarArchivosC();

?>
