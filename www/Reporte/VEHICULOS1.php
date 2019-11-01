<?php
require_once 'Config.php';
?>
<style type="text/css">
    <!--

    #campos{
        margin: 15px;
        padding: 15px;
      
    }
    th
    {
        text-align: center;
        border: solid 1.5px #55DD44;
        font-size:12px;
        font-family:Courier;
        width:110px; 
        height:20px;
  
    }

    td
    {
        text-align: left;
        border: solid 1px #55DD44;
        text-align: center;
    }
    h1{
        text-align: center;
    }
    td.col1
    {
        border: solid 1px red;
        text-align: right;
    }
    textarea
    {

        background: #D2CCDE;
        color: #000022;
        text-align: left;
        font-size: 11pt;
    }
    img{
        width: 250px;
    }
</style>
<page  backtop="3%" backbottom="5%" backleft= "5%" backright="3%">   
    <h1>COMPRAVENTA "EL REY DAVID"</h1>
    <br>
    <br>
    <br>
    <a><img src="casita02.gif" align="right"/></a>
    <br>
    <h2>DATOS VEHÍCULOS</h2>
    <table id="campos">
        <?php
        $sql = "SELECT `Nombres`,`Apellidos`, `Telefono`, `Correo`, `Direccion` FROM `persona` WHERE idPersona = 1";
        $result = mysql_query($sql);
        while ($row = mysql_fetch_array($result)) {
            ?>
            <tr>
                <td style="text-align: left;">GERENTE :</td>
                <td style="text-align: right;"><?php echo $row["Nombres"]."   ".$row["Apellidos"] ?></td>
            </tr>
            <tr>
                <td style="text-align: left;">DIRECCIÓN :</td>
                <td style="text-align: right;"><?php echo $row["Direccion"] ?></td>
            </tr>
            <tr>
                <td style="text-align: left;">EMAIL :</td>
                <td style="text-align: right;"><?php echo $row["Correo"] ?></td>
            </tr>
            <tr>
                <td style="text-align: left;">TELEFONO : </td>
                <td style="text-align: right;"><?php echo $row["Telefono"] ?></td>
            </tr>
            <?php
        }
        ?>
        </table>
    <br>
    <br>
    <br>
    <h3>VEHÍCULOS EXISTENTES</h3>
    <br>
    <br>
    <br>
    
    <table id="campos">
        <thead>
            <tr>
                <th>CÓDIGO</th>
                <th>PROPETARIO</th>
                <th>CATEGORÍA</th>
                <th>PLACA</th>
                <th>MODELO</th>
                <th>COLOR</th>
                <th>COMUSTIBLE</th>
                <th>MARCA</th>
                <th>DEPARTAMENTO</th>
                <th>CIUDAD</th>
                 
            </tr>
        </thead>
        <tbody>
            <?php
            $sql ="SELECT `Codigo`, `Placa`, `Modelo`, `Cilindraje`, `Seguro`,`Precio`, `Color`,`Kilometraje`, `TipoCombustible`,`Descripcion`, `Nombre`,`Ciudad`, `Marca`, `Nombres`,`Apellidos`,`Departamento` from vehiculo JOin ciudad On vehiculo.Ciudad_idCiudad = ciudad.idCiudad JOIN departamento On ciudad.Departamento_idDepartamento = departamento.idDepartamento JOIN marca ON vehiculo.Marca_idMarca = marca.idMarca JOIN persona On vehiculo.persona_idPersona = persona.idPersona JOin categoria On vehiculo.categoria_idCategoria = categoria.idCategoria";
            $result = mysql_query($sql);
            while ($row = mysql_fetch_array($result)) {
                ?>
                <tr>
                    <td><?php echo $row["Codigo"] ?></td>
                    <td><?php echo $row["Nombres"]."  ".$row["Apellidos"] ?></td>
                    <td><?php echo $row["Nombre"] ?></td>
                    <td><?php echo $row["Placa"] ?></td> 
                    <td><?php echo $row["Modelo"] ?></td>
                    <td><?php echo $row["Color"] ?></td> 
                    <td><?php echo $row["TipoCombustible"] ?></td>
                    <td><?php echo $row["Marca"] ?></td>
                    <td><?php echo $row["Departamento"] ?></td>
                    <td><?php echo $row["Ciudad"] ?></td> 
                       
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <br>
    <br>
    <br>
    <div class="row">
        <a href=""><img src="logoConsignataria.png" style="width: 100px;"/></a>
    </div>
    <br>
    <hr> 
    <br>
    <p>&copy; 2014 DASERYEL.</p> 
</page>



