<?php
session_start();
if (!empty($_SESSION['usuario'])) {
    ?>
    <?php include_once '../Vista/_header.php'; ?>
    <?php include_once '../Modelo/Departamento.php'; ?>
    <?php include_once '../Modelo/Marca.php'; ?>
    <?php include_once '../Modelo/Persona.php'; ?>
    <?php include_once '../Modelo/Categoria.php'; ?>
    <?php include_once '../Modelo/Ciudad.php'; ?>
    <?php require_once '../Controlador/controlador_Vehiculo.php'; ?>


    <div class="content-header">
        <h2 class="content-header-title">MODIFICAR VEHÍCULOS</h2>     
        <ol class="breadcrumb">
            <li><a href="javascript:;"></a></li>
        </ol>
    </div> 
    <form id="validate-enhanced" action="../Controlador/controlador_Vehiculo.php?action=editar" enctype="multipart/form-data" class="form parsley-form" method="post">
        <div class="row">

            <div class="col-sm-12">

                <div class="portlet">

                    <div class="portlet-header">
                        <?php $objVehiculo = controlador_Vehiculo::buscarID($_GET['idVehiculo']); ?>

                        <h3>
                            <i class="fa fa-tasks"></i>
                            INFORMACIÓN
                        </h3>

                    </div> <!-- /.portlet-header -->

                    <div class="portlet-content">

                        <input type="hidden" value=" <?php echo $_GET['idVehiculo']; ?>" name="Id" id="Id"> 
                        <div class="form-group">

                            <div class="col-sm-12">
                                <div class="form-group col-sm-offset-9">
                                    <label for="name">Codigo</label>
                                    <input type="text" id="color" name="Codigo"  disabled="disabled" class="form-control" data-required="true" value="<?php echo $objVehiculo->getCodigo(); ?>">
                                </div>
                            </div>

                            <!--                        <div class="form-group">
                                                        <label for="name">Titular</label>
                                                        <select class="form-control" name="Persona" title="Seleccionar">
                            
                            <?php
//                                foreach (Persona::selectAll() as $us) {
//                                    echo "<option value='" . $us['idPersona'] . "'>" . $us['Nombres'] . "      " . $us['Apellidos'] . "</option>\n";
//                                }
                            ?>
                                                        </select>
                            
                                                    </div>-->
                            <!-------------------------------------------Autocompletar---------->
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="name">Titular</label>

                                    <select class="form-control" name="Persona" title="Seleccionar">

                                        <?php
                                        foreach (Persona::selectAll() as $usu) {

                                            if ($objVehiculo->getPersona_idPersona() == $usu['idPersona']) {
                                                echo "<option value='" . $usu['idPersona'] . "' selected>" . $usu['Nombres'] . "      " . $usu['Apellidos'] . "</option>\n";
                                            } else {
                                                echo "<option value='" . $usu['idPersona'] . "'>" . $usu['Nombres'] . "      " . $usu['Apellidos'] . "</option>\n";
                                            }
                                        }
                                        ?>


                                    </select>
                                </div>      
                            </div>
                            <!-------------------------------------------Autocompletar---------->

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="name">Categoría</label>
                                    <select class="form-control" name="Categoria" title="Seleccionar" >

                                        <?php
                                        foreach (Categoria::selectAll() as $usu) {

                                            if ($objVehiculo->getCategoria_idCategoria() == $usu['idCategoria']) {
                                                echo "<option value='" . $usu['idCategoria'] . "' selected>" . $usu['Nombre'] . "</option>\n";
                                            } else {
                                                echo "<option value='" . $usu['idCategoria'] . "'>" . $usu['Nombre'] . "</option>\n";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>


                            <!--------------------------------------------------------------------------------------------------------------------->  

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="name">Precio</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input type="text" id="placa" name="Precio"  class="form-control" data-required="true" value="<?php echo $objVehiculo->getPrecio(); ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="name">Departamento</label>
                                    <!--declaramos un id para el select  y un evento onchangue--->
                                    <select class="form-control" name="Departamento" id="select_departamento" title="Seleccionar" onchange="javascript: loadCiudades()">
                                        <option>seleccionar</option>        
                                        <?php
                                        foreach (Departamento::selectAll() as $us) {
                                            if ($objVehiculo->getDepartamento() == $us['idDepartamento']) {
                                                echo "<option value='" . $us['idDepartamento'] . "' selected>" . $us['Departamento'] . "   </option>\n";
                                            } else {
                                                echo "<option value='" . $us['idDepartamento'] . "'>" . $us['Departamento'] . "   </option>\n";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="name">Ciudad</label>
                                    <select class="form-control" name="Ciudad" id="select_ciudad" title="Seleccionar">
                                        <?php
                                        foreach (Ciudad::BuscarDep($objVehiculo->getDepartamento()) as $c) {
                                            if (($objVehiculo->getCiudad_idCiudad()) == ($c['idCiudad'])) {
                                                echo "<option value='" . $c['idCiudad'] . "' selected>" . $c['Ciudad'] . "   </option>\n";
                                            } else {
                                                echo "<option value='" . $c['idCiudad'] . "'>" . $c['Ciudad'] . "   </option>\n";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>


                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="name">Placa</label>
                                    <input type="text" id="placa" name="Placa"  class="form-control" data-required="true" value="<?php echo $objVehiculo->getPlaca(); ?>">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="name">Modelo</label>
                                    <input type="text" id="color" name="Modelo"   class="form-control" data-required="true" value="<?php echo $objVehiculo->getModelo(); ?>">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="name">Línea</label>
                                    <input type="text" id="placa" name="Linea"  class="form-control" data-required="true" value="<?php echo $objVehiculo->getLinea(); ?>">
                                </div>
                            </div>


                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="name">Cilindraje</label>
                                    <input type="text" id="modelo" name="Cilindraje"  class="form-control" data-required="true" value="<?php echo $objVehiculo->getCilindraje(); ?>">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="name">Kilometraje</label>
                                    <input type="text" id="color" name="Kilometraje"   class="form-control" data-required="true" value="<?php echo $objVehiculo->getKilometraje(); ?>">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="name">Servicio</label>
                                    <select class="form-control" name="Servicio" title="Seleccionar" data-required="true">
                                        <?php
                                        if ($objVehiculo->getServicio() == "Particular") {
                                            echo "<option value='Particular' selected>Particular</option>\n";
                                            echo "<option value='Publico'>Público</option>\n";
                                        } else {
                                            echo "<option value='Particular' >Particular</option>\n";
                                            echo "<option value='Publico' selected>Público</option>\n";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="name">Tracción</label>
                                    <select class="form-control" name="Traccion" title="Seleccionar" data-required="true">
                                        <?php
                                        if ($objVehiculo->getTraccion() == "4x2") {
                                            echo "<option value='4x2' selected>4x2</option>\n";
                                            echo "<option value='4x4'>4x4</option>\n";
                                        } else {
                                            echo "<option value='4x2' >4x2</option>\n";
                                            echo "<option value='4x4' selected>4x4</option>\n";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="name">Tipo de Combustible</label>
                                    <select class="form-control" name="TipoCombustible" title="Seleccionar" data-required="true">
                                        <?php
                                        if ($objVehiculo->getTipoCombustible() == "Gasolina") {
                                            echo "<option value='Gasolina' selected>Gasolina</option>\n";
                                            echo "<option value='Diesel'>Diesel</option>\n";
                                            echo "<option value='Gas Natural'>Gas Natural</option>\n";
                                        } elseif ($objVehiculo->getTipoCombustible() == "Diesel") {
                                            echo "<option value='Gasolina'>Gasolina</option>\n";
                                            echo "<option value='Diesel' selected>Diesel</option>\n";
                                            echo "<option value='Gas Natural'>Gas Natural</option>\n";
                                        } else {
                                            echo "<option value='Gasolina' selected>Gasolina</option>\n";
                                            echo "<option value='Diesel'>Diesel</option>\n";
                                            echo "<option value='Gas Natural' selected>Gas Natural</option>\n";
                                        }
                                        ?>
                                    </select>

                                </div>
                            </div>

                            <!--                        <div class="form-group">
                                                        <label for="name">Estado</label>
                                                        <input type="text" id="modelo" name="Estado"  class="form-control" data-required="true" >
                            
                                                    </div>-->


                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="name">Resistencia</label>
                                    <input type="text" id="color" name="Resistencia"   class="form-control" data-required="true" value="<?php echo $objVehiculo->getResistencia(); ?>">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="Color">Color</label>
                                    <input type="text" id="placa" name="Color"  class="form-control" data-required="true" value="<?php echo $objVehiculo->getColor(); ?>">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="name">Seguro</label>
                                    <input type="text" id="color" name="Seguro"   class="form-control" data-required="true" value="<?php echo $objVehiculo->getSeguro(); ?>">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="name">Marca</label>
                                    <select class="form-control" name="Marca" title="Seleccionar">

                                        <?php
                                        foreach (Marca::selectAll() as $usu) {

                                            if ($objVehiculo->getMarca_idMarca() == $usu['idMarca']) {
                                                echo "<option value='" . $usu['idMarca'] . "' selected>" . $usu['Marca'] . "  </option>\n";
                                            } else {
                                                echo "<option value='" . $usu['idMarca'] . "'>" . $usu['Marca'] . "     </option>\n";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div> 
                            </div>
                            <!--------------Boton Nuneva Marca Ajax------------------------------------------------------------------------------->
                            <div class="col-sm-4">
                                <div class="form-group ">
                                    <br>
                                    <a data-toggle="modal" href="#styledModal" class="btn btn-primary">Nueva Marca</a>
                                </div>
                            </div>

                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="form-group">
                                    <label>Descripción</label>
                                    <textarea class="form-control" id="count-textarea2"  rows="4" name="Descripcion" ><?php echo $objVehiculo->getDescripcion(); ?></textarea>
                                </div>
                            </div>

                            <div class="portlet-content">
                                <div class="form-group row col-sm-offset-5">
                                    <label for="name">Fotos</label>
                                </div> <br/>

                                <?php
                                $i = 0;
                                if ($objVehiculo->getFotos() != "") {
                                    foreach (explode("=>", $objVehiculo->getFotos()) as $a) {
                                        $i++;
                                        echo
                                        "    <div class='col-sm-6'>
                                <div class='row col-sm-offset-1' >
                            <div class='col-sm-6'>

                                <div class='fileupload fileupload-exists' data-provides='fileupload'>
                                    <div class='fileupload-preview thumbnail' style='width: 260px; height: 150px;'>
                                        <img src='imagenesVehiculos/$a' >
                                    </div>
                                    <div>
                                        <span class='btn btn-default btn-file'><span class='fileupload-new'>Seleccionar imagen</span><span class='fileupload-exists'>Cambiar</span><input type='file'  name='Foto_$i' value='$a'/></span>
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
                                <div class="form-group col-sm-offset-9">
                                    <button type="submit"  name="btnGuardar" class="btn btn-success btn-lg btn-lg">GUARDAR</button>
                                </div>
                            </div>
                        </div> <!-- /.portlet-content -->
                    </div> <!-- /.portlet -->
                </div> <!-- /.col -->



                <?php
                if (isset($_POST["btnGuardar"])) {
                    $archivo = $_FILES['Fotos']['tmp_name'];
                    $destino = "../Vista/imagenesVehiculos/" . $_FILES['flsImagen ']['tmp_name'];
                    move_uploaded_file($archivo, $destino);
                }
                ?>

            </div> <!-- /.portlet-content --> 

        </div> <!-- /.portlet -->

    </div> <!-- /.col -->

    </div> <!-- /.row -->

    </form>

    <form class="form" action="../controlador/Marca_Controler.php?action=insertar" method="POST" data-validate="parsley" class="form parsley-form">

        <div id="styledModal" class="modal modal-styled fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title">Registre Nueva Marca</h3>
                    </div>
                    <div class="modal-body">


                        <div class="form-group">
                            <label for="name">Nombre  Marca</label>
                            <input type="text" id="marca" name="marca" >
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-tertiary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


    </div>

    </form>
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


    <?php include_once '../Vista/_footer.php'; ?>
    <?php
} else {
    header("Location: ../Vista/login.php");
}
?>  