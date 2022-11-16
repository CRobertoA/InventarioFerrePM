<?php
	require ('../clases/conexion2.php');
	
	$id_municipio = $_POST['id_municipio'];
	
	$query = "SELECT id_localidad, localidad FROM t_localidad WHERE id_municipio = '$id_municipio' ORDER BY localidad";
	$resultado=$mysqli->query($query);

	$html= "<option value='A'>Seleccionar Localidad</option>";
	
	while($row = $resultado->fetch_assoc())
	{
		$html.= "<option value='".$row['id_localidad']."'>".$row['localidad']."</option>";
	}
	echo $html;
?>