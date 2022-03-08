

<!DOCTYPE html>
<html>
<head>
  <title>sddsad</title>
  <link rel="stylesheet" type="Vistas/style/css">
</head>
<body style="background: url('Vistas/img/forest2.3.png') no-repeat; background-size: cover; ">

  <div class="login-box" >
   
    <div class="login-logo" >

    </div>


    <!-- /.login-logo -->
    <div class="login-box-body" style="transform: translate(0%,40%); border-radius: 20px ;" >

  <!--    <center><font face="impact" size="4"> Iniciar Sesión </font></center>-->
 <center><img src="Vistas/img/forest 2.5.png"></center>

      <form method="post" >
        <div class="form-group has-feedback">
          <input type="text" name="usuario" class="form-control" placeholder="Usuario" style="border-radius: 20px" >
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="clave" class="form-control" placeholder="contraseña"  style="border-radius: 20px">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">

          <!-- /.col -->
          <div class="col-xs-12">
            <font face="impact"><button type="submit" class="btn-block btn btn-secondary" style="border-radius: 20px">INGRESAR</button></font>
          </div>
          <!-- /.col -->
        </div>
        <?php 
        
        $ingreso =new SecretariasC();
        $ingreso -> IngresarSecretariaC();

        ?>
      </form>
    </div>
    <!-- /.login-box-body -->

  </div>


</body>
</html>