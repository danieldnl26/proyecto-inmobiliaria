<?php require_once ('_headerLogin.php'); ?>
<?php require_once('../Controlador/Persona_controler.php'); ?>
<?php require_once('../Modelo/Persona.php'); ?>
<hr class="account-header-divider">
<?php
if (!empty($_GET['respuesta'])) {
    $respuesta = $_GET['respuesta'];
    if ($respuesta == "correcto") {
        ?>
        <div class="alert alert-success">
            <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
            <strong>¡Bien Hecho!</strong> Los cambios se han guardado exitosamente.
        </div>
        <?php
    } else {
        ?>    
        <div class="alert alert-danger">
            <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
            <strong>¡Error!</strong> Los cambios no han sido guardados.
        </div> <!-- /.alert -->
        <?php
    }
}
?>

<div class="account-wrapper">


    <div class="account-logo">
        <img src="./img/admin.png" alt="Target Admin" style="padding-top: 5px;">
    </div>

    <div class="account-body">
        <!-------------------------------Formulario Para Restablecer Datos----------------------------------------->

        <h3 class="account-body-title">Restablecer Datos</h3>
        <?php
        if (!empty($_GET['Id'])) {
            $id = $_GET['Id'];
            ?>

            <h5 class="account-body-subtitle">Modifique los datos que desea cambiar.</h5>
            <p>&nbsp;</p>

            <form class="form account-form" method="POST" action="../Controlador/Persona_controler.php?action=editar">

                <?php
                $objAdministrador = Persona_controler::buscarID($id);
                if (count($objAdministrador) > 0) {
                    foreach ($objAdministrador as $key => $value) {
                        ?>
                        <!-- input -->
                        <input type="hidden" id="Id" name="Id" value="<?php echo $_GET['Id']; ?>">
                        <!-------------------------------Documento----------------------------------------->
                        <div class="form-group">
                            <label for="name">Documento</label>

                            <input required="documento" name="documento" type="text" class="form-control" id="signup-email" placeholder="Usuario" tabindex="1" value="<?php echo $objAdministrador->getDocumento(); ?>" data-required="true">
                        </div> <!-- /.form-group -->

                        <!-------------------------------Contraseña----------------------------------------->
                        <div class="form-group">
                            <label for="name">Contraseña</label>
                            <input required="contrasena" name="contrasena" type="password" class="form-control" id="signup-email" placeholder="Contraseña" tabindex="1"  data-required="true">
                        </div>



                        <!-------------------------------Pregunta----------------------------------------->

                        <div class="form-group">  
                            <label for="validateSelect">Pregunta</label>
                            <select required="pregunta" name="pregunta" class="form-control select2-input" data-required="true">

                                <?php
                                $pregunta = $objAdministrador->getPregunta();
                                if ($pregunta == "¿Cual es tu equipo de futbol favorito?") {
                                    echo "<option value='¿Cual es tu equipo de futbol favorito?' selected>¿Cual es tu equipo de futbol favorito?</option>";
                                    echo "<option value='¿Cual es el nombre de tu mascota?'>¿Cual es el nombre de tu mascota?</option>";
                                    echo "<option value='¿Cual es tu color favorito?'>¿Cual es tu color favorito?</option>";
                                    echo "<option value='¿Cual es el nombre de tu primer Colegio?'>¿Cual es el nombre de tu primer Colegio?</option>";
                                } elseif ($pregunta == "¿Cual es el nombre de tu mascota?") {
                                    echo "<option value='¿Cual es tu equipo de futbol favorito?' >¿Cual es tu equipo de futbol favorito?</option>";
                                    echo "<option value='¿Cual es el nombre de tu mascota?' selected>¿Cual es el nombre de tu mascota?</option>";
                                    echo "<option value='¿Cual es tu color favorito?'>¿Cual es tu color favorito?</option>";
                                    echo "<option value='¿Cual es el nombre de tu primer Colegio?'>¿Cual es el nombre de tu primer Colegio?</option>";
                                } elseif ($pregunta == "¿Cual es tu color favorito?") {
                                    echo "<option value='¿Cual es tu equipo de futbol favorito?' >¿Cual es tu equipo de futbol favorito?</option>";
                                    echo "<option value='¿Cual es el nombre de tu mascota?' >¿Cual es el nombre de tu mascota?</option>";
                                    echo "<option value='¿Cual es tu color favorito?' selected>¿Cual es tu color favorito?</option>";
                                    echo "<option value='¿Cual es el nombre de tu primer Colegio?'>¿Cual es el nombre de tu primer Colegio?</option>";
                                } else {
                                    echo "<option value='¿Cual es tu equipo de futbol favorito?' >¿Cual es tu equipo de futbol favorito?</option>";
                                    echo "<option value='¿Cual es el nombre de tu mascota?' >¿Cual es el nombre de tu mascota?</option>";
                                    echo "<option value='¿Cual es tu color favorito?'>¿Cual es tu color favorito?</option>";
                                    echo "<option value='¿Cual es el nombre de tu primer Colegio?' selected>¿Cual es el nombre de tu primer Colegio?</option>";
                                }
                                ?>


                            </select>
                        </div>


                        <!-- Respuesta-->
                        <div class="form-group">
                            <!--<label for="signup-email" class="placeholder-hidden">Respuesta</label>-->
                            <label for="name">Respuesta</label>
                            <input required="respuesta" name="respuesta" type="text" class="form-control" placeholder="Respuesta" tabindex="1"  value="<?php echo $objAdministrador->getRespuesta(); ?>" data-required="true">
                        </div>


                        <!-- /.form-group -->
                        <!-- input -->

                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary btn-block btn-lg" tabindex="2">
                                Restablecer &nbsp; <i class="fa fa-refresh"></i>
                            </button>
                        </div> <!-- /.form-group -->

                        <!-------------------------------Volver Inicio----------------------------------------->

                        <?php
                    }
                }
                ?>

            </form>
        <?php } ?>
        <div class="form-group">
            <a href="login.php"><i class="fa fa-angle-double-left"></i> &nbsp;Volver al inicio</a></div> <!-- /.form-group -->

    </div> <!-- /.account-body -->

</div>


<script src="./js/libs/jquery-1.10.1.min.js"></script>
<script src="./js/libs/jquery-ui-1.9.2.custom.min.js"></script>
<script src="./js/libs/bootstrap.min.js"></script>

<!--[if lt IE 9]>
<script src="./js/libs/excanvas.compiled.js"></script>
<![endif]-->
<!-- App JS -->
<script src="./js/target-admin.js"></script>
</body>
</html>



<!--        <div class="form-group">
        <label for="validateSelect"> genero</label>
            <select name="genero" class="form-control select2-input" data-required="true">
                <option value="<?//php echo $genero =$objAdministrador->getGenero(); ?>"> <?php //echo $objAdministrador->getGenero();   ?></option>
                <?//php 
                    if ($genero=="masculino") {
                        echo "<option value='femenino'>femenino</option>";
                    }  else {
                        echo "<option value='masculino'>masculino</option>";
                    }
            ?>           
            </select>
        </div>-->