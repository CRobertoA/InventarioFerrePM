<?php
	session_start();
	
	if(isset($_SESSION['usuario']) and $_SESSION['rolu']=="Administrador" and $_SESSION['estado']== 1){
		
	
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Nuevo usuario</title>

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

		$sql2="SELECT E.nombre, E.apellidos FROM empleado E INNER JOIN usuario U ON E.curp = U.curp  where U.idusuario = $idusu";
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
									<a href="producto-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR PRODUCTO</a>
								</li>
								<li>
									<a href="producto-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE PRODUCTOS</a>
								</li>
								<li>
									<a href="item-search.html"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR PRODUCTO</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="company.html"><i class="fas fa-store-alt fa-fw"></i> &nbsp; INVENTARIO</a>
						</li>

						<li>
							<a href="company.html"><i class="fas fa-shopping-basket fa-fw"></i> &nbsp; ENTRADAS</a>
						</li>

						<li>
							<a href="company.html"><i class="fas fa-shopping-cart fa-fw"></i> &nbsp; SALIDAS</a>
						</li>

						<?php
							if($_SESSION['rolu']=="Administrador"):
						?>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas  fa-user-secret fa-fw"></i> &nbsp; USUARIOS <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="user-new.php"><i class="fas fa-user-ninja fa-fw"></i> &nbsp; USUARIO</a>
								</li>
								<li>
									<a href="empleado-new.php"><i class="fas fa-user-friends fa-fw"></i> &nbsp; EMPLEADO</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-file-invoice fa-fw"></i> &nbsp; REPORTES <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="reservation-new.html"><i class="fas fa-plus fa-fw"></i> &nbsp; Nuevo préstamo</a>
								</li>
								<li>
									<a href="reservation-list.html"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de préstamos</a>
								</li>
								<li>
									<a href="reservation-search.html"><i class="fas fa-search-dollar fa-fw"></i> &nbsp; Buscar préstamos</a>
								</li>
								<li>
									<a href="reservation-pending.html"><i class="fas fa-hand-holding-usd fa-fw"></i> &nbsp; Préstamos pendientes</a>
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

		<!-- Contenido de pagina -->
		<section class="full-box page-content">
			<nav class="full-box navbar-info">
				<a href="#" class="float-left show-nav-lateral">
					<i class="fas fa-exchange-alt"></i>
				</a>
				<!--<a href="user-update.php">
					<i class="fas fa-user-cog"></i>
				</a>-->
				<label>
					<i class="bi bi-person-workspace"></i> <?php echo $_SESSION['usuario'] ?>
				</label>
				<a href="#" class="btn-exit-system">
					<i class="fas fa-power-off"></i>
				</a>
			</nav>

			<!-- Cabecera de la pagina -->
			<div class="full-box page-header">
				<h3 class="text-left">
					<i class="bi bi-person-plus-fill"></i> &nbsp; NUEVO USUARIO
				</h3>
				<p class="text-justify">
					Capturar los datos del nuevo usuario
				</p>
			</div>
			
			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a class="active" href="user-new.php"><i class="bi bi-person-plus-fill"></i> &nbsp; NUEVO USUARIO</a>
					</li>
					<li>
						<a href="user-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE USUARIOS</a>
					</li>
					<!--<li>
						<a href="user-search.html"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR USUARIO</a>
					</li>-->
				</ul>	
			</div>
			
			<!-- Contenido -->
			<div class="container-fluid">
				<!-- formulario para ingresar datos de nuevo usuario -->
				<form action="" class="form-neon" autocomplete="off" id="frmrusuario">
					<fieldset>
						<legend><i class="far fa-address-card"></i> &nbsp; Información personal</legend>
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 col-md-8">
									<div class="form-group">
										<!-- select para elegir un empleado -->
										<select class="form-control" name="empleado_usuario" id="empleado_usuario" >
											<?php
												require_once "clases/Conexion.php";
												
												$c= new conectar();
            									$conexion= $c->conexion();
												$consulta="SELECT * from empleado";
												$ejecutar=mysqli_query($conexion, $consulta);
											?>
											<option value="A" selected="" >Seleccione un empleado</option> <!-- puede tener atributo disabled="" -->
											<?php foreach ($ejecutar as $opciones): ?>
												<?php if($opciones['estado']==1): ?>
												<option value="<?php echo $opciones['curp'] ?>"> <?php echo $opciones['nombre']. " " .$opciones['apellidos'] ?> </option>
												<?php
													endif;
												?>
											<?php endforeach ?>
										</select>
									</div>
								</div>
								
								<!--<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="curp_empleadou" class="bmd-label-floating">CURP</label>
										<input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" name="curp_empleadou" id="curp_empleadou" maxlength="35">
									</div>
								</div>-->
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
										<label for="usuario_usuario" class="bmd-label-floating">Nombre de usuario</label>
										<input type="text" pattern="[a-zA-Z0-9]{1,35}" class="form-control" name="usuario_usuario" id="usuario_usuario" maxlength="35">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="usuario_clave_1" class="bmd-label-floating">Contraseña</label>
										<input type="password" class="form-control" name="usuario_clave_1" id="usuario_clave_1" maxlength="200">
									</div>
								</div>
							</div>
						</div>
					</fieldset>
					<br><br>
					<fieldset>
						<legend><i class="fas fa-medal"></i> &nbsp; Cargo del usuario</legend>
						<div class="container-fluid">
							<div class="row">
								<div class="col-12">
									<p><span class="badge badge-info">Administrador</span> Acceso a todos los módulos del sistema</p>
									<p><span class="badge badge-success">Almacen</span> Acceso a módulo de productos e inventario</p>
									<div class="form-group">
										<select class="form-control" name="usuario_rol" id="usuario_rol" >
											<option value="A" selected="" >Seleccione una opción</option> <!-- puede tener atributo disabled="" -->
											<option value="Administrador">Administrador</option>
											<option value="Almacen">Almacen</option>
										</select>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
					<p class="text-center" style="margin-top: 40px;">
						<button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp; LIMPIAR</button>
						&nbsp; &nbsp;
						<!--<button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp; GUARDAR</button>-->
						<span type="submit" class="btn btn-raised btn-info btn-sm" id="registrou"><i class="far fa-save"></i> &nbsp; GUARDAR</span>
					</p>
				</form>
			</div>
			

		</section>
	</main>
	
	
	<!--=============================================
	=            Archivos JavaScript           =
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
		$(document).ready(function(){
			$('#registrou').click(function(){

				vacios=validarFormVacio('frmrusuario');
				if(vacios > 0){
					alertify.alert("Advertencia","Debes llenar todos los campos");
					return false;
				}
				datos=$('#frmrusuario').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"procesos/reglogin/registrarUsuario.php",
					success:function(r){
						//alert(r);
						if(r==1){
							//limpia el formulario una vez agregado
							$('#frmrusuario')[0].reset();
							alertify.success("Usuario agregado con éxito");
						}else{
							alertify.error("Error al agregar");
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