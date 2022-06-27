<?php

    require_once "../../clases/Conexion.php";
    require_once "../../clases/usuarios.php";

    $obj= new usuarios();

    $datos= array(  $_POST['empleado_usuario'],
                    $_POST['usuario_rol'] );

    echo $obj->registroUsuario($datos);
?>