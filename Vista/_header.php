<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <title>Consignataria</title>

        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,300,700">
        <link rel="stylesheet" href="./css/font-awesome.min.css">
        <link rel="stylesheet" href="./js/libs/css/ui-lightness/jquery-ui-1.9.2.custom.min.css">
        <link rel="stylesheet" href="./css/bootstrap.min.css">

        <!-- Plugin CSS -->
        <link rel="stylesheet" href="./js/plugins/morris/morris.css">
        <link rel="stylesheet" href="./js/plugins/icheck/skins/minimal/blue.css">
        <link rel="stylesheet" href="./js/plugins/select2/select2.css">
        <link rel="stylesheet" href="./js/plugins/fullcalendar/fullcalendar.css">
        <link rel="stylesheet" href="./js/plugins/datepicker/datepicker.css">
        <link rel="stylesheet" href="./js/plugins/select2/select2.css">
        <link rel="stylesheet" href="./js/plugins/simplecolorpicker/jquery.simplecolorpicker.css">
        <link rel="stylesheet" href="./js/plugins/timepicker/bootstrap-timepicker.css">
        <link rel="stylesheet" href="./js/plugins/fileupload/bootstrap-fileupload.css">
        <link rel="stylesheet" href="./js/libs/css/ui-lightness/jquery-ui-1.9.2.custom.css">
        <link rel="stylesheet" href="./js/plugins/magnific/magnific-popup.css">
        <link rel="stylesheet" href="./css/demos/ui-notifications.css">

        <!-- App CSS -->
        <link rel="stylesheet" href="./css/target-admin.css">
        <link rel="stylesheet" href="./css/custom.css">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <!-- Start WOWSlider.com HEAD section -->
        <link rel="stylesheet" type="text/css" href="engine1/style.css" />
        <script type="text/javascript" src="engine1/jquery.js"></script>
        <!-- End WOWSlider.com HEAD section -->

        <link rel="shortcut icon" href="img/icono1.ico" type="image/x-icon" />
    </head>
    <body>
        <div class="navbar ">

            <div class="container">

                <div class="navbar-header ">

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <i class="fa fa-cogs"></i>
                    </button>

                    <a class=" navbar-brand-image navbar-left" >
                     <!--  <img class=" img-responsive" src="./img/logo.jpg" alt="Site Logo">-->
                    </a>


                </div> <!-- /.navbar-header -->

                <div class="navbar-header">


                    <a class=" navbar-right " >
                        <img class=" img-responsive" src="./img/ConCorona.png" alt="Site Logo">
                      <!-- <img class=" img-responsive" src="./img/min.png" alt="Site Logo"> -->
                    </a>  

                </div> <!-- /.navbar-header -->


                <div class="navbar-collapse collapse">


                    <ul class="nav navbar-nav navbar-right"> 

                        <?php if (!empty($_SESSION['usuario'])) { ?> 
                            <li>
                                <span class="text-info" style="" ><br/> <h3 style="color:white"> Bienvenido Administrador&nbsp; </h3></span>
                            </li>
                            <li class="dropdown navbar-profile">


                                <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:;">
                                    <img src="./img/avatars/avatar-2-xs.jpg" class="navbar-profile-avatar" alt="">
                                    <span class="navbar-profile-label"><?php if (!empty($_SESSION['usuario'])) {
                            echo $_SESSION['usuario'];
                        } ?> &nbsp;</span>
                                    <i class="fa fa-caret-down"></i>
                                </a>

                                <ul class="dropdown-menu" role="menu">

                                    <li>
                                        <a href="restablecerDatos.php?Id=1">
                                            <i class="fa fa-cogs"></i> 
                                            &nbsp;&nbsp;Cambiar datos
                                        </a>
                                    </li>

                                    <li class="divider"></li>

                                    <li>
                                        <a href="../Controlador/Persona_controler.php?action=cerrarSesion">
                                            <i class="fa fa-sign-out"></i> 
                                            &nbsp;&nbsp;Cerrar Sesión
                                        </a>
                                    </li>

                                </ul>

                            </li>
<?php } else { ?> <li> <br/><span class="text-info" style="" ><a href="login.php"><h3 style="color:white">Iniciar Sesión</h3></a> </span></li><?php } ?>
                    </ul>

                </div> <!--/.navbar-collapse -->

            </div> <!-- /.container -->

        </div> <!-- /.navbar -->


        <div class="mainbar">

            <div class="container">

                <button type="button" class="btn mainbar-toggle" data-toggle="collapse" data-target=".mainbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>

                <div class="mainbar-collapse collapse">

                    <ul class="nav navbar-nav mainbar-nav">

                        <li class="">
                            <a href="index.php">
                                <i class="fa fa-home"></i>
                                Iniciooooooooooooooooo
                            </a>
                        </li>

                        <li class="">
                            <a href="QuienesSomos.php ">
                                <i class="fa fa-home"></i>
                                Quienes Somos
                            </a>
                        </li>
                        <?php if (!empty($_SESSION['usuario'])) { ?> 
    <?php ?> 
                            <!--------------------------------Persona---------------------------------------------------------->
                            <li class="">
                                <a href="Persona.php" >
                                    <i class="fa fa-users"></i> 
                                    Gestión Persona

                                </a>
                            </li> 
                            <!--------------------------------Gestionar---------------------------------------------------------->
                            <li class="dropdown ">
                                <a href="#about" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">

                                    <i class="fa fa-building-o"></i>
                                    Gestionar Inmueble
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">  
                                    <li>
                                        <a href="CrearInmueble.php">
                                            <i class="fa fa-shopping-cart"></i> 
                                            &nbsp;&nbsp;Registrar Inmueble
                                        </a>
                                    </li>


                                    <li>
                                        <a href="VerInmueble.php">
                                            <i class="fa fa-shopping-cart"></i> 
                                            &nbsp;&nbsp;Administrar Inmuebles
                                        </a>
                                    </li>

                                    <li>
                                        <a href="Inmueble.php">
                                            <i class="fa fa-shopping-cart"></i> 
                                            &nbsp;&nbsp;Ver Inmuebles
                                        </a>
                                    </li>

                                    <li>
                                        <a href="TransaccionInmueble.php">
                                            <i class="fa fa-shopping-cart"></i> 
                                            &nbsp;&nbsp;Transacción
                                        </a>
                                    </li>

                                    <li class="dropdown-submenu">
                                        <a href="">
                                            <i class="fa fa-shopping-cart"></i> 
                                            &nbsp;&nbsp;Generar Reportes
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="../www/Reporte/INMUEBLE.php">
                                                    <i class="fa fa-shopping-cart"></i> 
                                                    &nbsp;&nbsp;Inmuebles Existentes
                                                </a>
                                            </li>
                                            <li>
                                                <a href="../www/Reporte/COMPRAINMUEBLE.php">
                                                    <i class="fa fa-shopping-cart"></i> 
                                                    &nbsp;&nbsp;Inmuebles Comprados
                                                </a>
                                            </li>
                                            <li>
                                                <a href="../www/Reporte/VENTAINMUEBLE.php">
                                                    <i class="fa fa-shopping-cart"></i> 
                                                    &nbsp;&nbsp;Inmuebles Vendidos
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <!-------------------------------------------------VEHICULO---------------------------------------------------->


                            <li class="dropdown ">
                                <a href="#about" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">

                                    <i class="fa fa-truck"></i>
                                    Gestionar Vehículooooo
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">   

                                    <li>
                                        <a href="RegistroVehiculos.php">
                                            <i class="fa fa-shopping-cart"></i> 
                                            &nbsp;&nbsp;Registrar Vehículo
                                        </a>
                                    </li>

                                    <li>
                                        <a href="HistorialVehiculos.php">
                                            <i class="fa fa-shopping-cart"></i> 
                                            &nbsp;&nbsp;Administrar Vehículo
                                        </a>
                                    </li>

                                    <li>
                                        <a href="Vehiculos.php">
                                            <i class="fa fa-shopping-cart"></i> 
                                            &nbsp;&nbsp;Ver Vehículos
                                        </a>
                                    </li>

                                    <li>
                                        <a href="TransaccionVehiculo.php">
                                            <i class="fa fa-shopping-cart"></i> 
                                            &nbsp;&nbsp;Transacción
                                        </a>
                                    </li>

                                    <li class="dropdown-submenu">
                                        <a href="">
                                            <i class="fa fa-shopping-cart"></i> 
                                            &nbsp;&nbsp;Generar Reportes
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="../www/Reporte/VEHICULOS.php">
                                                    <i class="fa fa-shopping-cart"></i> 
                                                    &nbsp;&nbsp;Vehículos Existentes
                                                </a>
                                            </li>
                                            <li>
                                                <a href="../www/Reporte/COMPRAVEHICULO.php">
                                                    <i class="fa fa-shopping-cart"></i> 
                                                    &nbsp;&nbsp;Vehículos Comprados
                                                </a>
                                            </li>
                                            <li>
                                                <a href="../www/Reporte/VENTAVEHICULO.php">
                                                    <i class="fa fa-shopping-cart"></i> 
                                                    &nbsp;&nbsp;Vehículos Vendidos
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
<?php } else { ?>
                            <li class="">
                                <a href="Inmueble.php">
                                    <i class="fa fa-building-o"></i>
                                    Inmuebles 
                                </a>
                            </li>  


                            <li class="">
                                <a href="Vehiculos.php">
                                    <i class="fa fa-truck"></i>
                                    Vehículos
                                </a>
                            </li>  
<?php } ?>

                        <!------------------------------- Calendario ---------------------------------------------------------->

                        <li class="">
                            <a href="calendario.php">
                                <i class="fa fa-calendar"></i>
                                Calendario 
                            </a>
                        </li>  

                    </ul>

                </div> <!-- /.navbar-collapse -->   

            </div> <!-- /.container --> 

        </div> <!-- /.mainbar -->


        <div class="container">

            <div class="content">

                <div class="content-container">
