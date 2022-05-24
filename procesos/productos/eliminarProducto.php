<?php 

    require_once "../../clases/Conexion.php";
    require_once "../../clases/Productos.php";

    $idpro=$_POST['idproducto'];

	$obj=new productos();

	echo $obj->eliminaProducto($idpro);

 ?>