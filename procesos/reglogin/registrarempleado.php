<?php
    require_once "../../clases/Conexion.php";
    require_once "../../clases/empleados.php";

    $obj= new empleados();

    $datos= array(  $_POST['curpe'], 
                    $_POST['empleado_nombre'], 
                    $_POST['empleado_apellido'],
                    $_POST['empleado_apellidoM'],
                    $_POST['empleado_email'],
                    $_POST['empleado_tel'],
                    $_POST['empleado_calle'],
                    $_POST['empleado_colonia'],
                    $_POST['cbx_estado'],
                    $_POST['cbx_municipio'],
                    $_POST['cbx_localidad'] );

    echo $obj->registroEmpleado($datos);
?>