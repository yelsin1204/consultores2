<div class="content-wrapper">
  <section class="content-header">
    <h1>Historial de cambios institucional</h1>

  </section>

  <section class="content">
    <div class="box">
      <div class="box-header">
      <!--  <button class="btn btn-primary btn-lg" data-toggle="modal" tabindex="-1" data-target="#CrearDoctor">Crear Funcionarios</button>
   <!--   <button><a href="generarE.php" class="btn btn-success">Generar Excel</a></button>-->
   <!--       <button><a href="generarW.php" class="btn btn-primary">Generar Word</a></button>-->  
   
      </div>
      <div class="box-body">
        <table class="table table-bordered table-hover table-striped DT" id="example">
          <thead>
            <tr>
              <th>N</th>
            
              <th>Nombre</th>      
                     
              <th>Institucion</th>
               <th>Hora</th>
          
          
            </tr>
          </thead>

          <tbody>

            <!--para vizualizar los campos de la tabla//-->

            <?php

            $columna = null;
            $valor = null;

            $resultado = historialC::VerhistorialC($columna, $valor);

            foreach ($resultado as $key => $value) {
              
              echo '<tr>
              
              <td>'.($key+1).'</td>

              <td>'.$value["nombre"].'</td>
              
              <td>'.$value["institucion"].'</td>
               <td>'.$value["fecha"].'</td>';
          
  

             echo  '</tr>';

            }


            ?>
            
          </tbody>
          
        </table>


      </div>
    </div>


  </section>
</div>

