

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     Carpetas
    </h1>
    </section>

      <section class="content">
    <div class="box">
        <div class="box-header">
      <button class="btn btn-primary btn-lg" data-toggle="modal" tabindex="-1" data-target="#CrearcarpetasC">Crear Carpetas</button>
    </div>
  <div class="box-body">

        <table class="table table-bordered table-hover table-striped DT" id="example">
          <thead>
            <tr>
              <th>N</th>
              <th>Descripcion</th>
              <th>Descargar Archivos</th>
              <th>Contacto</th>
              <th>Editar /Eliminar</th>

            </tr>
          </thead>

          <tbody>

          <?php

            $columna=null;
            $valor=null;

            
            $resultado = carpetasC::VercarpetasC($columna,$valor);

            foreach ($resultado as $key => $value) {

              
              
              echo '<tr>
              
              <td>'.($key+1).'</td>
             
              <td>'.$value["descripcion"].'</td>
               <td><a href="http://localhost/Usuarios/carpetasx/'.$value["id"].' " <button >Descargar</button></td>
               </td>

              <div class="btn-group">
               <td><button class="btn btn-success EditarSecretaria" data-toggle="modal" data-target="#EditarSecretaria"><i class="fa fa-pencil"></i></button>
               <button class="btn btn-danger EliminarA"  Sid="'.$value["id"].'"><i class="fa fa-times"></i></button></td>
               </td>'
          
              
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


?>
