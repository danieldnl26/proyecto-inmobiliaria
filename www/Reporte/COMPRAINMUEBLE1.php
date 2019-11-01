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
        font-size:14px;
        font-family:Courier;
        width:100px; 
        height:30px;
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
-->
</style>
<page  backtop="3%" backbottom="5%" backleft= "5%" backright="3%">   
    <h1>COMPRAVENTA "EL REY DAVID"</h1>
    <br>
    <br>
    <br>
    <a><img src="casita02.gif" align="right"/></a>
    <br>
    <br>
    <h2>DATOS VENTA</h2>
    <table id="campos">
        <?php
        $sql = "SELECT `Nombres`,`Apellidos`, `Telefono`, `Correo`, `Direccion` FROM `persona` WHERE idPersona = 5";
        $result = mysql_query($sql);
        while ($row = mysql_fetch_array($result)) {
            ?>
            <tr>
                <td style="text-align: left;">GERENTE :</td>
                <td style="text-align: right;"><?php echo $row["Nombres"] . "   " . $row["Apellidos"] ?></td>
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
    <h3>INMUEBLES COMPRADOS</h3>
    <br>
    <br>
    <br>
    <table id="campos">
        <br>
        <thead>
            <tr>
                <th>N°. COMPRA</th>
                <th>FECHA</th>
                <th>INMUEBLE</th>
                <th>VALOR</th>
                <th>CÓDIGO INMUEBLE</th>
                <th>VENDEDOR</th>
                <th>COMPRADOR</th>
                <th>TESTIGO 1</th>
                <th>TESTIGO 2</th> 
            </tr>
        </thead>
        <br>
        <tbody>
            <?php
            $sqlm = "SELECT idTransaccion, transaccion.Fecha,Valor,categoria.Nombre, inmueble.Codigo FROM inmueble "
                    . "INNER JOIN categoria ON inmueble.categoria_idCategoria = categoria.idCategoria "
                    . "INNER JOIN persona ON inmueble.persona_idPersona = persona.idPersona "
                    . "INNER JOIN transaccion ON transaccion.inmueble_idInmueble = inmueble.idInmueble "
                    . "WHERE transaccion.TipoTransaccion = 'Compra'";
            $result = mysql_query($sqlm);
            $i = 1;
            while ($row = mysql_fetch_array($result)) {
                $idt = $row["idTransaccion"]
                ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $row["Fecha"] ?></td>
                    <td><?php echo $row["Nombre"] ?></td>
                    <td><?php echo $row["Valor"] ?></td>
                    <td><?php echo $row["Codigo"] ?></td>
                    <?php
                    $sqlm = "SELECT Documento, Nombres, Apellidos FROM procesospersona INNER JOIN persona ON procesospersona.persona_idPersona = persona.idPersona INNER JOIN tipopersona ON procesospersona.tipopersona_idTipoPersona = tipopersona.idTipoPersona WHERE tipopersona.TipoPersona= 'Vendedor' and procesospersona.Transaccion_idTransaccion = $idt";
                    $result1 = mysql_query($sqlm);
                    while ($row = mysql_fetch_array($result1)) {
                        ?>
                        <td><?php echo $row["Documento"] . "    " . $row["Nombres"] . "   " . $row["Apellidos"] ?></td>
                        <?php
                    }
                    ?>
                    <?php
                    $sqlm = "SELECT Documento, Nombres, Apellidos FROM procesospersona INNER JOIN persona ON procesospersona.persona_idPersona = persona.idPersona INNER JOIN tipopersona ON procesospersona.tipopersona_idTipoPersona = tipopersona.idTipoPersona WHERE tipopersona.TipoPersona= 'Comprador' and procesospersona.Transaccion_idTransaccion = $idt";
                    $result1 = mysql_query($sqlm);
                    while ($row = mysql_fetch_array($result1)) {
                        ?>
                        <td><?php echo $row["Documento"] . "    " . $row["Nombres"] . "   " . $row["Apellidos"] ?></td>
                        <?php
                    }
                    ?>
                    <?php
                    $sqlm = "SELECT Documento, Nombres, Apellidos FROM procesospersona INNER JOIN persona ON procesospersona.persona_idPersona = persona.idPersona INNER JOIN tipopersona ON procesospersona.tipopersona_idTipoPersona = tipopersona.idTipoPersona WHERE tipopersona.TipoPersona= 'Testigo' and procesospersona.Transaccion_idTransaccion = $idt";
                    $result1 = mysql_query($sqlm);
                    while ($row = mysql_fetch_array($result1)) {
                        ?>
                        <td><?php echo $row["Documento"] . "    " . $row["Nombres"] . "   " . $row["Apellidos"] ?></td>
                        <?php
                    }
                    ?>
                <?php }
                ?>
            </tr>
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