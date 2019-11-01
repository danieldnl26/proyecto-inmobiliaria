<?php require_once('../Controlador/Persona_controler.php'); ?>
<?php require_once('_headerLogin.php'); ?>


<hr class="account-header-divider">

<div class="account-wrapper">

    <div class="account-logo">
        <img src="./img/login.png" alt="Target Admin" style="padding-top: 5px;">
    </div>
    <?php
    if (!empty($_GET['respuesta'])) {
        $respuesta = $_GET['respuesta'];
        if (!empty($_GET['o'])) {
            $o = $_GET['o'];
        }
        if ($respuesta == "correcto") {
            ?>
            <div class="alert alert-success">
                <a class="close" data-dismiss="alert" href="" aria-hidden="true">&times;</a>
                <strong>¡Bien Hecho!</strong> El administrador se ha <?php echo $o; ?>o exitosamente.
            </div>
            <?php
        } else {
            ?>    
            <div class="alert alert-danger">
                <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
                <strong>¡Error!</strong> Datos Incorrectos...
            </div> <!-- /.alert -->
            <?php
        }
    }
    ?>


    <div class="account-body">

        <h3 class="account-body-title">BIENVENIDO  </h3>

        <h5 class="account-body-subtitle">Por favor, inicie sesión para tener acceso.
            <!-- /.account-wrapper -->
            <script src="./js/libs/jquery-1.10.1.min.js"></script>
            <script src="./js/libs/jquery-ui-1.9.2.custom.min.js"></script>
            <script src="./js/libs/bootstrap.min.js"></script>
            <!--[if lt IE 9]>
      <script src="./js/libs/excanvas.compiled.js"></script>
      <![endif]-->
            <!-- App JS -->
            <script src="./js/target-admin.js"></script>
            <!-- Plugin JS -->
            <script src="./js/target-account.js"></script>
        </h5>

        <form class="form account-form" method="POST" action="../Controlador/Persona_controler.php?action=validacion">

            <div class="form-group">
                <label for="name">Usuario</label>
                <label for="login-username" class="placeholder-hidden">Usuario</label>
                <input type="text" class="form-control" id="login-username" placeholder="Usuario" tabindex="1" name="documento">

            </div> <!-- /.form-group -->

            <div class="form-group">
                <label for="name">Contraseña</label>
                <label for="login-password" class="placeholder-hidden">Contraseña</label>
                <input type="password" class="form-control" id="login-password" placeholder="Contraseña" tabindex="2" name="contrasena">
            </div> <!-- /.form-group -->
            <div class="form-group clearfix">
                <div class="pull-left">
                    <?php
                    /*
                      $objElemento = Persona_controler::buscarAll();
                      if (count($objElemento) > 0){
                      }  else {
                      ?><a href="Insertar_Persona.php">Registrarse</a>
                      <?php */
                    //}
                    ?>
                </div>
            </div> <!-- /.form-group -->
            <div class="form-group clearfix">


                <div class="pull-right">

                    <a href="validarPregunta.php">¿Ólvido su contraseña?</a>
                </div>
            </div> <!-- /.form-group -->

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-lg" tabindex="4">Iniciar Sesión &nbsp; <i class="fa fa-play-circle"></i>
                </button>
            </div> <!-- /.form-group -->

        </form>
        <div class="form-group">
            <a href="index.php"><i class="fa fa-angle-double-left"></i> &nbsp;Volver al inicio</a>
        </div>


    </div> <!-- /.account-body -->



</div>
</body>
</html>

