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

			$sql="INSERT into producto (idusuario,
										idmarca,
										nombre,
										modelo,
										descripcion,
										foto,
										stockminimo,
										stockmaximo) 
							values ('$datos[0]',
									'$datos[1]',
									'$datos[2]',
									'$datos[3]',
									'$datos[4]',
									'$datos[5]',
									'$datos[6]',
									'$datos[7]')";
			return mysqli_query($conexion,$sql);
		}

		public function obtenDatosProducto($idproducto){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="SELECT codigoproduc,
						idmarca, 
						nombre,
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
					"nombre" => $ver[2],
					"modelo" => $ver[3],
					"descripcion" => $ver[4],
					"stockminimo" => $ver[5],
					"stockmaximo" => $ver[6]
						);

			return $datos;
		}
    }
?>