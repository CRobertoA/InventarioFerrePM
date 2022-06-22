<?php

    require_once "../../clases/Conexion.php";
	require_once "../../clases/Salidas.php";

	$obj= new salidas;

	echo json_encode($obj->obtenDatosProductos($_POST['idproducto']));

?>