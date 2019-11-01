<?php
session_start();
if (!empty($_SESSION['usuario'])) {
    ?>
    <?php include_once '_header.php'; ?>
    <?php include_once '../Modelo/Departamento.php'; ?>
    <?php include_once '../Modelo/Marca.php'; ?>
    <?php include_once '../Modelo/Persona.php'; ?>
    <?php include_once '../Modelo/Categoria.php'; ?>
    <?php include_once '../Modelo/Ciudad.php'; ?>
    <?php require_once('../Controlador/inmueble_controller.php'); ?>


    <?php
    if (!empty($_GET['respuesta'])) {
        $respuesta = $_GET['respuesta'];
        $o = $_GET['o'];
        if ($respuesta == "correcto") {
            ?>

            <!-- /.content-header -->
            <div class="alert alert-success">
                <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
                <strong>¡Bien Hecho!</strong> El Inmueble se ha <?php echo $o; ?>o exitosamente.
            </div>
            <div class="alert alert-danger">
                <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
                <strong>¡Error!</strong> El inmueble no ha sido <?php echo $o; ?>o.
            </div> <!-- /.alert -->
            <?php
        }
    }
    ?>

    <div class="content-header">
        <h2 class="content-header-title">MODIFICAR INMUEBLE</h2>     
        <ol class="breadcrumb">
            <li><a href="javascript:;"></a></li>

        </ol>
    </div> 
    <form id="validate-basic" action="../Controlador/inmueble_controller.php?action=editar" data-validate="parsley" enctype="multipart/form-data" class="form parsley-form" method="post">


        <?php
        $objInmueble = inmueble_controller::buscarID($_GET['id']);
        ?>

        <div class="portlet">



            <div class="portlet-content">


                <input type="hidden" value="<?php echo $_GET['id']; ?>" name="id" id="id"> 

                <div class="row">
                    <div class="col-sm-3 col-sm-offset-9">
                        <label for="name">Código</label>
                        <input type="text" id="color" name="Codigo" readonly class="form-control" data-required="true" value="<?php echo $objInmueble->getCodigo(); ?>">       

                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-4">
                        <label for="name">Titular</label>
                        <select class="form-control" name="Persona" title="Seleccionar">

                            <?php
                            foreach (Persona::selectAll() as $usu) {

                                if ($objInmueble->getPersona_idPersona() == $usu['idPersona']) {
                                    echo "<option value='" . $usu['idPersona'] . "' selected>" . $usu['Nombres'] . "      " . $usu['Apellidos'] . "</option>\n";
                                } else {
                                    echo "<option value='" . $usu['idPersona'] . "'>" . $usu['Nombres'] . "      " . $usu['Apellidos'] . "</option>\n";
                                }
                            }
                            ?>

                        </select>    
                    </div>

                    <div class="col-sm-4">
                        <label for="name">Categoría</label>
                        <select class="form-control" name="Categoria" title="Seleccionar" >
                            <?php
                            foreach (Categoria::selectAllImu() as $usu) {

                                if ($objInmueble->getCategoria_idCategoria() == $usu['idCategoria']) {
                                    echo "<option value='" . $usu['idCategoria'] . "' selected>" . $usu['Nombre'] . "</option>\n";
                                } else {
                                    echo "<option value='" . $usu['idCategoria'] . "'>" . $usu['Nombre'] . "</option>\n";
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-sm-4">
                        <label for="name">Precio</label>
                        <div class="input-group">
                            <span class="input-group-addon">$</span>
                            <input type="text" id="placa" name="Precio"  class="form-control" required="Precio" onkeypress="return numeros(event)" value="<?php echo $objInmueble->getPrecio(); ?>">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <label for="name">Departamento</label>
                        <!--declaramos un id para el select  y un evento onchangue--->
                        <select class="form-control" name="Departamento" id="select_departamento" title="Seleccionar" onchange="javascript: loadCiudades(<?php echo $objInmueble->getCiudad_idCiudad() ?>)">
                            <option>Seleccionar</option>        
                            <?php
                            foreach (Departamento::selectAll() as $us) {
                                if ($objInmueble->getDepartamento() == $us['idDepartamento']) {
                                    echo "<option value='" . $us['idDepartamento'] . "' selected>" . $us['Departamento'] . "   </option>\n";
                                } else {
                                    echo "<option value='" . $us['idDepartamento'] . "'>" . $us['Departamento'] . "   </option>\n";
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-sm-4">
                        <label for="name">Ciudad</label>
                        <select class="form-control" name="Ciudad" id="select_ciudad" title="Seleccionar">
                            <?php
                            foreach (Ciudad::BuscarDep($objInmueble->getDepartamento()) as $c) {
                                if (($objInmueble->getCiudad_idCiudad()) == ($c['idCiudad'])) {
                                    echo "<option value='" . $c['idCiudad'] . "' selected>" . $c['Ciudad'] . "   </option>\n";
                                } else {
                                    echo "<option value='" . $c['idCiudad'] . "'>" . $c['Ciudad'] . "   </option>\n";
                                }
                            }
                            ?>
                        </select>
                    </div>


                    <div class="col-sm-4">
                        <label for="name">Estratificación</label>
                        <input type="text" id="placa" name="Estratificacion" value="<?php echo $objInmueble->getEstratificacion(); ?>" class="form-control" required="Estratificacion" onkeypress="return numeros(event)" >

                    </div>

                    <div class="col-sm-4">
                        <label for="name">Ubicación</label>
                        <select class="form-control" name="Ubicacion" title="Seleccionar" required="Ubicacion">

                            <?php
                            if ($objInmueble->getUbicacion() == "Rural") {
                                echo "<option class='form-control' value='Rural' selected>Rural</option>";
                                echo "<option class='form-control' value='Urbana'>Urbana</option>";
                            } else {
                                echo "<option class='form-control' value='Rural' >Rural</option>\n";
                                echo "<option class='form-control' value='Urbana' selected>Urbana</option>\n";
                            }
                            ?>
                        </select>   
                    </div>
                    <div class="col-sm-4">
                        <label for="name">Área en MTRS</label>
                        <input type="text" id="placa" name="Area" value="<?php echo $objInmueble->getArea(); ?>" class="form-control" required="Area" >

                    </div>




                    <div class="col-sm-4">
                        <label for="name">Dirección</label>
                        <input type="text" id="color" name="Direccion"  value="<?php echo $objInmueble->getDireccion(); ?>" class="form-control" required="Direccion" >

                    </div>
                    <div class="col-sm-6 col-sm-offset-3">
                        <label for="name">Descripción</label>
                        <textarea class="form-control" id="count-textarea2"  rows="4" name="Descripcion" ><?php echo $objInmueble->getDescripcion(); ?></textarea>

                    </div> 
                </div>
                <div class="row" >


                    <?php
                    $i = 0;
                    if ($objInmueble->getFotos() != "") {
                        foreach (explode("=>", $objInmueble->getFotos()) as $a) {
                            $i++;
                            echo
                            "    <div class='col-sm-6'>
                                <div class='row col-sm-offset-1' >
                            <div class='col-sm-6'>

                                <div class='fileupload fileupload-exists' data-provides='fileupload'>
                                    <div class='fileupload-preview thumbnail' style='width: 260px; height: 150px;'>
                                        <img src='ImagenesInmuebles/$a' >
                                    </div>
                                    <div>
                                        <span class='btn btn-default btn-file'><span class='fileupload-new'>Seleccionar imagen</span><span class='fileupload-exists'>Cambiar</span><input type='file'  name='Foto_$i' value='$a' /></span>
                                        <a href='#' class='btn btn-default fileupload-exists' data-dismiss='fileupload'>Remover</a>
                                        <input type='hidden'  name='Foto_$i$i' value='$a' />
                                        <br>
                                        <br>
                                    </div>
                                </div>
                                </div>
                            </div> <!-- /.col -->
                        </div>  <!-- /.row -->"
                            ;
                        }
                    }
                    while ($i < 6) {
                        $i++;
                        echo

                        "
                                <div class='col-sm-6'>
                                <div class='row col-sm-offset-1' >
                            <div class='col-sm-6'>

                                <div class='fileupload fileupload-new' data-provides='fileupload'>
                                    <div class='fileupload-preview thumbnail' style='width: 260px; height: 150px;'>
                                        
                                    </div>
                                    <div>
                                        <span class='btn btn-default btn-file'><span class='fileupload-new'>Seleccionar imagen</span><span class='fileupload-exists'>Cambiar</span><input type='file'  name='Foto_$i' /></span>
                                        <a href='#' class='btn btn-default fileupload-exists' data-dismiss='fileupload'>Remover</a>
                                        <br>
                                        <br>
                                   </div>
                                </div>
                                </div>
                            </div> <!-- /.col -->
                        </div> <!-- /.row -->"
                        ;
                    }
                    ?>


                    <br>
                    <div class="form-group col-sm-offset-10">
                        <button type="submit"  name="btnGuardar" class="btn btn-success btn-lg btn-lg">GUARDAR</button>
                    </div> 

                    <?php
                    if (isset($_POST["btnGuardar"])) {
                        $archivo = $_FILES['Fotos']['tmp_name'];
                        $destino = "../Vista/ImagenesInmuebles/" . $_FILES['flsImagen ']['tmp_name'];
                        move_uploaded_file($archivo, $destino);
                    }
                    ?>
                </div> <!-- /.portlet-content -->

            </div> <!-- /.portlet -->

            <script type="text/javascript">
                function loadCiudades() {
                    var departamento = $("#select_departamento").val();

                    $.ajax({
                        url: "../Controlador/controlador_Ciudades.php?action=getCiudades&dep=" + departamento,
                        dataType: "JSON"
                    }).done(function(data) {
                        var ciudades = "";
                        $.each(data, function(key, value) {
                            ciudades += "<option value='" + key + "'>" + value + "</option>"
                        });
                        $("#select_ciudad").html(ciudades);
                    });
                }
            </script>
            <!-------------------------------------VALIDAR CAMPOS NUMEROS - LETRAS ------------------------------------------------------------->
            <script type="text/javascript">
                function numeros(e) {
                    key = e.keyCode || e.which;
                    tecla = String.fromCharCode(key).toLowerCase();
                    letras = " 1234567890";
                    especiales = [8, 37, 39, 46];

                    tecla_especial = false
                    for (var i in especiales) {
                        if (key == especiales[i]) {
                            tecla_especial = true;
                            break;
                        }
                    }

                    if (letras.indexOf(tecla) == -1 && !tecla_especial)
                        return false;
                }
                function Letras(e) {
                    key = e.keyCode || e.which;
                    tecla = String.fromCharCode(key).toLowerCase();
                    letras = " zxcvbnmasdfghjklñqwertyuiop";
                    especiales = [8, 37, 39, 46];

                    tecla_especial = false
                    for (var i in especiales) {
                        if (key == especiales[i]) {
                            tecla_especial = true;
                            break;
                        }
                    }

                    if (letras.indexOf(tecla) == -1 && !tecla_especial)
                        return false;
                }
            </script>


            <?php include_once '../Vista/_footer.php'; ?>
            <?php
        } else {
            header("Location: ../Vista/login.php");
        }
        ?>