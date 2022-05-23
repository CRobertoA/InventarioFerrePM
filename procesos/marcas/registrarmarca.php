<?php
    require_once "../../clases/Conexion.php";
    require_once "../../clases/Marcas.php";

    $obj= new marcas();

    /*$datos= array(  $_POST['curpe'], 
                    $_POST['empleado_nombre'], 
                    $_POST['empleado_apellido'], 
                    $_POST['empleado_estado'], 
                    $_POST['empleado_email'] );*/

    //$datos= array(  $_POST['marca_nombre'] );

    echo $obj->registroMarca($_POST['marca_nombre']);
?>