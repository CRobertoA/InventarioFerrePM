<?php
    require_once "../../clases/Conexion.php";
	require_once "../../clases/Productos.php";

	$obj= new productos();


	$idpro=$_POST['idpro'];

	echo json_encode($obj->obtenDatosProducto($idpro));
?>