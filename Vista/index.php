
<?php session_start();
require_once('_header.php');
?>
<?php
if (!empty($_GET['respuesta'])) {
    $respuesta = $_GET['respuesta'];

    if ($respuesta == "correcto") {
        ?>
        <div class="alert alert-success">
            <a class="close" data-dismiss="alert" href="" aria-hidden="true">&times;</a>
            <strong>¡BIENVENIDO!</strong> Has iniciado sesión correctamente.
        </div>
        <?php
    }
}
?>  
<div>
    <br/><br/><br/>
    <!-- Start WOWSlider.com BODY section -->

    <div id="wowslider-container1">
        <div class="ws_images"><ul>

                <li><img src="data1/images/fuente.jpg" width="960" height="400" title="" id="wows1_4"/></li>

                <li><img src="data1/images/bienvenidos.jpg" width="960" height="400" title=""  id="wows1_0"/></li>
                <li><img src="data1/images/moto2.jpg" width="960" height="400" title="" id="wows1_1"/></li>
                <li><img src="data1/images/casaCampestre.jpg" width="960" height="400" title="" id="wows1_4"/></li>
                <li><img src="data1/images/soporte.jpg" width="960" height="400" title=""  id="wows1_2"/></li>
                <li><img src="data1/images/moto.jpg" width="960" height="400" title="" id="wows1_3"/></li>




            </ul></div>
        <span class="wsl"><a href="http://wowslider.com/vu">image carousel</a> by WOWSlider.com v7.2</span>
        <div class="ws_shadow"></div>
    </div>	
    <script type="text/javascript" src="engine1/wowslider.js"></script>
    <script type="text/javascript" src="engine1/script.js"></script>
    <!-- End WOWSlider.com BODY section -->

    <br/>


    <div class="center-block" style="width: 650px;" class="row-spacer">
        <a class=" navbar-right " href="Vehiculos.php" target="#" >
            <img class=" responsive" src="data1/images/grua.jpg" alt="Site Logo">
        </a> 
    </div> 
    <div class="center-block" style="width: 650px;" class="row-spacer">
        <a  href="Inmueble.php" target="#" ><img class=" img-responsive" src="data1/images/inmueble.jpg" alt="Site Logo">
        </a>  

    </div>

</div>
<?php require_once('_footer.php'); ?>
 






