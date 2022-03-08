  <header class="main-header">
    <!-- Logo -->
    <a href="http://localhost/Usuarios/inicio" class="logo">

      <!-- mini logo for sidebar mini 50x50 pixels -->
      <img src="http://localhost/Usuarios/Vistas/img/forest 2.5.png" width="140px"  >

    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- este es el icono para navegar-->
      <a href="" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>

      </a> 


      <div class="navbar-custom-menu">


        <ul class="nav navbar-nav">
           <a href="http://localhost/Usuarios/inicio" class="logo" >
      <!-- mini logo for sidebar mini 50x50 pixels -->
      

    </a>
    
          <li class="dropdown user user-menu">


            <!--nombre apellido y foto-->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              
              <?php
              if($_SESSION["foto"] == ""){
                echo '<img src="http://localhost/Usuarios/Vistas/img/defecto.png" class="user-image" alt="User-Image">';
              }else{
                echo '<img src="http://localhost/Usuarios/'.$_SESSION["foto"].'" class="user-image" alt="User-Image">';
              }
              ?>

              <span class="hidden-xs"><?php echo $_SESSION["nombre"]; echo "  " ; echo $_SESSION["apellido"]; ?></span>
            </a>


            <ul class="dropdown-menu">
             
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  
              <!--    <?php  
                 // echo '<a href="http://localhost/Usuarios/perfil-'.$_SESSION["rol"].'" class="btn-primary btn-flat">Perfil</a>';
                  ?> --->

           <!--       <a href="#" class="btn btn-primary btn-flat">Mi Perfil</a>-->
                </div>


                <div class="pull-right">
                  <a href="http://localhost/Usuarios/salir" class="btn btn-danger btn-flat">Salir</a>
                </div>


              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>




