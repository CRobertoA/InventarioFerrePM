<?php
    //session_start();
    require_once "../../clases/Conexion.php";
    require_once "../../clases/empleados.php";

    $obj= new empleados();

    $idempleado= $_POST['idempleado'];
    $datos= array( $idempleado ); 

     echo $obj->desactivarEmpleado($datos);
?>