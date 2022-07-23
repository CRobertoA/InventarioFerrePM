<?php

    class salidas{

        public function obtenDatosProductos($idproducto){

			$c=new conectar();
			$conexion=$c->conexion();

			$sql="SELECT codigoproduc,
                            idmarca,
							nombreproducto,
							modelo,
                            stockmaximo
					from producto 
					where codigoproduc='$idproducto'";
			$result=mysqli_query($conexion,$sql);

			$ver=mysqli_fetch_row($result);

			$datos=array(
						'codigoproduc' => $ver[0],
							'idmarca' => $ver[1],
							'nombreproducto' => $ver[2],
							'modelo' => $ver[3],
                            'stockmaximo' => $ver[4]
						);

			return $datos;
		}
    }
?>