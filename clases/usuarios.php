<?php
    class usuarios {
        public function registroUsuario($datos){
            $c= new conectar();
            $conexion= $c->conexion();

			$sqlid="SELECT * FROM usuario where curp= '$datos[0]'";
            $result= mysqli_query($conexion, $sqlid);

			if(mysqli_num_rows($result) > 0){
                return 2;
            }else{
				$estado=1;
				$sql="INSERT into usuario (curp, 
											nombre,
											contrasena,
											rol,
											estado)
									values ('$datos[0]', '$datos[1]', '$datos[2]', '$datos[3]', '$estado')";

				return mysqli_query($conexion,$sql);
			}
        }

        public function loginUser($datos){
			$c=new conectar();
			$conexion=$c->conexion();
			//$password=sha1($datos[1]);

			$_SESSION['usuario']=$datos[0];
			$_SESSION['iduser']=self::traeID($datos);
            $_SESSION['rolu']=self::traeRol($datos);
			$_SESSION['estado']=self::traeEstado($datos);

			$sql="SELECT * from usuario where nombre='$datos[0]' and contrasena ='$datos[1]'";
			$result=mysqli_query($conexion,$sql);

			if(mysqli_num_rows($result) > 0){
				return 1;
			}else{
				return 0;
			}
		}

        public function traeID($datos){
			$c=new conectar();
			$conexion=$c->conexion();
			//$password=sha1($datos[1]);

			$sql="SELECT idusuario from usuario where nombre='$datos[0]' and contrasena='$datos[1]'"; 
			$result=mysqli_query($conexion,$sql);

			return mysqli_fetch_row($result)[0];
		}

        public function traeRol($datos){
			$c=new conectar();
			$conexion=$c->conexion();
			//$password=sha1($datos[1]);

			$sql="SELECT rol from usuario where nombre='$datos[0]' and contrasena='$datos[1]'"; 
			$result=mysqli_query($conexion,$sql);

			return mysqli_fetch_row($result)[0];
		}

		public function traeEstado($datos){
			$c=new conectar();
			$conexion=$c->conexion();
			//$password=sha1($datos[1]);

			$sql="SELECT estado from usuario where nombre='$datos[0]' and contrasena='$datos[1]'"; 
			$result=mysqli_query($conexion,$sql);

			return mysqli_fetch_row($result)[0];
		}

		public function actualizaUsuario($datos){
            $c= new conectar();
            $conexion= $c->conexion();
            $sql= "UPDATE usuario set nombre= '$datos[1]', contrasena= '$datos[2]', rol= '$datos[3]' 
                                    where idusuario= '$datos[0]'";
            echo mysqli_query($conexion,$sql);
        }

		public function desactivarUsuario($datos){
            $c= new conectar();
            $conexion= $c->conexion();
            $estado= 0;

            $sqlDe= "UPDATE usuario set estado= '$estado' 
                                    where idusuario= '$datos[0]'";       
                                    
            return mysqli_query($conexion,$sqlDe);
        }

		public function activarUsuario($datos){
            $c= new conectar();
            $conexion= $c->conexion();
            $estado= 1;

            $sqlAc= "UPDATE usuario set estado= '$estado' 
                                    where idusuario= '$datos[0]'";       
                                    
            return mysqli_query($conexion,$sqlAc);
        }
    }
?>