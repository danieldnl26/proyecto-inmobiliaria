
<?php require_once('_headerLogin.php'); ?>

<hr class="account-header-divider">

<div class="account-wrapper">



  <div class="account-logo">
      <img src="./img/admin.png" alt="Target Admin" style="padding-top: 5px;">
  </div>


    <div class="account-body">

      <h3 class="account-body-title">Olvidaste Contraseña</h3>

      <form class="form account-form" method="POST" action="../Controlador/Persona_controler.php?action=validacionPregunta">
 <div class="form-group">  
                  <label for="validateSelect">Seleccionar Pregunta</label>
                  <select name="pregunta" class="form-control select2-input" data-required="true">
                    <option value="">Seleccionar</option>
                    <option value="¿Cual es tu equipo de futbol favorito?">¿Cual es tu equipo de futbol favorito?</option>
                    <option value="¿Cual es el nombre de tu mascota?">¿Cual es el nombre de tu mascota?</option>
                    <option value="¿Cual es tu color favorito?">¿Cual es tu color favorito?</option>
                    <option value="¿Cual es el nombre de tu primer Colegio?">¿Cual es el nombre de tu primer Colegio?</option>
                    
                  </select>
                </div>
        <div class="form-group">
          <label for="name">Respuesta</label>
            <input type="password" class="form-control" placeholder="Respuesta" tabindex="1" name="respuesta">
        </div> <!-- /.form-group -->

        <div class="form-group">
          <button type="submit" class="btn btn-secondary btn-block btn-lg" tabindex="6">Validar&nbsp; <i class="fa fa-play-circle"></i>
          </button>
         </div>
        <div class="form-group">
          <a href="login.php"><i class="fa fa-angle-double-left"></i> &nbsp;Volver al inicio</a></div>
      </form>

    </div> <!-- /.account-body -->

     <!-- /.account-footer -->

  </div> <!-- /.account-wrapper -->

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

</body>
</html>


