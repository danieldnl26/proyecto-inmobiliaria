<?php
session_start();
if (!empty($_SESSION['usuario'])) {
    ?>
    <?php include_once './_header.php'; ?>
    <?php include_once '../Modelo/categoria.php'; ?>
 <?php include_once '../Modelo/Marca.php'; ?>
<?php include_once '../Modelo/Marca.php'; ?>
    <?php include_once '../Controlador/controlador_Vehiculo.php'; ?>

    <?php
    if (!empty($_GET['respuesta'])) {
        $respuesta = $_GET['respuesta'];
        $o = $_GET['o'];
        if ($respuesta == "correcto") {
            ?>
            <div class="alert alert-success">
                <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
                <strong>¡Bien Hecho!</strong> La <?php echo $o; ?> se ha realizado exitosamente.
            </div>
            <?php
        }  else {
            ?>    
            <div class="alert alert-danger">
                <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
                <strong>¡Error!</strong> La <?php echo $o; ?> no se ha realizado.
            </div> <!-- /.alert -->
            <?php
        }
    }
    ?>

    <div class="portlet">

        <div class="portlet-header">

            <h3><i class="fa fa-tasks"></i>INFORMACIÓN DEL VEHÍCULO</h3>

            <div class="row">


                <p>
                    <a data-toggle="modal" href="#basicModal" class="fa fa-truck btn btn-warning col-sm-offset-6" >  Agregar Vehiculo</a>
                    &nbsp;&nbsp;


                </p>
            </div> 
        </div> <!-- /.portlet-header -->






        <?php
        if (!empty($_GET['idVehiculo'])) {
            $id = $_GET['idVehiculo'];
            ?>





            <div class="portlet-content">

                <?php $objVehiculo = controlador_Vehiculo::buscarID($_GET['idVehiculo']); ?>



                <div class="row">
                <div class="col-sm-2">
                    <label for="name">CÓDIGO : </label>
                    <label type="text"  ><h4 class="text-primary"><?php echo $objVehiculo->getCodigo(); ?></h4></label>
                </div>

                <div class="col-sm-5">
                    <label for="name">TITULAR: </label>
                    <label type="text" ><h4 class="text-primary"> <?php
                            foreach (Persona::selectAll() as $usu) {

                                if ($objVehiculo->getPersona_idPersona() == $usu['idPersona']) {
                                    echo "" . $usu['Nombres'] . "      " . $usu['Apellidos'] . "";
                                }
                            }
                            ?></h4></label>
                </div>

            </div> <!-- /.row -->

            <div class="row-spacer"></div> <!-- /.row-spacer -->

            <div class="row">

                <div class="col-sm-2">
                    <label for="name">PLACA :</label>
                </div>
                <div class="col-sm-3">
                    <label type="text"><h4 class="text-primary"><?php echo $objVehiculo->getPlaca(); ?></h4></label>
                </div>

                <div class="col-sm-2">
                    <label for="name">MODELO : </label>

                </div>
                <div class="col-sm-3"><label type="text"  ><h4 class="text-primary"><?php echo $objVehiculo->getModelo(); ?></h4></label></div> 
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <label for="name">LÍNEA : </label>
                </div>
                <div class="col-sm-3"><label type="text" ><h4 class="text-primary"><?php echo $objVehiculo->getLinea(); ?></h4></label></div>  

                <div class="col-sm-2">
                    <label for="name">CILINDRAJE : </label>
                </div>
                <div class="col-sm-3"><label type="text" ><h4 class="text-primary"><?php echo $objVehiculo->getCilindraje(); ?></h4></label></div>

            </div>
            <div class="row">
                <div class="col-sm-2">
                    <label for="name">SEGURO : </label>
                </div>
                <div class="col-sm-3"><label type="text" ><h4 class="text-primary"><?php echo $objVehiculo->getSeguro(); ?></h4></label></div> 

                <div class="col-sm-2">
                    <label for="name">RESISTENCIA : </label>
                </div> 
                <div class="col-sm-3"><label type="text" ><h4 class="text-primary"><?php echo $objVehiculo->getResistencia(); ?></h4></label></div>

            </div>   

            <div class="row">
                <div class="col-sm-2">
                    <label>COLOR :</label>

                </div>
                <div class="col-sm-3"> <label type="text" ><h4 class="text-primary"><?php echo $objVehiculo->getColor(); ?></h4></label></div>

                <div class="col-sm-2">
                    <label for="name">KILOMETRAJE :</label>
                </div>

                <div class="col-sm-3">
                    <label type="text"><h4 class="text-primary"><?php echo $objVehiculo->getKilometraje(); ?></h4></label>
                </div>

            </div>  
            <div class="row">
                <div class="col-sm-2">
                    <label for="name">SERVICIO :</label>

                </div>
                <div class="col-sm-3"><label type="text" ><h4 class="text-primary"><?php echo $objVehiculo->getServicio(); ?></h4></label></div>  

                <div class="col-sm-2">
                    <label for="name">TRACCIÓN :</label>

                </div>
                <div class="col-sm-3"><label type="text" ><h4 class="text-primary"><?php echo $objVehiculo->getTraccion(); ?></h4></label></div>
            </div>  

            <div class="row">
               <div class="col-sm-2">
                    <label for="name">CATEGORÍA :</label>
                </div>
                <?php $objC = categoria::buscarForId($objVehiculo->getCategoria_idCategoria());
                        ?>
                <div class="col-sm-3">
                    <label type="text"><h4 class="text-primary"><?php  echo $objC->getNombre();?></h4></label>
                </div>
                <div class="col-sm-2">
                    <label for="name">ESTADO :</label>

                </div>
                <div class="col-sm-3"><label type="text"id="selectestado" onselect="Activo"><h4 class="text-primary"><?php echo $objVehiculo->getEstado(); ?></h4></label></div>
            </div>       

            <div class="row">
                <div class="col-sm-2">
                    <label for="name">CIUDAD :</label>
                </div>
                
                <div class="col-sm-3">
                    <label type="text"><h4 class="text-primary"></h4></label>
                </div>

                <div class="col-sm-2">
                    <label for="name">TIPO DE COMBUSTIBLE :</label>

                </div>
                <div class="col-sm-3"> <label type="text" ><h4 class="text-primary"><?php echo $objVehiculo->getTipoCombustible(); ?></h4></label></div>
            </div>

            <div class="row">
               <div class="col-sm-2">
                    <label for="name">MARCA :</label>
                </div>
                <?php $objMa = Marca::buscarForId($objVehiculo->getMarca_idMarca());
                        ?>
                <div class="col-sm-3">
                    <label type="text"><h4 class="text-primary"><?php  echo $objMa->getMarca();?></h4></label>
                </div>
                  <div class="col-sm-2">
                    <label for="name">PRECIO : </label>

                </div>
                <div class="col-sm-3"><label type="text" ><h4 class="text-primary"><?php echo $objVehiculo->getPrecio(); ?></h4></label></div>

            </div> <!-- /.row -->
            <div class="row">
                <div class="col-sm-2">
                    <label for="name">DESCRIPCIÓN :</label>

                </div>
                <div class="col-sm-12"><label type="text" ><h4 class="text-primary"><?php echo $objVehiculo->getDescripcion(); ?></h4></label></div>


            </div>
                <div class="dataTables_paginate pagination"></div>




            </div> <!-- /.portlet-content -->

        </div> <!-- /.portlet -->

        <div class="col-sm-12">

            <div class="portlet">


                <div class="portlet-header">

                    <h3>
                        <i class="fa fa-tasks"></i>
                        INFORMACIÓN DE LA TRANSACCIÓN
                    </h3>

                </div> <!-- /.portlet-header -->

                <div class="portlet-content">
                    <form id="validate-enhanced" action="../Controlador/controlador_Transaccion.php?action=crearv"  class="form parsley-form" method="post">


                        <div class="row">

                            <div class="col-sm-5">
                                <label for="name">VENDEDOR</label>
                                <label type="text" ><h4 class="text-primary"><?php
                                        foreach (Persona::selectAll() as $usu) {

                                            if ($objVehiculo->getPersona_idPersona() == $usu['idPersona']) {
                                                echo "" . $usu['Nombres'] . "      " . $usu['Apellidos'] . "";
                                            }
                                        }
                                        ?></h4></label>
                                <input type="hidden" name="idVendedor" value="<?php echo $objVehiculo->getPersona_idPersona(); ?>">
                                <input type="hidden" name="idVehiculo" value="<?php echo $objVehiculo->getIdVehiculo(); ?>">
                            </div>
                            <div class="col-sm-5">
                                <label for="name">COMPRADOR</label>
                                <div class="form-group">

                                    <input data-list-highlight="true"
                                           data-list-value-completion="true"
                                           class="form-control1 form-control" type="text" data-required="true" />
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
                                                    $("#per1").val($(this).remoteList('selectedData').id);
                                                }
                                            });
                                        })
                                    </script>
                                    <input type="hidden" id="per1" name="idComprador" data-required="true" >
                                </div>       
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-5">
                                <label for="name">FECHA</label>
                                <div id="dp-ex-2" class="input-group date" data-auto-close="true" data-date-autoclose="true">
                                    <input  type="text" name="fecha" data-required="true" tabindex="1" class="form-control" placeholder="Fecha" maxlength="20" >
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                                <span class="help-block">dd-mm-aaaa</span>
                            </div> 

                            <div class="col-sm-5">

                                <label for="name">TIPO DE TRANSACCIÓN</label>

                                <?php
                                if ($objVehiculo->getEstado() == "Activo") {

                                    echo '<input value="Venta" name="TipoTransaccion" class="form-control" readonly>';
                                } elseif ($objVehiculo->getEstado() == "Inactivo") {
                                    echo '<input value="Compra" name="TipoTransaccion" class="form-control" readonly>';
                                }
                                ?>

                            </div> 

                        </div>

                        <div class="row">
                            <div class="col-sm-5">
                                <label for="name">TESTIGO 1</label>
                                <div class="form-group">

                                    <input data-list-highlight="true"
                                           data-list-value-completion="true"
                                           class="form-control2 form-control" type="text" data-required="true" />
                                    <script type="text/javascript">
                                        $(document).ready(function() {
                                            $('input.form-control2').remoteList({
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
                                                    $("#per2").val($(this).remoteList('selectedData').id);
                                                }
                                            });
                                        })
                                    </script>
                                    <input type="hidden" id="per2" name="testigo1" data-required="true" >
                                </div>    



                            </div>   
                            <div class="col-sm-5">

                                <label for="name">TESTIGO 2</label>
                                <div class="form-group">

                                    <input data-list-highlight="true"
                                           data-list-value-completion="true"
                                           class="form-control3 form-control" type="text" data-required="true" />
                                    <script type="text/javascript">
                                        $(document).ready(function() {
                                            $('input.form-control3').remoteList({
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
                                                    $("#per3").val($(this).remoteList('selectedData').id);
                                                }
                                            });
                                        })
                                    </script>
                                    <input type="hidden" id="per3" name="testigo2" data-required="true" >
                                </div>   

                            </div>   

                        </div>

                        <div class="row">


                            <div class="col-sm-1">
                                <label for="name">VALOR </label>

                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input type="text" id="placa" name="valor"  class="form-control" data-required="true" >
                                    </div>
                                </div>
                            </div>

                        </div>


                        <br/>


                        <div class="form-group">
                            <button type="submit" class="btn btn-warning">GUARDAR</button>
                        </div>


                    </form>

                </div> <!-- /.portlet-content -->

            </div> <!-- /.portlet -->

        </div> <!-- /.col -->

        <?php
    } else {
        ?>

        <?php
    }
    ?>






    </div> <!-- /.content-container -->

    </div> <!-- /.content -->

    </div> <!-- /.container -->







    <div id="basicModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title">VEHICULOS</h3>
                </div>
                <div class="modal-body">


                    <div class="row">

                        <div class="col-md-12">

                            <div class="portlet">


                                <div class="portlet-content">           

                                    <div class="table-responsive">

                                        <table 
                                            class="table table-striped table-bordered table-hover table-highlight table-checkable" 
                                            data-provide="datatable" 
                                            data-display-rows="10"
                                            data-info="true"
                                            data-search="true"
                                            data-length-change="true"
                                            data-paginate="true"
                                            >
                                            <thead>
                                                <tr>
                                                    <th class="checkbox-column">
                                                        <input type="checkbox" class="icheck-input" value="">
                                                    </th>
                                                    <th><strong>Codigo</strong></th>
                                                    <th><strong>Placa</strong></th>
                                                    <th><strong>Modelo</strong></th>
                                                    <th><strong>Precio</strong></th>

                                                    <th><strong>Color</strong></th>
                                                    <th><strong>estado</strong></th>



                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $objVehiculo = controlador_Vehiculo::buscarAll();
                                                if (count($objVehiculo) > 0) {
                                                    foreach ($objVehiculo as $key => $value) {
                                                        ?>
                                                        <tr>

                                                            <th>
                                                                <a href="TransaccionVehiculo.php?idVehiculo=<?php echo $value->getIdVehiculo(); ?>" name="Editar" class="fa fa-eject btn btn-warning "><i></i></a>
                                                            </th>
                                                            <td><?php echo $value->getCodigo(); ?></td>
                                                            <td><?php echo $value->getPlaca(); ?></td>
                                                            <td><?php echo $value->getModelo(); ?></td>
                                                            <td><?php echo $value->getPrecio(); ?></td>          

                                                            <td><?php echo $value->getColor(); ?></td>
                                                            <td><?php echo $value->getEstado(); ?></td>




                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div> <!-- /.table-responsive -->


                                </div> <!-- /.portlet-content -->

                            </div> <!-- /.portlet -->



                        </div> <!-- /.col -->

                    </div> <!-- /.row -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <?php require_once('_footer.php'); ?>
    <?php
} else {
    header("Location: ../Vista/login.php");
}
?>  