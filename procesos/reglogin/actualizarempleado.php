<?php
    require_once "../../clases/Conexion.php";
    require_once "../../clases/empleados.php";

    $obj= new empleados();

    $datos= array(  $_POST['curpeu'], 
                    $_POST['empleado_nombre'], 
                    $_POST['empleado_apellido'],
                    $_POST['empleado_email'] ); 

     echo $obj->actualizaEmpleado($datos);
?>