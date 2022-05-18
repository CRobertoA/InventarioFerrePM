<?php
    session_start();
    require_once "../../clases/Conexion.php";
    require_once "../../clases/usuarios.php";

    $obj= new usuarios();

    $datos= array(  $_POST['UserName'], 
                    $_POST['UserPassword']);

    echo $obj->loginUser($datos);
?>