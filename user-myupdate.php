<?php
	session_start();
	
	if(isset($_SESSION['usuario']) and $_SESSION['estado']== 1){
		
	
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Actualizar usuario</title>

	<!-- Normalize V8.0.1 -->
	<link rel="stylesheet" href="./css/normalize.css">

	<!-- Bootstrap V4.3 -->
	<link rel="stylesheet" href="./css/bootstrap.min.css">

	<!-- Bootstrap Material Design V4.0 -->
	<link rel="stylesheet" href="./css/bootstrap-material-design.min.css">

	<!-- Font Awesome V5.9.0 -->
	<link rel="stylesheet" href="./css/all.css">

	<!-- Sweet Alerts V8.13.0 CSS file -->
	<link rel="stylesheet" href="./css/sweetalert2.min.css">

	<!-- Sweet Alert V8.13.0 JS file-->
	<script src="./js/sweetalert2.min.js" ></script>

	<!-- jQuery Custom Content Scroller V3.1.5 -->
	<link rel="stylesheet" href="./css/jquery.mCustomScrollbar.css">
	
	<!-- General Styles -->
	<link rel="stylesheet" href="./css/style.css">
	<link rel="stylesheet" type="text/css" href="icons/font/bootstrap-icons.css">

	<!-- Alertify -->
	<link rel="stylesheet" href="alertify/css/alertify.min.css" />
	<link rel="stylesheet" href="alertify/css/themes/default.min.css" />


</head>
<body>
	
	<?php 
		require_once "clases/Conexion.php";
												
		$c= new conectar();
		$conexion= $c->conexion();
		$idusu = $_SESSION['iduser'];
		$consulta="SELECT * FROM usuario where idusuario = $idusu";
		$ejecutar=mysqli_query($conexion, $consulta);
		$nom = mysqli_fetch_row($ejecutar);

		$sql2="SELECT E.nombre, E.apellidoP FROM empleado E INNER JOIN usuario U ON E.curp = U.curp  where U.idusuario = $idusu";
		$resultU2= mysqli_query($conexion, $sql2);
		$vernom = mysqli_fetch_row($resultU2);
	?>
	<!-- Main container -->
	<main class="full-box main-container">
		<!-- Nav lateral -->
		<section class="full-box nav-lateral">
			<div class="full-box nav-lateral-bg show-nav-lateral"></div>
			<div class="full-box nav-lateral-content">
				<figure class="full-box nav-lateral-avatar">
					<i class="far fa-times-circle show-nav-lateral"></i>
					<img src="./assets/avatar/ferretera.jpg" class="img-fluid" alt="Avatar">
					<figcaption class="roboto-medium text-center">
						<?php echo $vernom[0]. " " .$vernom[1]?> <br><small class="roboto-condensed-light"><?php echo $nom[4] ?></small>
					</figcaption>
				</figure>
				<div class="full-box nav-lateral-bar"></div>
				<nav class="full-box nav-lateral-menu">
					<ul>
						<li>
							<a href="home.php"><i class="fab fa-dashcube fa-fw"></i> &nbsp; Dashboard</a>
						</li>

						<!--<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-users fa-fw"></i> &nbsp; Clientes <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="empleado-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar Cliente</a>
								</li>
								<li>
									<a href="empleado-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de clientes</a>
								</li>
								<li>
									<a href="client-search.html"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar cliente</a>
								</li>
							</ul>
						</li>-->

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-pallet fa-fw"></i> &nbsp; PRODUCTOS <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="producto-new.php"><i class="bi bi-boxes"></i> &nbsp; AGREGAR PRODUCTO</a>
								</li>
								<li>
									<a href="marca-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR MARCA</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="inventario-list.php"><i class="fas fa-store-alt fa-fw"></i> &nbsp; INVENTARIO</a>
						</li>

						<li>
							<a href="entrada-new.php"><i class="fas bi bi-box2-fill fa-fw"></i> &nbsp; ENTRADAS</a>
						</li>

						<li>
							<a href="salida-new.php"><i class="fas fa-shopping-cart fa-fw"></i> &nbsp; SALIDAS</a>
						</li>

						<?php
							if($_SESSION['rolu']=="Administrador"):
						?>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas  fa-user-secret fa-fw"></i> &nbsp; USUARIOS <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="user-new.php"><i class="fas fa-user-ninja fa-fw"></i> &nbsp; AGREGAR USUARIO</a>
								</li>
								<li>
									<a href="empleado-new.php"><i class="fas fa-user-friends fa-fw"></i> &nbsp; AGREGAR EMPLEADO</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-file-invoice fa-fw"></i> &nbsp; REPORTES <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="generar-reporte.php"><i class="fas fa-plus fa-fw"></i> &nbsp; REPORTES</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="bi bi-wrench"></i> &nbsp; ADMINISTRACION <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="generar-respaldo.php"><i class="bi bi-server"></i> &nbsp; RESPALDO</a>
								</li>
							</ul>
						</li>
						<?php
							endif;
						?>
					</ul>
				</nav>
			</div>
		</section>

		<!-- Page content -->
		<section class="full-box page-content">
			<nav class="full-box navbar-info">
				<a href="#" class="float-left show-nav-lateral">
					<i class="fas fa-exchange-alt"></i>
				</a>
				<a href="user-myupdate.php">
					<i class="fas fa-user-cog"></i>
				</a>
				<label>
					<i class="bi bi-person-workspace"></i> <?php echo $_SESSION['usuario'] ?>
				</label>
				<!--<a href="#" class="btn-exit-system">
					<i class="fas fa-power-off"></i>
				</a>-->
				<a onclick="cerrarSesion();" title="Cerrar sesion">
					<i class="fas fa-power-off"></i>
				</a>
			</nav>

			<!-- Page header -->
			<div class="full-box page-header">
				<h3 class="text-left">
					<i class="fas fa-user-cog fa-fw"></i> &nbsp; EDITAR MI USUARIO
				</h3>
				<p class="text-justify">
					Editar los datos del usuario 
				</p>
			</div>
			
			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a class="active" href="user-myupdate.php"><i class="fas fa-user-cog"></i> &nbsp; EDITAR MI USUARIO</a>
					</li>
				</ul>	
			</div>
			
			<!-- Content -->
			<div class="container-fluid">
					<?php
						$sql="SELECT * FROM usuario where idusuario = '$idusu'";
						$resultUU= mysqli_query($conexion, $sql);
						$ver=mysqli_fetch_row($resultUU);
						$sql2="SELECT E.nombre, E.apellidoP, E.apellidoM FROM empleado E INNER JOIN usuario U ON E.curp = U.curp where U.idusuario = '$idusu' ";
						$resultUU2= mysqli_query($conexion, $sql2);
						$ver2=mysqli_fetch_row($resultUU2);
					?>
				<form class="form-neon" autocomplete="off" id="frmrMiusuarioAct">
					<fieldset>
						<legend><i class="far fa-address-card"></i> &nbsp; Información personal</legend>
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 col-md-6">
									<div class="form-group">
										<input type="text" hidden="" id="idusuarioA" name="idusuarioA" value="<?php echo $ver[0] ?>">
										<label for="curp_empleadou" >EMPLEADO</label>
										<input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" name="curp_empleadou" id="curp_empleadou" maxlength="35" readonly="readonly" value="<?php echo $ver2[0]. " " .$ver2[1]. " " .$ver2[2] ?>">
									</div>
								</div>
                                <div class="col-12 col-md-6">
									<div class="form-group">
										<label for="usuario_usuario" >Nombre de usuario</label>
										<input type="text" pattern="[a-zA-Z0-9]{1,35}" class="form-control" readonly="readonly" name="usuario_usuario" id="usuario_usuario" maxlength="35" value="<?php echo $ver[2] ?>">
									</div>
								</div>
							</div>
						</div>
					</fieldset>
					<br><br>
					<fieldset>
						<legend><i class="fas fa-user-lock"></i> &nbsp; Información de la cuenta</legend>
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 col-md-6">
									<div class="form-group">
									<input type="password" hidden="" class="form-control" name="usuario_clave" id="usuario_clave" maxlength="200" value="<?php echo $ver[3] ?>">
                                    <label for="usuario_clave_1" > Contraseña nueva</label>
                                    <input type="password" class="form-control" name="usuario_clave_1" id="usuario_clave_1" maxlength="200">
									</div>
								</div>
                                <div class="col-12 col-md-6">
									<div class="form-group">
                                    <label for="usuario_clave_2" > Repetir contraseña</label>
                                    <input type="password" class="form-control" name="usuario_clave_2" id="usuario_clave_2" maxlength="200">
									</div>
								</div>
							</div>
						</div>
					</fieldset>
					<br><br><br>
					<fieldset>
						<legend><i class="fas fa-medal"></i> &nbsp; Cargo del usuario</legend>
						<div class="container-fluid">
							<div class="row">
								<div class="col-8">
									<p><span class="badge badge-info">Administrador</span> Acceso a todos los módulos del sistema</p>
									<p><span class="badge badge-success">Almacen</span> Acceso a módulo de productos e inventario</p>
									<div class="form-group">
                                        <input type="text" pattern="[a-zA-Z0-9]{1,35}" class="form-control" readonly="readonly" name="usuario_cargo" id="usuario_cargo" maxlength="35" value="<?php echo $ver[4] ?>">
									</div>
								</div>
							</div>
						</div>
					</fieldset>
					<br>
					<p class="text-center" style="margin-top: 40px;">
						<span class="btn btn-raised btn-success btn-sm" id="actualizaMiUsuario"><i class="fas fa-sync-alt"></i> &nbsp; ACTUALIZAR</span>
					</p>
				</form>
			</div>
			

		</section>
	</main>
	
	
	<!--=============================================
	=            Include JavaScript files           =
	==============================================-->
	<!-- jQuery V3.4.1 -->
	<script src="./js/jquery-3.4.1.min.js" ></script>

	<!-- popper -->
	<script src="./js/popper.min.js" ></script>

	<!-- Bootstrap V4.3 -->
	<script src="./js/bootstrap.min.js" ></script>

	<!-- jQuery Custom Content Scroller V3.1.5 -->
	<script src="./js/jquery.mCustomScrollbar.concat.min.js" ></script>

	<!-- Bootstrap Material Design V4.0 -->
	<script src="./js/bootstrap-material-design.min.js" ></script>
	<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>

	<script src="./js/main.js" ></script>
	<script src="./js/funciones.js" ></script>
	<script src="alertify/alertify.min.js"></script>

	<script type="text/javascript">
		/*function agregaDato(idEmpleado, nombre){
			$('#curpeu').val(idEmpleado);
			$('#empleado_nombre').val(nombre);
		}*/
		function cerrarSesion(){
			alertify.confirm("Cerrando sesión",'¿Seguro que desea cerrar sesión?', function(){
				window.location="procesos/reglogin/salir.php";
			}, function(){ 
				alertify.error('Cancelo!')
			}).set('labels', {ok:'Si, salir!', cancel:'No, cancelar'});
		}
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#actualizaMiUsuario').click(function(){

				// obtenemos los valores de los input 
				var usuario = document.getElementById("usuario_usuario").value.length; 
				var contral = document.getElementById("usuario_clave_2").value.length; 
				var contra = document.getElementById("usuario_clave_2").value; 
                var contraant = document.getElementById("usuario_clave_1").value; 
                var contrabase = document.getElementById("usuario_clave").value; 
                var comparacion = contraant.localeCompare(contra);
				//EXPRESION REGULAR PARA LA VALIDACION DE LA CONTRASEÑA
				con=/^(?=(?:.*\d))(?=.*[A-Z])(?=.*[a-z])(?=.*[.,*!?¿¡/#$%&])\S{8,64}$/

				vacios=validarFormVacio('frmrMiusuarioAct');
				if(vacios > 0){
					alertify.alert("Advertencia","Debes llenar todos los campos");
					return false;
				}else if(usuario < 6){ 
                 	alertify.alert("Advertencia", "El nombre de usuario debe ser mayor a 6 digitos"); 
                 return false; 
				}else if(contral < 8){ 
                 	alertify.alert("Advertencia", "La contraseña debe ser mayor a 8 digitos"); 
                 return false; 
				}else if(comparacion!=0){
                    alertify.alert("Advertencia", "Las contraseñas no coinciden"); 
                    return false; 
                }
                /*else if(!con.exec(contra)){ 
					alertify.alert("Advertencia", 'La contraseña debe contener \n Al menos una mayúscula \n Al menos una minúscula \n Al menos un número 0-9 \n Al menos un carácter especial (.,*!?¿¡/#$%&) \n Longitud mínima de 8 caracteres, 64 máxima \n No acepta espacios'); 
					return false; 
				}*/

				datos=$('#frmrMiusuarioAct').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"procesos/usuarios/actualizarmiusuario.php",
					success:function(r){
						//alert(r);
						if(r==1){
							//window.location="empleado-list.php";
							alertify.success("Usuario actualizado con éxito");
							//alert("Empleado actualizado con exito");
							
						}else{
							alertify.error("Error al actualizar");
						}
					}
				});
			});
		});
	</script>
</body>
</html>

<?php
	}else{
		header("location:index.php");
	}
?>