<?php 

    require_once "../../clases/Conexion.php";
    require_once "../../clases/Marcas.php";

    $idmar=$_POST['idmarca'];

	$obj=new marcas();

	echo $obj->eliminaMarca($idmar);

 ?>