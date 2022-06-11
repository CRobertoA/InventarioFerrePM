<?php 

	session_start();
	$index=$_POST['ind'];
	unset($_SESSION['tablaEntradasTemp'][$index]);
	$datos=array_values($_SESSION['tablaEntradasTemp']);
	unset($_SESSION['tablaEntradasTemp']);
	$_SESSION['tablaEntradasTemp']=$datos;

 ?>