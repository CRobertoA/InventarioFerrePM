<?php

	use PHPMailer\PHPMailer\PHPMailer;
    //use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../../PHPMailer/src/PHPMailer.php';
    require '../../PHPMailer/src/SMTP.php';
    require '../../PHPMailer/src/Exception.php';

    class usuarios {
        public function registroUsuario($datos){
            $c= new conectar();
            $conexion= $c->conexion();

			$sqlid="SELECT * FROM usuario where curp= '$datos[0]'";
            $result= mysqli_query($conexion, $sqlid);

			if(mysqli_num_rows($result) > 0){
                return 2;
            }else{
				/*$sqlusu="SELECT substring(apellidos, 1, 3), substring(nombre, 1, 3), substring(curp, 1, 3) 
						FROM empleado WHERE curp = '$datos[0]';";
				$result2= mysqli_query($conexion, $sqlusu);
				$usuar = mysqli_fetch_row($result2);
				$nusuario = $usuar[0]. "" .$usuar[1]. "" .$usuar[2];*/
				$sqlnclient="SELECT nombre, email FROM empleado WHERE curp = '$datos[0]';";
				$result3= mysqli_query($conexion, $sqlnclient);
				$vercliente=mysqli_fetch_row($result3);
				
				$nusuario = self::randPass(6, 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890');
				$pass = self::randPass(12, 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890');	
				$estado=1;

				$sql="INSERT into usuario (curp, 
											nombre,
											contrasena,
											rol,
											estado)
									values ('$datos[0]', '$nusuario', '$pass', '$datos[1]', '$estado')";

				$result2= mysqli_query($conexion,$sql);

				$mail = new PHPMailer(true);
				$mail->SMTPDebug = 0;
				$mail->isSMTP();
				$mail->Host = 'smtp.gmail.com';
				$mail->SMTPAuth = true;
				$mail->Username = 'migrancentralferretera@gmail.com';
				$mail->Password = 'pincgvxjpbvovmbb';
				$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
				$mail->Port = 465;

				$mail->setFrom('migrancentralferretera@gmail.com', 'Mi Gran Central Ferretera');
        		$mail->addAddress($vercliente[1]);

				$mail->isHTML(true);
				$mail->Subject = 'Envio de los datos de su usuario Mi Gran Central Ferretera';
				$mail->Body = "Hola, ".$vercliente[0]." <br>
								Datos para <b>Inicio de sesion</b> <br><br>
								Usuario:  ".$nusuario." <br>
								Contraseña:  ".$pass." <br> 
								Buen dia! ";
				$mail->send();
				return 1;
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

		function randPass($len, $set = ""){
			$gen = "";
			for($i = 0; $i < $len; $i++)
				{
					$set = str_shuffle($set);
					$gen.= $set[0]; 
				}
			return $gen;
		}
    }
?>