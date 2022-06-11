<?php

    class entradas{

        public function obtenDatosProduc($idproducto){

			$c=new conectar();
			$conexion=$c->conexion();

			$sql="SELECT codigoproduc,
                            idmarca,
							nombre,
							modelo,
                            stockmaximo
					from producto 
					where codigoproduc='$idproducto'";
			$result=mysqli_query($conexion,$sql);

			$ver=mysqli_fetch_row($result);

			$datos=array(
						'codigoproduc' => $ver[0],
							'idmarca' => $ver[1],
							'nombre' => $ver[2],
							'modelo' => $ver[3],
                            'stockmaximo' => $ver[4]
						);

			return $datos;
		}
    }
?>