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
    }
?>