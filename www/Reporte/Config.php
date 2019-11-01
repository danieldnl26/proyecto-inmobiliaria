<?php

$cfg['db_user']="root";
$cfg['db_pass']="";
$cfg['db_host']="localhost";
$cfg['db_name']="consignataria";

$db = mysql_pconnect( $cfg['db_host'],$cfg['db_user'],$cfg['db_pass']);
$db_sel = mysql_select_db($cfg['db_name'],$db);

if (!$db_sel) {
    
    echo 'No se establecio conexion a base de Datos';
    
}
?>
