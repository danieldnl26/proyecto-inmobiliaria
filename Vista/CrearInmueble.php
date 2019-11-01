<?php
session_start();
if (!empty($_SESSION['usuario'])) {
    ?>
    <?php include_once '../Vista/_header.php'; ?>
    <?php include_once '../Modelo/Departamento.php'; ?>
    <?php include_once '../Modelo/Persona.php'; ?>
    <?php include_once '../Modelo/Categoria.php'; ?>
    <?php include_once '../Modelo/Ciudad.php'; ?>
    <?php include_once '../Modelo/Inmueble.php'; ?>
    <?php require_once('../Controlador/inmueble_controller.php'); ?>

    <?php
    if (!empty($_GET['respuesta'])) {
        $respuesta = $_GET['respuesta'];
        $o = $_GET['o'];
        if ($respuesta == "correcto") {
            ?>
            <div class="alert alert-success">
                <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
                <strong>¡Bien Hecho!</strong> El Inmueble se ha <?php echo $o; ?>o exitosamente.
            </div>
            <?php
        } else {
            ?>    
            <div class="alert alert-danger">
                <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
                <strong>¡Error!</strong> El Inmueble <?php echo $o; ?>o.
            </div> <!-- /.alert -->
            <?php
        }
    }
    ?>
    <div class="content-header">
        <h2 class="content-header-title">REGISTRAR INMUEBLE</h2>     
        <ol class="breadcrumb">
            <li><a href="javascript:;"></a></li>
        </ol>
    </div> 
    <form id="validate-enhanced" action="../Controlador/inmueble_controller.php?action=crear" enctype="multipart/form-data" class="form parsley-form" method="post">

        <div class="portlet">

            <div class="portlet-header">

                <h3>
                    <i class="fa fa-tasks"></i>
                    CREAR INMUEBLE
                </h3>

            </div> <!-- /.portlet-header -->

            <div class="portlet-content">
                <div class="row">
                    <div class="col-sm-3 col-sm-offset-9">
                        <label for="name">Código</label>
                        <input type="text" id="color" name="Codigo"  class="form-control" readonly class="form-control"  value="<?php echo $objInmueble = Inmueble::ultimo(); ?>">

                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-4">
                        <label for="name">Titular</label>

                        <input data-list-highlight="true"
                               data-list-value-completion="true"
                               class="form-control1 form-control" type="text"  />
                        <script type="text/javascript">
                            $(document).ready(function() {
                                $('input.form-control1').remoteList({
                                    source: function(val, response) {
                                        $.ajax({
                                            url: '../Controlador/Persona_controler.php?action=searchJSON',
                                            dataType: 'json',
                                            data: {
                                                q: val,
                                                key: '37693c',
                                                //nl: true
                                            },
                                            success: function(data) {
                                                $.each(data, function(i, item) {
                                                    item.value = item.label;
                                                    item.id = item.idPersona;

                                                });
                                                response(data);
                                            }
                                        });
                                    },
                                    select: function() {
                                        $("#per").val($(this).remoteList('selectedData').id);
                                    }
                                });
                            })
                        </script>
                        <input type="hidden" id="per" name="Persona" data-required="true" >
                    </div>

                    <div class="col-sm-4">
                        <label for="name">Categoría</label>
                        <select class="form-control" name="Categoria" title="Seleccionar" >

                            <?php
                            foreach (Categoria::selectAllImu() as $us) {
                                echo "<option value='" . $us['idCategoria'] . "'>" . $us['Nombre'] . "</option>\n";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-sm-4">
                        <label for="name">Precio</label>
                        <div class="input-group">
                            <span class="input-group-addon">$</span>
                            <input type="text" id="placa" name="Precio"  class="form-control" required="Precio" onkeypress="return numeros(event)">
                        </div>
                        
                    </div>

                    <div class="col-sm-4">
                        <label for="name">Departamento</label>
                        <!--declaramos un id para el select  y un evento onchangue--->
                        <select class="form-control" name="Departamento" id="select_departamento" title="Seleccionar" onchange="javascript: loadCiudades()">
                            <option>seleccionar</option>        
                            <?php
                            foreach (Departamento::selectAll() as $us) {
                                echo "<option value='" . $us['idDepartamento'] . "'>" . $us['Departamento'] . "   </option>\n";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-sm-4">
                        <label for="name">Ciudad</label>
                        <select class="form-control" name="Ciudad_idCiudad" id="select_ciudad" title="Seleccionar">
                        </select>
                    </div>


                    <div class="col-sm-4">
                        <label for="name">Estratificación</label>
                        <input type="text" id="placa" name="Estratificacion"  class="form-control" required="Estratificacion" onkeypress="return numeros(event)" >

                    </div>
                    <div class="col-sm-4">
                        <label for="name">Ubicación</label>
                        <select class="form-control" name="Ubicacion" title="Seleccionar" required="Ubicacion">
                            <option class="form-control" value="Rural">Rural</option>
                            <option class="form-control" value="Urbana ">Urbana</option>
                        </select>   
                    </div>
                    <div class="col-sm-4">
                        <label for="name">Área en MTRS</label>
                        <input type="text" id="placa" name="Area" class="form-control" required="Area" >

                    </div>

                    <div class="col-sm-4">
                        <label for="name">Dirección</label>
                        <input type="text" id="color" name="Direccion"  class="form-control" required="Direccion" >

                    </div>
                    <div class="col-sm-6 col-sm-offset-3">
                        <label for="name">Descripción</label>
                        <textarea class="form-control" id="count-textarea2"  rows="4" name="Descripcion" ></textarea>

                    </div> 
                </div>
                <div class="row" >
                    <div class="col-sm-3">
                        <div class="row col-sm-offset-1" >
                            <div class="col-sm-4">

                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-preview thumbnail" style="width: 260px; height: 150px;"></div>
                                    <div>
                                        <span class="btn btn-default btn-file"><span class="fileupload-new">SELECCIONAR IMAGEN</span><span class="fileupload-exists">CAMBIAR</span><input type="file"  name="Foto_1"/></span>
                                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">REMOVER</a>
                                    </div>
                                </div>

                            </div> <!-- /.col -->
                        </div> <!-- /.row -->
                    </div>
                    <div class="col-sm-3">
                        <div class="row col-sm-offset-5" >
                            <div class="col-sm-4">

                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-preview thumbnail" style="width: 260px; height: 150px;"></div>
                                    <div>
                                        <span class="btn btn-default btn-file"><span class="fileupload-new">SELECCIONAR IMAGEN</span><span class="fileupload-exists">CAMBIAR</span><input type="file"  name="Foto_2"/></span>
                                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">REMOVER</a>
                                    </div>
                                </div>

                            </div> <!-- /.col -->
                        </div> <!-- /.row -->

                    </div>
                    <div class="col-sm-3">
                        <div class="row col-sm-offset-9" >
                            <div class="col-sm-4">

                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-preview thumbnail" style="width: 260px; height: 150px;"></div>
                                    <div>
                                        <span class="btn btn-default btn-file"><span class="fileupload-new">SELECCIONAR IMAGEN</span><span class="fileupload-exists">CAMBIAR</span><input type="file"  name="Foto_3"/></span>
                                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">REMOVER</a>
                                    </div>
                                </div>

                            </div> <!-- /.col -->
                        </div> <!-- /.row -->
                    </div>
                </div> <!-- /.row -->
                <div class="row">
                    <div class="row-spacer"></div>


                    <div class="col-sm-3">
                        <div class="row col-sm-offset-1" >
                            <div class="col-sm-4">

                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-preview thumbnail" style="width: 260px; height: 150px;"></div>
                                    <div>
                                        <span class="btn btn-default btn-file"><span class="fileupload-new">SELECCIONAR IMAGEN</span><span class="fileupload-exists">CAMBIAR</span><input type="file"  name="Foto_4"/></span>
                                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">REMOVER</a>
                                    </div>
                                </div>

                            </div> <!-- /.col -->
                        </div> <!-- /.row -->
                    </div>
                    <div class="col-sm-3">
                        <div class="row col-sm-offset-5" >
                            <div class="col-sm-4">

                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-preview thumbnail" style="width: 260px; height: 150px;"></div>
                                    <div>
                                        <span class="btn btn-default btn-file"><span class="fileupload-new">SELECCIONAR IMAGEN</span><span class="fileupload-exists">CAMBIAR</span><input type="file"  name="Foto_5"/></span>
                                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">REMOVER</a>
                                    </div>
                                </div>

                            </div> <!-- /.col -->
                        </div> <!-- /.row -->
                    </div>

                    <div class="col-sm-3">
                        <div class="row col-sm-offset-9" >
                            <div class="col-sm-4">

                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-preview thumbnail" style="width: 260px; height: 150px;"></div>
                                    <div>
                                        <span class="btn btn-default btn-file"><span class="fileupload-new">SELECCIONAR IMAGEN</span><span class="fileupload-exists">CAMBIAR</span><input type="file"  name="Foto_6"/></span>
                                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">REMOVER</a>
                                    </div>
                                </div>

                            </div> <!-- /.col -->


                        </div> <!-- /.row -->
                    </div>

                </div> <!-- /.row -->
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