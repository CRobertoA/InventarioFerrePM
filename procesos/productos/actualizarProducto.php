<?php
    require_once "../../clases/Conexion.php";
    require_once "../../clases/Productos.php";

    $obj= new productos();

    $datos= array(  $_POST['idproductoA'], 
                    $_POST['producto_marcaU'],
                    $_POST['producto_nombreU'], 
                    $_POST['producto_modeloU'],
                    $_POST['producto_descripcionU'],
                    $_POST['producto_sminU'], 
                    $_POST['producto_smaxU'] ); 

     echo $obj->actualizaProducto($datos);


?>