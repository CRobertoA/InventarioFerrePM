<?php
    class productos {
        public function agregaImagen($datos){
			$c=new conectar();
			$conexion=$c->conexion();

			$fecha=date('Y-m-d');

			$sql="INSERT into imagenes (id_categoria,
										nombre,
										ruta,
										fechaSubida)
							values ('$datos[0]',
									'$datos[1]',
									'$datos[2]',
									'$fecha')";
			$result=mysqli_query($conexion,$sql);

			return mysqli_insert_id($conexion);
		}

        public function insertaProducto($datos){
			$c=new conectar();
			$conexion=$c->conexion();
			//$fecha=date('Y-m-d');

			$sqlid="SELECT * FROM producto WHERE (idmarca = '$datos[1]') AND (nombreproducto = '$datos[2]') AND (modelo = '$datos[3]');";
            $result= mysqli_query($conexion, $sqlid);

			if(mysqli_num_rows($result) > 0){
                return 2;
            }else{
				$sql="INSERT into producto (codigoproduc,
											idusuario,
											idmarca,
											nombreproducto,
											modelo,
											descripcion,
											foto,
											stockminimo,
											stockmaximo,
											preciocompra,
											presentacion) 
								values ('$datos[8]',
										'$datos[0]',
										'$datos[1]',
										'$datos[2]',
										'$datos[3]',
										'$datos[4]',
										'$datos[5]',
										'$datos[6]',
										'$datos[7]',
										'$datos[9]',
										'$datos[10]')";
				return mysqli_query($conexion,$sql);
			}
		}

		public function obtenDatosProducto($idproducto){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="SELECT codigoproduc,
						idmarca, 
						nombreproducto,
						modelo,
						descripcion,
						stockminimo,
						stockmaximo 
				from producto 
				where codigoproduc='$idproducto'";
			$result=mysqli_query($conexion,$sql);

			$ver=mysqli_fetch_row($result);

			$datos=array(
					"codigoproduc" => $ver[0],
					"idmarca" => $ver[1],
					"nombreproducto" => $ver[2],
					"modelo" => $ver[3],
					"descripcion" => $ver[4],
					"stockminimo" => $ver[5],
					"stockmaximo" => $ver[6]
						);

			return $datos;
		}

		public function actualizaProducto($datos){
            $c= new conectar();
            $conexion= $c->conexion();
            $sql= "UPDATE producto set idmarca= '$datos[1]', nombreproducto= '$datos[2]', modelo= '$datos[3]',  
										descripcion= '$datos[4]', stockminimo= '$datos[5]', stockmaximo= '$datos[6]',
										preciocompra= '$datos[7]', presentacion= '$datos[8]'
                                    where codigoproduc= '$datos[0]'";
            return mysqli_query($conexion,$sql);
        }

		public function eliminaProducto($idproducto){
			$c=new conectar();
			$conexion=$c->conexion();
 
			//$idimagen=self::obtenIdImg($idproducto);

			$sql="DELETE from producto 
					where codigoproduc='$idproducto'";
			//$result=mysqli_query($conexion,$sql);
			return mysqli_query($conexion,$sql);

				/*if($result){
					$ruta=self::obtenRutaImagen($idproducto);
					//print_r($ruta);
					//$imgVer=explode("/", $ruta) ; 
					//$imgruta=$imgVer[1]."/".$imgVer[2]."/".$imgVer[3];
					//$sql="DELETE from imagenes where id_imagen='$idimagen'";

					//$result=mysqli_query($conexion,$sql);
						//if($result){
							if(unlink($ruta)){
								return 1;
							}
						//}
				}*/
			}

		public function obtenRutaImagen($idPro){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="SELECT foto 
					from producto 
					where codigoproduc='$idPro'";

			$result=mysqli_query($conexion,$sql);

			return mysqli_fetch_row($result)[0];
		}
    }
?>