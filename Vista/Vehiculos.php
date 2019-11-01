
<?php session_start();
include_once '../Vista/_header.php'; ?>
<?php include_once '../Modelo/Departamento.php'; ?>
<?php include_once '../Modelo/Marca.php'; ?>
<?php include_once '../Modelo/Persona.php'; ?>
<?php include_once '../Modelo/Categoria.php'; ?>
<?php include_once '../Modelo/Ciudad.php'; ?>
<?php include_once '../Modelo/Vehiculo.php'; ?>


<div class="content-header">
    <h2 class="content-header-title">VEHICULOS</h2>     
    <ol class="breadcrumb">
        <li><a href="javascript:;"></a></li>
    </ol>
</div>

<div class="row">
    <form action="" method="">
        <div class="col-sm-2">
            <div class="form-group ">
                <label > CATEGORÍA </label>
                <select class="form-control" name="Categoria" title="Seleccionar" >

                    <?php
                    foreach (Categoria::selectAll() as $us) {
                        echo "<option value='" . $us['Nombre'] . "'>" . $us['Nombre'] . "</option>\n";
                    }
                    ?>
                </select>

            </div>
        </div>


        <div class="col-sm-4">
            <div class="form-group ">

                <br>
                <!-------------Boton Nuneva Marca Ajax------------------------------------------------------------------------------>
                <button type="submit"  name="" class="btn btn-success ">Buscar</button>
                <a href="Vehiculos.php" class="btn btn-success">Ver Todo</a> 
                <!------------------------------------------------------------------------------------------------------------------->  
            </div>
        </div>
    </form>
</div>

<div class="row-spacer"></div>


<div class="row">

    <?php
    if (!empty($_GET['Categoria'])) {
        $categoria = $_GET['Categoria'];
        $objVehiculo = Vehiculo::buscartodoCategoria($categoria);
    } else {
        $objVehiculo = Vehiculo::buscartodo();
    }
    if (count($objVehiculo) > 0) {
        foreach ($objVehiculo as $key => $value) {
            ?>

            <div class="col-md-3 col-sm-6">

                <div class="thumbnail">
                    <div class="thumbnail-view">

                        <a href="imagenesVehiculos/<?php
                        $fot = $value->getFotos();
                        if (strpos($fot, "=>") > 0) {
                            echo explode("=>", $fot)[0];
                        } else {
                            echo $fot;
                        }
                        ?>" class="thumbnail-view-hover ui-lightbox"></a>
                        <img src="imagenesVehiculos/<?php
                        $fot = $value->getFotos();
                        if (strpos($fot, "=>") > 0) {
                            echo explode("=>", $fot)[0];
                        } else {
                            echo $fot;
                        }
                        ?>" width="240" height="157" alt="Gallery Image" />
                    </div>

                    <div class="caption">
                        <h3><?php echo $value->getMarca_idMarca(); ?></h3>
                        <p>Precio: $<?php echo $value->getPrecio(); ?></p>
                        <p><a href="http://localhost/Consignataria/Vista/DetallesVehiculo.php?idVehiculo=<?php echo $value->getIdVehiculo(); ?>" class="btn btn-secondary btn-sm btn-sm">Ver Detalles</a></p>
                    </div>

                </div>  <!-- /.thumbnail -->         

            </div> <!-- /.col -->
            <?php
        }
    } else {
        echo "<h3>No existen Vehiculos</h3>";
    }
    ?>

</div> <!-- /.row -->

<?php include_once '../Vista/_footer.php'; ?>

