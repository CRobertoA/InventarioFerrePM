<?php
    //session_start();
    require_once "../../clases/Conexion.php";
    require_once "../../clases/usuarios.php";

    $obj= new usuarios();

    $idusuario= $_POST['idusuario'];
    $datos= array( $idusuario ); 

     echo $obj->desactivarUsuario($datos);
?>