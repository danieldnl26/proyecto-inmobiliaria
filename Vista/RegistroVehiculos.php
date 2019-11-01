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
    <?php include_once '../Modelo/Vehiculo.php'; ?>


    <div class="content-header">
        <h2 class="content-header-title">REGISTRO VEHÍCULOS</h2>     
        <ol class="breadcrumb">
            <li><a href="javascript:;"></a></li>
        </ol>
    </div> 
    <form id="validate-enhanced" action="../Controlador/controlador_Vehiculo.php?action=crear" enctype="multipart/form-data" class="form parsley-form" method="post">
        <div class="row">

            <div class="col-sm-12">

                <div class="portlet">

                    <div class="portlet-header">

                        <h3>
                            <i class="fa fa-tasks"></i>
                            INFORMACIÓN
                        </h3>

                    </div> <!-- /.portlet-header -->

                    <div class="portlet-content">
                        
                            <div class="col-sm-12">
                            <div class="form-group col-sm-offset-9">
                                <label for="name">Código</label>
                                <input type="text" id="color" name="Codigo" readonly class="form-control" value="<?php echo $objVehiculo = vehiculo::ultimo(); ?>">
                                
                            </div>
                            </div>
                        <br>
                        <br>


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

                                <input data-list-highlight="true" data-list-value-completion="true"  class="form-control1 form-control" type="text"  />
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
                            </div>
                            <!-------------------------------------------Autocompletar---------->
                            <div class="col-sm-4">
                            <div class="form-group">
                                <label for="name">Categoría</label>
                                <select class="form-control"  required="Categoria" name="Categoria" title="Seleccionar" >

                                    <?php
                                    foreach (Categoria::selectAll() as $us) {
                                        echo "<option value='" . $us['idCategoria'] . "'>" . $us['Nombre'] . "</option>\n";
                                    }
                                    ?>
                                </select>
                            </div>
                            </div>
                                
                            
                            <div class="col-sm-4">
                            <div class="form-group">
                                <label for="name">Precio</label>
                                <div class="input-group">
                                    <span class="input-group-addon">$</span>
                                    <input type="text" id="placa" name="Precio"  class="form-control" required="Precio" onkeypress="return numeros(event)">
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
                                        echo "<option value='" . $us['idDepartamento'] . "'>" . $us['Departamento'] . "   </option>\n";
                                    }
                                    ?>
                                </select>
                            </div>
                                </div>
                            
                            <div class="col-sm-4">
                            <div class="form-group">
                                <label for="name">Ciudad</label>
                                <select class="form-control" name="Ciudad" id="select_ciudad" title="Seleccionar">

                                </select>
                            </div>
                            </div>
                            

                            <div class="col-sm-4">
                            <div class="form-group">
                                <label for="name">Placa</label>
                                <input type="text" id="placa" name="Placa"  class="form-control" required="Placa" >
                            </div>
                            </div>
                                
                            <div class="col-sm-4">
                            <div class="form-group">
                                <label for="name">Modelo</label>
                                <input type="text" id="color" name="Modelo"   class="form-control" required="Modelo" >
                            </div>
                            </div>
                            

                            <div class="col-sm-4">
                            <div class="form-group">
                                <label for="name">Línea</label>
                                <input type="text" id="placa" name="Linea"  class="form-control" required="Linea" >
                            </div>
                            </div>

                            <div class="col-sm-4">
                            <div class="form-group">
                                <label for="name">Cilindraje</label>
                                <input type="text" id="modelo" name="Cilindraje"  class="form-control" required="Cilindraje" >
                            </div>
                            </div>

                                <div class="col-sm-4">
                            <div class="form-group">
                                <label for="name">Kilometraje</label>
                                <input type="text" id="color" name="Kilometraje"   class="form-control" required="Kilomatraje" >
                            </div>
                                </div>

                            <div class="col-sm-4">
                            <div class="form-group">
                                <label for="name">Servicio</label>
                                <select class="form-control" name="Servicio" title="Seleccionar" required="Servicio">
                                    <option value='Particular' >Particular</option>
                                    <option value='Publico' >Público</option>
                                    
                                </select>
                            </div>
                            </div>
                                
                            <div class="col-sm-4">
                            <div class="form-group">
                                <label for="name">Tracción</label>
                                <select class="form-control" name="Traccion" title="Seleccionar" required="Traccion">
                                    <option value="4x2">4x2</option>
                                    <option value="4x4">4x4</option>
                                </select>
                            </div>
                            </div>

                            <div class="col-sm-4">
                            <div class="form-group">
                                <label for="name">Tipo de Combustible</label>
                                <select class="form-control" name="TipoCombustible" title="Seleccionar" required="TipoCombustibles">
                                    <option value="Gasolina">Gasolina</option>
                                    <option value="Diesel">Diesel</option>
                                    <option value="Gas Natural">Gas Natural</option>
                                </select>

                            </div>
                            </div>
                             <div class="col-sm-4">
                            <div class="form-group">
                                <label for="name">Resistencia</label>
                                <input type="text" id="color" name="Resistencia"   class="form-control" required="Resistencia" >
                            </div>
                             </div>

                            <!--                        <div class="form-group">
                                                        <label for="name">Estado</label>
                                                        <input type="text" id="modelo" name="Estado"  class="form-control" data-required="true" >
                            
                                                    </div>-->
                            
                            <div class="col-sm-4">
                            <div class="form-group">
                            <label for="Color">Color</label>
                            <input type="text" id="placa" name="Color"  class="form-control" required="Color" onkeypress="return Letras()(event)" >
                        </div>
                            </div>

                            <div class="col-sm-4">
                        <div class="form-group">
                            <label for="name">Seguro</label>
                            <input type="text" id="color" name="Seguro"   class="form-control" required="Seguro" >
                        </div>
                            </div>
                            
                            <div class="col-sm-4">
                            <div class="form-group">
                                <label for="name">Marca</label>
                                <select class="form-control" name="Marca" title="Seleccionar">

                                    <?php
                                    foreach (Marca::selectAll() as $us) {
                                        echo "<option value='" . $us['idMarca'] . "'>" . $us['Marca'] . " </option>\n";
                                    }
                                    ?>
                                </select>
                            </div> 
                            </div>
                            <div class="col-sm-4">
                             <div class="form-group ">
                               
                            <br>
                            <!--------------Boton Nuneva Marca Ajax------------------------------------------------------------------------------->
                            <a data-toggle="modal" href="#styledModal" class="btn btn-primary ">Nueva Marca</a>
                            <!--------------------------------------------------------------------------------------------------------------------->  
                            </div>
                            </div>

                             <div class="col-sm-8 col-sm-offset-2">
                            <div class="form-group">
                                <label for="name">Descripción</label>
                                <textarea class="form-control" id="count-textarea2"  rows="4" name="Descripcion" ></textarea>
                            </div>
                             </div>
                            
                            </div>
                    
                     
                    <div class="row">
                        
                    <div class="col-sm-3">
                        <div class="row col-sm-offset-1" >
                            <div class="col-sm-4">

                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-preview thumbnail" style="width: 260px; height: 150px;"></div>
                                    <div>
                                        <span class="btn btn-default btn-file"><span class="fileupload-new">Seleccionar Imagen</span><span class="fileupload-exists">Change</span><input type="file"  name="Foto_1"/></span>
                                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a>
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
                                        <span class="btn btn-default btn-file"><span class="fileupload-new">Seleccionar Imagen</span><span class="fileupload-exists">Change</span><input type="file"  name="Foto_2"/></span>
                                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a>
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
                                        <span class="btn btn-default btn-file"><span class="fileupload-new">Seleccionar Imagen</span><span class="fileupload-exists">Change</span><input type="file"  name="Foto_3"/></span>
                                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a>
                                    </div>
                                </div>

                            </div> <!-- /.col -->
                        </div> <!-- /.row -->
                </div>
                    </div>
                        
             
                        <div class="row">
                    <div class="row-spacer"> </div>
                    
                        <div class="col-sm-3">
                        <div class="row col-sm-offset-1" >
                            <div class="col-sm-4">

                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-preview thumbnail" style="width: 260px; height: 150px;"></div>
                                    <div>
                                        <span class="btn btn-default btn-file"><span class="fileupload-new">Seleccionar Imagen</span><span class="fileupload-exists">Change</span><input type="file"  name="Foto_4"/></span>
                                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a>
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
                                        <span class="btn btn-default btn-file"><span class="fileupload-new">Seleccionar Imagen</span><span class="fileupload-exists">Change</span><input type="file"  name="Foto_5"/></span>
                                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a>
                                    </div>
                                </div>

                            </div> <!-- /.col -->
                        </div> <!-- /.row --><br/>
                </div>
                        
                        <div class="col-sm-3">
                        <div class="row col-sm-offset-9" >
                            <div class="col-sm-4">

                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-preview thumbnail" style="width: 260px; height: 150px;"></div>
                                    <div>
                                        <span class="btn btn-default btn-file"><span class="fileupload-new">Seleccionar Imagen</span><span class="fileupload-exists">Change</span><input type="file"  name="Foto_6"/></span>
                                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a>
                                    </div>
                                </div>

                            </div> <!-- /.col -->
                        </div> <!-- /.row -->
                </div>
                    </div>
                        <div class="form-group col-sm-offset-9">
                            <button type="submit"  name="btnGuardar" class="btn btn-success btn-lg btn-lg">GUARDAR</button>
                        </div>


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