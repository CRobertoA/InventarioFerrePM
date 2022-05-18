<?php
    require_once "../../clases/Conexion.php";
    require_once "../../clases/usuarios.php";

    $obj= new usuarios();

    $datos= array(  $_POST['idusuarioA'], 
                    $_POST['usuario_usuario'], 
                    $_POST['usuario_clave_1'],
                    $_POST['usuario_rolA'] ); 

     echo $obj->actualizaUsuario($datos);
?>