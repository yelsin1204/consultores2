

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
      
    </div>
  <div class="box-body">

        <table class="table table-bordered table-hover table-striped DT" id="example">
          <thead>
            <tr>
              <th>N</th>
              <th>Nombre</th>
              <th>Descripción</th>
              <th>Descargar Archivos</th>




            </tr>
          </thead>

          <tbody>

          <?php

            $columna=null;
            $valor=null;

            
            $resultado =archivosC::VerarchivosC($columna,$valor);

            foreach ($resultado as $key => $value) {

              
              
              echo '<tr>
              
              <td>'.($key+1).'</td>

              <td>'.$value["nombre"].'</td>
              <td>'.$value["descripcion"].'</td>
               <td>'.$value["nombre"].'-<a href="http://localhost/Usuarios/'.$value["archivos"].'"  download="'.$value["nombre"].'" <button class="btn btn-success" >Descargar</button></td>
               </td>

              <div class="btn-group">
             

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
