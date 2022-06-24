<?php
    require_once "../../clases/Conexion.php";
	require_once "../../clases/Marcas.php";

	$obj= new marcas();

	echo json_encode($obj->obtenDatosMarca());
?>