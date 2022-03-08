    <aside class="main-sidebar " style=" ">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
       <ul class="sidebar-menu">
<?php 


if($_SESSION["rol"] == "administrador"){
        echo '<li>
         <a href="http://localhost/Usuarios/inicio">
          <i class="fa fa-home"></i>
          <span>Principal</span>
        </a>
      </li>

     <li>
        <a href="http://localhost/Usuarios/consultores">
          <i class="fa fa-users"></i>
          <span>Contactos</span>
        </a>
      </li>

      <li>
        <a href="http://localhost/Usuarios/administradores">
          <i class="fa fa-users"></i>
          <span>Accesos</span>
        </a>
      </li>';

    }

    if($_SESSION["rol"] == "editor" || $_SESSION["rol"]== "administrador"){
      echo '<li>
        <a href="http://localhost/Usuarios/archivo">
          <i class="fa fa-folder"></i>

          <span>Archivos</span>
        </a>

      </li>

       <li class="treeview">
        <a href="">
          <i class="fa fa-files-o"></i>
          <span>Historiales</span>
          <span class="pull-right-container">
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="http://localhost/Usuarios/historial"><i class="fa fa-circle-o"></i>Registros de contactos</a></li>
          <li><a href="http://localhost/Usuarios/historias" ><i class="fa fa-circle-o"></i>Historial de institucionxcontacto</a></li>
      </ul>

     </li>';
   }

    if($_SESSION["rol"] == "lector" || $_SESSION["rol"]== "administrador"){

   echo'<li>
        <a href="http://localhost/Usuarios/ListadoContactos">
          <i class="fa fa-file"></i>

          <span>Lista de contactos</span>
        </a>

      </li>
      
      <li>
        <a href="http://localhost/Usuarios/ListadoA">
          <i class="fa fa-file"></i>
          <span>Lista de archivos</span>
        </a>
      </li>';
    }
   ?>



     </ul>

  </section>
  <!-- /.sidebar -->
</aside>


