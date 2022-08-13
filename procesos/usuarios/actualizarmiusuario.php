<?php
    require_once "../../clases/Conexion.php";
    require_once "../../clases/usuarios.php";

    $obj= new usuarios();

    $datos= array(  $_POST['idusuarioA'],  
                    $_POST['usuario_clave_2']); 

     echo $obj->actualizaMiUsuario($datos);
?>