
<?php
session_start();
include_once './_header.php';
?>
<?php include_once '../Modelo/categoria.php'; ?>
<?php include_once '../Modelo/Marca.php'; ?>
<?php include_once '../Controlador/controlador_Vehiculo.php'; ?>    

<div class="content-header">
    <h2 class="content-header-title">DETALLES VEHÍCULO</h2>     
    <ol class="breadcrumb">
        <li><a href="javascript:;"></a></li>
    </ol>
</div>

<div class="portlet">

    <?php
    if (!empty($_GET['idVehiculo'])) {
        $id = $_GET['idVehiculo'];
        ?>


        <div class="portlet-header">

            <h3><i class="fa fa-tasks"></i>INFORMACIÓN DEL VEHÍCULO</h3>


        </div> <!-- /.portlet-header -->


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
                <div class="col-sm-3"> <label type="text" ><h4 class="text-primary"><?php echo $objVehiculo->getCiudad_idCiudad(); ?></h4></label></div>


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
            <div class="row">
                <div class="content-header">
                    <label class="col-lg-offset-5" for="name">FOTOS</label>

                </div><br/>
                <div class="ui-lightbox-gallery">
                    <?php
                    $fot = strpos($objVehiculo->getFotos(), "=>");
                    if ($fot > 0) {

                        $arrFotos = explode("=>", $objVehiculo->getFotos());

                        foreach ($arrFotos as $f) {
                            ?>


                            <div class="col-sm-4">

                                <a class="" href="imagenesVehiculos/<?php echo $f; ?>" title="Caption. Can be aligned it to any side and contain any HTML.">
                                    <div class="thumbnail-view">
                                        <img src="imagenesVehiculos/<?php echo $f; ?>" width="240" height="157" alt="Gallery Image" >
                                    </div>
                                </a>

                            </div>

                            <?php
                        }
                        ?>

                        <?php } else {
                        $fot = $objVehiculo->getFotos();
                        ?>
                        <div class="col-sm-4">

                            <a class="" href="imagenesVehiculos/<?php echo $fot; ?>" title="Caption. Can be aligned it to any side and contain any HTML.">
                                <div class="thumbnail-view">
                                    <img src="imagenesVehiculos/<?php echo $fot; ?>" width="240" height="157" alt="Gallery Image" >
                                </div>
                            </a>

                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>




        </div> <!-- /.portlet-content -->

    </div> <!-- /.portlet -->
    <?php
} else {
    ?>

    <?php
}
?>
<?php require_once('_footer.php'); ?>