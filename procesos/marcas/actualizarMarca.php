<?php
    require_once "../../clases/Conexion.php";
    require_once "../../clases/Marcas.php";

    $obj= new marcas();

    $datos= array(  $_POST['idmarcaA'], 
                    $_POST['marca_nombreU'] ); 

     echo $obj->actualizaMarca($datos);
?>