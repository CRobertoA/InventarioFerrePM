<?php
    require_once "../../clases/Conexion.php";
    require_once "../../clases/usuarios.php";

    $obj= new usuarios();

    //$curp=$_POST['curpe'];
    //$nombre=$_POST['empleado_nombre'];
    //$apellidos=$_POST['empleado_apellido'];
    //$estado=$_POST['empleado_estado'];
    //$email=$_POST['empleado_email'];

    $datos= array(  $_POST['empleado_usuario'], 
                    $_POST['usuario_usuario'], 
                    $_POST['usuario_clave_1'], 
                    $_POST['usuario_rol'] );

    echo $obj->registroUsuario($datos);
?>