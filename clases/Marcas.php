<?php
    class marcas {
        public function registroMarca($datos){
            $c= new conectar();
            $conexion= $c->conexion();

            $sql="INSERT into marca (nombre)
                                values ('$datos')";

            return mysqli_query($conexion,$sql);
        }

        public function actualizaMarca($datos){
            $c= new conectar();
            $conexion= $c->conexion();
            $sql= "UPDATE marca set nombre= '$datos[1]'
                                where idmarca= '$datos[0]'";
            echo mysqli_query($conexion,$sql);
        }

        public function eliminaMarca($idmarca){
			$c=new conectar();
			$conexion=$c->conexion();
 
			//$idimagen=self::obtenIdImg($idproducto);

			$sql="DELETE from marca 
					where idmarca='$idmarca'";
			return mysqli_query($conexion,$sql);

		}
    }
?>