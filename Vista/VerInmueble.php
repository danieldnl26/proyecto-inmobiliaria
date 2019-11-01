<?php
session_start();
if (!empty($_SESSION['usuario'])) {
    ?>
    <?php require_once('_header.php'); ?>
    <?php require_once('../Controlador/inmueble_controller.php'); ?>
    <?php require_once('../Controlador/controlador_Ciudades.php'); ?>
    <?php require_once('../Modelo/Inmueble.php') ?>
    <?php require_once('../Modelo/Ciudad.php') ?>
    <?php require_once('../Modelo/Departamento.php') ?>
    <?php require_once('../Modelo/Categoria.php') ?>

    <div class="content-header">
        <h2 class="content-header-title">INMUEBLES</h2>
    </div> <!-- /.content-header -->
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
    <div class="row">
        <div class="col-md-12">
            <div class="portlet">
                <div class="portlet-header">
                    <h3>
                        <i class="fa fa-table"></i>
                        DATOS EXISTENTES
                    </h3>
                </div> <!-- /.portlet-header -->
                <div class="table-responsive" data-direction="des">           
                    <div id="tablainmueble"class="table-responsive">
                        <table 
                            class="table table-striped table-bordered table-hover table-highlight table-checkable" 
                            data-provide="datatable" 
                            data-display-rows="10"
                            data-info="true"
                            data-search="true"
                            data-length-change="true"
                            data-paginate="true">
                            <thead>
                                <tr>
                                    <th class="checkbox-column">
                                        <input type="checkbox" class="icheck-input">
                                    </th>

                                    <th data-filterable="true" data-sortable="true" data-direction="asc">Código</th>
                                    <th data-filterable="true" data-sortable="true" data-direction="asc">Dirección</th>
                                    <th data-filterable="true" data-sortable="true" data-direction="asc">Estratificación</th>
                                    <th data-filterable="true" data-sortable="true" data-direction="asc">Precio</th>
                                    <th data-filterable="true" data-sortable="true" data-direction="asc">Ubicación</th>
                                    <th data-filterable="true" data-sortable="true" data-direction="asc">Estado</th>
                                    <th data-filterable="true" data-sortable="true" data-direction="asc">Categoría</th>
                                    <th data-filterable="false" data-sortable="false" data-direction="false" class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="" style="width: 82px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $objInmueble = inmueble_controller::buscarAll();
                                if (count($objInmueble) > 0) {
                                    foreach ($objInmueble as $key => $value) {
                                        ?>
                                        <tr>
                                            <td class="checkbox-column">
                                                <input type="checkbox" class="icheck-input">
                                            </td>
                                            <td><?php echo $value->getCodigo(); ?></td>    
                                            <td><?php echo $value->getDireccion(); ?></td> 
                                            <td><?php echo $value->getEstratificacion(); ?></td> 
                                            <td><?php echo $value->getPrecio(); ?></td>
                                            <td><?php echo $value->getUbicacion(); ?></td>
                                            <td><?php echo $value->getEstado(); ?></td>
                                            <td><?php echo $value->getCategoria_idCategoria(); ?></td>

                                            <td>
                                                <a href="editarInmueble.php?id=<?php echo $value->getIdInmueble(); ?>"><i class="fa fa-edit ui-popover" data-toggle="tooltip" data-trigger="hover" data-placement="right"  title="Editar"></i></a>   
                                                &nbsp;
                                                <a href="../Controlador/inmueble_controller.php?action=eliminar&id=<?php echo $value->getIdInmueble(); ?>" onclick="return confirmSubmit()"><i class="fa fa-trash-o ui-popover" data-toggle="tooltip" data-trigger="hover" data-placement="right"  title="Eliminar"></i></a>  
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

    <?php require_once('_footer.php'); ?>
    <?php
} else {
    header("Location: ../Vista/login.php");
}
?>  

