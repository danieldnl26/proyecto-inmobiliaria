<?php
session_start();
if (!empty($_SESSION['usuario'])) {
    ?>
    <?php include_once './_header.php'; ?>
    <?php require_once '../Controlador/controlador_Vehiculo.php'; ?> 
    <?php require_once '../Modelo/Vehiculo.php'; ?> 
 <?php require_once '../Modelo/categoria.php'; ?> 
 <?php require_once '../Modelo/Marca.php'; ?> 
    <div class="content-header">
        <h2 class="content-header-title">ADMINISTRAR VEHICULOS</h2>     
        <ol class="breadcrumb">
            <li><a href="javascript:;"></a></li>

        </ol>
    </div>

    <?php
    if (!empty($_GET['respuesta'])) {
        $respuesta = $_GET['respuesta'];
        $o = $_GET['o'];
        if ($respuesta == "correcto") {
            ?>
            <div class="alert alert-success">
                <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
                <strong>¡Bien Hecho!</strong> El vehiculo se ha <?php echo $o; ?>o exitosamente.
            </div>
            <?php
        } elseif ($respuesta == "repetido") {
            ?>
            <div class="alert alert-danger">
                <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
                <strong>¡Error!</strong> El vehiculo ya existe, no ha sido <?php echo $o; ?>o.
            </div> 
            <?php
        } else {
            ?>    
            <div class="alert alert-danger">
                <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
                <strong>¡Error!</strong> El vehiculo no ha sido <?php echo $o; ?>o.
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
                        REGISTROS
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
                                    <th data-filterable="true" data-sortable="true" data-direction="asc">Código</th>
                                    <th data-filterable="true" data-sortable="true" data-direction="asc"><strong>Placa</strong></th>
                                    <th data-filterable="true" data-sortable="true" data-direction="asc"><strong>Modelo</strong></th>
                                    <th data-filterable="true" data-sortable="true" data-direction="asc"><strong>Cilindraje</strong></th>
                                    <th data-filterable="true" data-sortable="true" data-direction="asc"><strong>Precio</strong></th>
                                    <th data-filterable="true" data-sortable="true" data-direction="asc"><strong>Color</strong></th>
                                    <th data-filterable="true" data-sortable="true" data-direction="asc"><strong>Kilometraje</strong></th>
                                    <th data-filterable="true" data-sortable="true" data-direction="asc"><strong>Categoría</strong></th>
                                    <th data-filterable="true" data-sortable="true" data-direction="asc"><strong>Ciudad</strong></th>
                                    <th data-filterable="true" data-sortable="true" data-direction="asc"><strong>Marca</strong></th>
                                    <th data-filterable="true" data-sortable="true" data-direction="asc"><strong>Titular</strong></th>
                                    <th data-filterable="false" data-sortable="false" data-direction="false" class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="" style="width: 82px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $objVehiculo = controlador_Vehiculo::buscarAll();
                                if (count($objVehiculo) > 0) {
                                    foreach ($objVehiculo as $key => $value) {
                                        ?>
                                        <tr>
                                            <td class="checkbox-column">
                                                <input type="checkbox" class="icheck-input">
                                            </td>
                                            <td><?php echo $value->getCodigo(); ?></td>
                                            <td><?php echo $value->getPlaca(); ?></td>
                                            <td><?php echo $value->getModelo(); ?></td>
                                            <td><?php echo $value->getCilindraje(); ?></td>
                                            <td><?php echo $value->getPrecio(); ?></td>
                                            <td><?php echo $value->getColor(); ?></td>
                                            <td><?php echo $value->getKilometraje(); ?></td>
                <?php $objC = categoria::buscarForId($value->getCategoria_idCategoria());
                        ?>
                                            <td><?php  echo $objC->getNombre();?></td>
                                            <td><?php echo $value->getCiudad_idCiudad(); ?></td>
                <?php $objM = Marca::buscarForId($value->getMarca_idMarca());
                        ?>
                                            <td><?php  echo $objM->getMarca();?></td>
                                            <td><?php echo $value->getPersona_idPersona(); ?></td>
                                            <td>
                                                <a href="editVehiculos.php?idVehiculo=<?php echo $value->getIdVehiculo(); ?>" ><i class="fa fa-edit ui-popover" data-toggle="tooltip" data-trigger="hover" data-placement="right"  title="Editar"></i></a>
                                                <a href="../Controlador/controlador_Vehiculo.php?action=eliminar&IdVehiculo=<?php echo $value->getIdVehiculo(); ?>" onclick="return confirmSubmit()"><i class="fa fa-trash-o ui-popover" data-toggle="tooltip" data-trigger="hover" data-placement="right"  title="Eliminar"></i></a>
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
    <?php include_once './_footer.php'; ?>

    <?php
} else {
    header("Location: ../Vista/login.php");
}
?> 