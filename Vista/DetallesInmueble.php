<?php
session_start();
include_once './_header.php';
?>
<?php require_once '../Modelo/Inmueble.php'; ?>
<?php include_once '../Modelo/categoria.php'; ?>
<?php require_once '../Controlador/inmueble_controller.php'; ?>

<div class="content-header">
    <h2 class="content-header-title">DETALLES INMUEBLE</h2>     
    <ol class="breadcrumb">
        <li><a href="javascript:;"></a></li>
    </ol>
</div>

<div class="portlet">

    <?php
    if (!empty($_GET['idInmueble'])) {
        $id = $_GET['idInmueble'];
        ?>


        <div class="portlet-header">

            <h3><i class="fa fa-tasks"></i>INFORMACIÓN DEL INMUEBLE</h3>


        </div> <!-- /.portlet-header -->


        <div class="portlet-content">

            <?php $objInmueble = inmueble_controller::buscarID($_GET['idInmueble']); ?>



            <div class="row">
                <div class="col-sm-2">
                    <label for="name">CÓDIGO : </label>
                    <label type="text"  ><h4 class="text-primary"><?php echo $objInmueble->getCodigo(); ?></h4></label>
                </div>

                <div class="col-sm-5">
                    <label for="name">TITULAR : </label>
                    <label type="text" ><h4 class="text-primary"> <?php
                            foreach (Persona::selectAll() as $usu) {

                                if ($objInmueble->getPersona_idPersona() == $usu['idPersona']) {
                                    echo "" . $usu['Nombres'] . "      " . $usu['Apellidos'] . "";
                                }
                            }
                            ?></h4></label>
                </div>

            </div> <!-- /.row -->

            <div class="row-spacer"></div> <!-- /.row-spacer -->

            <div class="row">

                <div class="col-sm-2">
                    <label for="name">DIRECCIÓN : </label>

                </div>
                <div class="col-sm-3"><label type="text"  ><h4 class="text-primary"><?php echo $objInmueble->getDireccion(); ?></h4></label></div> 
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <label for="name">ESTRATIFICACIÓN : </label>
                </div>
                <div class="col-sm-3"><label type="text" ><h4 class="text-primary"><?php echo $objInmueble->getEstratificacion(); ?></h4></label></div>  

                <div class="col-sm-2">
                    <label for="name">UBICACIÓN : </label>
                </div>
                <div class="col-sm-3"><label type="text" ><h4 class="text-primary"><?php echo $objInmueble->getUbicacion(); ?></h4></label></div>

            </div>
            <div class="row">
                <div class="col-sm-2">
                    <label for="name">ESTADO : </label>
                </div>
                <div class="col-sm-3"><label type="text" ><h4 class="text-primary"><?php echo $objInmueble->getEstado(); ?></h4></label></div> 

                <div class="col-sm-2">
                    <label for="name">ÁREA : </label>
                </div> 
                <div class="col-sm-3"><label type="text" ><h4 class="text-primary"><?php echo $objInmueble->getArea(); ?></h4></label></div>

            </div>   

            <div class="row">
                <div class="col-sm-2">
                    <label>CIUDAD :</label>

                </div>
                <div class="col-sm-3"> <label type="text" ><h4 class="text-primary"><?php echo $objInmueble->getCiudad_idCiudad(); ?></h4></label></div>

                <div class="col-sm-2">
                    <label for="name">CATEGORÍA :</label>
                </div>
                <?php $objC = categoria::buscarForId($objInmueble->getCategoria_idCategoria());
                        ?>
                <div class="col-sm-3">
                    <label type="text"><h4 class="text-primary"><?php  echo $objC->getNombre();?></h4></label>
                </div>

            </div>  
            <div class="row">
                <div class="col-sm-2">
                    <label for="name">PRECIO :</label>
                </div>
                <div class="col-sm-3"><label type="text" ><h4 class="text-primary"><?php echo $objInmueble->getPrecio(); ?></h4></label></div>  

                <div class="col-sm-2">
                    <label for="name">ESTADO :</label>
                </div>
                <div class="col-sm-3"><label type="text"id="selectestado" onselect="Activo"><h4 class="text-primary"><?php echo $objInmueble->getEstado(); ?></h4></label></div>
            </div>       
            <div class="row">
                <div class="col-sm-2">
                    <label for="name">DESCRIPCIÓN :</label>
                </div>
                <div class="col-sm-12"><label type="text" ><h4 class="text-primary"><?php echo $objInmueble->getDescripcion(); ?></h4></label></div>
            </div>
            
            <div class="row">
                <div class="content-header">
                    <label class="col-lg-offset-5" for="name">FOTOS</label>
                </div><br/>
                <div class="ui-lightbox-gallery">
                    <?php
                    $fot = strpos($objInmueble->getFotos(), "=>");
                    if ($fot > 0) {

                        $arrFotos = explode("=>", $objInmueble->getFotos());

                        foreach ($arrFotos as $f) {
                            ?>


                            <div class="col-sm-4">

                                <a class="" href="ImagenesInmuebles/<?php echo $f; ?>" title="Caption. Can be aligned it to any side and contain any HTML.">
                                    <div class="thumbnail-view">
                                        <img src="ImagenesInmuebles/<?php echo $f; ?>" width="240" height="157" alt="Gallery Image" >
                                    </div>
                                </a>

                            </div>

                            <?php
                        }
                        ?>

                    <?php
                    } else {
                        $fot = $objInmueble->getFotos();
                        ?>
                        <div class="col-sm-4">

                            <a class="" href="ImagenesInmuebles/<?php echo $fot; ?>" title="Caption. Can be aligned it to any side and contain any HTML.">
                                <div class="thumbnail-view">
                                    <img src="ImagenesInmuebles/<?php echo $fot; ?>" width="240" height="157" alt="Gallery Image" >
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