<?php 
	session_start();
	$iduser=$_SESSION['iduser'];
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Productos.php";

	$obj= new productos();

	$datos=array();
	
	$nombreImg=$_FILES['producto_img']['name'];
	$rutaAlmacenamiento=$_FILES['producto_img']['tmp_name'];
	$carpeta='../../archivos/';
	$rutaFinal=$carpeta.$nombreImg;

	/*$datosImg=array(
		$_POST['categoriaSelect'],
		$nombreImg,
		$rutaFinal
					);*/

		if(move_uploaded_file($rutaAlmacenamiento, $rutaFinal)){
				//$idimagen=$obj->agregaImagen($datosImg);

				//if($idimagen > 0){

                    $datos[0]=$iduser;
					$datos[1]=$_POST['producto_marca'];
					//$datos[1]=$idimagen;
					$datos[2]=$_POST['producto_nombre'];
					$datos[3]=$_POST['producto_modelo'];
					$datos[4]=$_POST['producto_descripcion'];
					$datos[5]=$rutaFinal;
                    $datos[6]=$_POST['producto_smin'];
                    $datos[7]=$_POST['producto_smax'];
					$datos[8]=$_POST['generacodigo'];
					echo $obj->insertaProducto($datos);
				//}else{
				//	echo 0;
				//}
		}

 ?>