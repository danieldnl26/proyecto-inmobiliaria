<?php
session_start();
if (!empty($_SESSION['usuario'])) {
    ?>
    <?php require_once('../Controlador/Persona_controler.php'); ?>
    <?php include_once '../Modelo/Departamento.php'; ?>
    <?php include_once '../Modelo/Ciudad.php'; ?>
    <?php include_once '../Modelo/Categoria.php'; ?>
    <?php require_once('./_header.php'); ?>
    <div class="content-header">
        <h2 class="content-header-title">PERSONA</h2>
    </div> <!-- /.content-header -->
    <?php
    if (!empty($_GET['respuesta'])) {
        $respuesta = $_GET['respuesta'];
        $o = $_GET['o'];
        if ($respuesta == "correcto") {
            ?>
            <div class="alert alert-success">
                <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
                <strong>¡Bien Hecho!</strong> La Persona se ha <?php echo $o; ?>o exitosamente.
            </div>
            <?php
        } elseif ($respuesta == "repetido") {
            ?>
            <div class="alert alert-danger">
                <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
                <strong>¡Error!</strong> La Persona ya existe, no ha sido <?php echo $o; ?>a.
            </div> 
            <?php
        } else {
            ?>    
            <div class="alert alert-danger">
                <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
                <strong>¡Error!</strong> La Persona no ha sido <?php echo $o; ?>a.
            </div> <!-- /.alert -->
            <?php
        }
    }
    ?>
    <?php
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        ?>           
        <!--------------------------------------------------------------MODIFICAR PERSONAS ------------------------------------------------------------->
        <div class="col-sm-12">
            <div class="portlet">
                <div class="portlet-header">
                    <h3>
                        <i class="fa fa-tasks"></i>
                        MODIFICAR PERSONA
                    </h3>
                </div> <!-- /.portlet-header -->
                <div class="portlet-content">
                    <form id="validate-basic" action="../Controlador/Persona_controler.php?action=editarP" data-validate="parsley" class="form parsley-form" method="post">
                        <div class="form-group">
                            <?php
                            $objPersona = Persona_controler::buscarID($id);
                            if (count($objPersona) > 0) {
                                foreach ($objPersona as $key => $value) {
                                    ?>
                                    <input type="hidden" id="Id" name="Id" value="<?php echo $_GET['id']; ?>">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="name">Documento</label>
                                                <input type="text" readonly name="documento" required="documento" tabindex="1" class="form-control" placeholder="Documento" maxlength="50" value="<?php echo $objPersona->getDocumento(); ?>" title="Documento" onkeypress="return numeros(event)"> 
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="name">Nombres</label>
                                                <input type="text" name="nombres" required="nombres" tabindex="1" class="form-control" placeholder="Nombres" maxlength="20"  value="<?php echo $objPersona->getNombres(); ?>" title="Nombres" onkeypress="return letras(event)"  onkeypress="return Letras()(event)"> 
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="name">Apellidos</label>
                                                <input type="text" name="apellidos" required="apellidos" tabindex="1" class="form-control" placeholder="Apellidos" maxlength="20"  value="<?php echo $objPersona->getApellidos(); ?>" title="Apellidos" onkeypress="return Letras(event)"> 
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="name">Teléfono</label>
                                                <input type="text" name="telefono" required="telefono" tabindex="1" class="form-control" placeholder="Teléfono" maxlength="10"  value="<?php echo $objPersona->getTelefono(); ?>" title="Teléfono" onkeypress="return numeros(event)">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">  
                                            <div class="form-group">
                                                <label for="name">Correo</label>
                                                <input type="email" name="correo" required="correo" tabindex="1" class="form-control" placeholder="Correo" maxlength="20"  value="<?php echo $objPersona->getCorreo(); ?>" > 
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="name">Dirección</label>
                                                <input type="text" name="direccion" required="direccion" tabindex="1" class="form-control" placeholder="Dirección" maxlength="20"  value="<?php echo $objPersona->getDireccion(); ?>" title="Dirección">
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
                                                        if ($objPersona->getDepartamento() == $us['idDepartamento']) {
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
                                                    foreach (Ciudad::BuscarDep($objPersona->getDepartamento()) as $c) {
                                                        if (($objPersona->getCiudad()) == ($c['idCiudad'])) {
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
                                                <label for="name">Barrio</label>
                                                <input type="text" name="barrio" required="barrio" tabindex="1" class="form-control" placeholder="Barrio" maxlength="10"  value="<?php echo $objPersona->getBarrio(); ?>" title="Barrio" onkeypress="return Letras(event)"> 
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="name">Fecha</label>
                                        <div id="dp-ex-2" class="input-group date" data-auto-close="true" data-date-autoclose="true">
                                            <input type="text" name="fecha" required="fecha" tabindex="1" class="form-control" placeholder="Fecha" maxlength="20" value="<?php echo $objPersona->getFecha(); ?>">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        </div>
                                        <span class="help-block">dd-mm-aaaa</span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group col-sm-offset-2 ">
                                        <br>
                                        <button type="submit" class=" btn btn-success" action="">GUARDAR</button>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- /.portlet-content -->
                </div> <!-- /.portlet -->
            </div> <!-- /.col -->
        </form>
        </div>
        <?php
    } else {
        ?>
        <!-------------------------------------------------------CREAR PERSONA ------------------------------------------------------------->
        <div class="col-sm-12">
            <div class="portlet">
                <div class="portlet-header">
                    <h3>
                        <i class="fa fa-tasks"></i>
                        CREAR PERSONA
                    </h3>
                </div> <!-- /.portlet-header -->
                <div class="portlet-content">   
                    <form class="form" action="../controlador/Persona_controler.php?action=crearP" method="POST" data-validate="parsley" class="form parsley-form">

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="name">Documento</label>
                                <input type="number" name="documento" required="documento" tabindex="1" class="form-control" placeholder="Documento" maxlength="50" onkeypress="return numeros(event)" > 
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="name">Nombres</label>
                                <input type="text" name="nombres" required="nombres" tabindex="1" class="form-control" placeholder="Nombres" maxlength="20" onkeypress="return Letras(event)" > 
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="name">Apellidos</label>
                                <input type="text" name="apellidos" required="apellidos" tabindex="1" class="form-control" placeholder="Apellidos" maxlength="20" onkeypress="return Letras(event)"> 
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="name">Teléfono</label>
                                <input type="text" name="telefono" required="telefono"  tabindex="1" class="form-control" placeholder="Teléfono" maxlength="10" onkeypress="return numeros()(event)" > 
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="name">Correo</label>
                                <input type="email" name="correo"  tabindex="1" class="form-control" placeholder="Correo" maxlength="40" > 
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="name">Dirección</label>
                                <input type="text" name="direccion" required="direccion" tabindex="1" class="form-control" placeholder="Dirección" maxlength="20" >
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
                                <label for="name">Barrio</label>
                                <input type="text" name="barrio" required="barrio" tabindex="1" class="form-control" placeholder="Barrio" maxlength="10"onkeypress="return Letras(event)" > 
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="name">Fecha</label>
                                <div id="dp-ex-2" class="input-group date" data-auto-close="true" data-date-autoclose="true">
                                    <input type="text" name="fecha" required="fecha" tabindex="1" class="form-control" placeholder="Fecha" maxlength="20" >
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <br>
                                <button type="submit" class="btn btn-success">CREAR</button>
                            </div>
                        </div>
                    </form>
                </div> <!-- /.portlet-content -->
            </div> <!-- /.portlet -->
        </div> <!-- /.col -->
        <!------------------------------------------------------------------------MOSTRAR - ------------------------------------------------------------->
        <?php
    }
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet">
                <div class="portlet-header">
                    <h3>
                        <i class="fa fa-table"></i>
                        DATOS EXISTENTES
                    </h3>
                </div> <!-- /.portlet-header -->
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
                                        <input type="checkbox" class="icheck-input">
                                    </th>
                                    <th data-filterable="true" data-sortable="true" data-direction="asc">Documento</th>
                                    <th data-filterable="true" data-sortable="true" data-direction="asc">Nombres</th>
                                    <th data-filterable="true" data-sortable="true" data-direction="asc">Apellidos</th>
                                    <th data-filterable="true" data-sortable="true" data-direction="asc">Teléfono </th>
                                    <th data-filterable="true" data-sortable="true" data-direction="asc">Correo </th>
                                    <th data-filterable="false" data-sortable="false" data-direction="false" class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="" style="width: 82px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $objPersona = Persona_controler::buscarAll();
                                if (count($objPersona) > 0) {
                                    foreach ($objPersona as $key => $value) {
                                        ?>
                                        <tr>
                                            <td class="checkbox-column">
                                                <input type="checkbox" class="icheck-input">
                                            </td>
                                            <td><?php echo $value->getDocumento(); ?></td> 
                                            <td><?php echo $value->getNombres(); ?> </td>
                                            <td><?php echo $value->getApellidos(); ?> </td>
                                            <td><?php echo $value->getTelefono(); ?> </td>
                                            <td><?php echo $value->getCorreo(); ?> </td>
                                            <td>
                                                <a href="Persona.php?id=<?php echo $value->getIdPersona(); ?>"><i  class="fa fa-edit ui-popover" data-toggle="tooltip" data-trigger="hover" data-placement="right"  title="Editar" ></i></a>   
                                                &nbsp;
                                                <a href="../Controlador/Persona_controler.php?action=eliminar&id=<?php echo $value->getIdPersona(); ?>" onclick="return confirmSubmit()"><i class="fa fa-trash-o ui-popover" data-toggle="tooltip" data-placement="right" data-trigger="hover" title="Eliminar" ></i></a>  
                                            </td>
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
    <!-------------------------------------PREGUNTA  ELIMINAR PERSONA BOTON ------------------------------------------------------------->
    <script LANGUAGE="JavaScript">
        function confirmSubmit()
        {
            var agree = confirm("Está seguro de eliminar este registro? Este proceso es irreversible.");
            if (agree)
                return true;
            else
                return false;
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
    <!-------------------------------------COMBOS DEPARTAMENTO CIUDAD ------------------------------------------------------------->
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

    <?php require_once('_footer.php'); ?>
    <?php
} else {
    header("Location: ../Vista/login.php");
}
?>   