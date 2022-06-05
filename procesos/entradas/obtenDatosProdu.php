<?php

    require_once "../../clases/Conexion.php";
	require_once "../../clases/Entradas.php";

	$obj= new entradas;

	echo json_encode($obj->obtenDatosProduc($_POST['idproducto']));

?>