<?php
	session_start();
	//echo $_SESSION['usuario'];
	
	if(isset($_SESSION['usuario']) and $_SESSION['estado']== 1){
		
	
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Home</title>

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
		$usuarioo = $_SESSION['usuario'];
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
						 <?php echo $vernom[0]. " " .$vernom[1]?> <br><small class="roboto-condensed-light"> <?php echo $nom[4] ?> </small>
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
						</li> -->

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
									<a href="generar-reporte.php"><i class="bi bi-file-earmark-arrow-down-fill"></i> &nbsp; REPORTES</a>
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
				<a href="user-myupdate.php" title="Editar usuario">
					<i class="fas fa-user-cog"></i>
				</a>
				<label>
					<i class="bi bi-person-workspace"></i> <?php echo $usuarioo ?>
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
					<i class="fab fa-dashcube fa-fw"></i> &nbsp; DASHBOARD
				</h3>
				<p class="text-lg-center">
					Sistema de inventario para la empresa "Mi Gran Central Ferretera"
				</p>
				<?php 
					$consultaPS="SELECT P.stockminimo, I.stock FROM producto P INNER JOIN inventario I 
					ON P.codigoproduc = I.codigoproduc order by I.idinventario;";
					$ejecutarPS=mysqli_query($conexion, $consultaPS);
					$contador =0;
					while($ver=mysqli_fetch_row($ejecutarPS)):
						if($ver[1] <= $ver[0]){
							$contador++;
						}
					endwhile;
					if($contador > 0){
				?>
				<div class="full-box tile-container">
					<a href="producto-stockmin.php" class="tile1">
						<div class="tile-tittle1">PRODUCTOS CON STOCK MINIMO</div>
						<div class="tile-icon">
							<i class="fas bi bi-exclamation-triangle-fill fa-fw"></i>
							<p><?php echo $contador ?> productos stock minimo</p>
						</div>
					</a>
				</div>
				<?php
					}
				?>
			</div>
			
			<!-- Content -->
			<div class="full-box tile-container">

				<!--<a href="empleado-new.php" class="tile">
					<div class="tile-tittle">PRODUCTOS</div>
					<div class="tile-icon">
						<i class="fas fa-users fa-fw"></i>
						<p>5 Registrados</p>
					</div>
				</a>-->

				<?php 
					$consultaP="select count(*) from producto";
					$ejecutarP=mysqli_query($conexion, $consultaP);
					$contp = mysqli_fetch_row($ejecutarP)[0];

				?>
				<a href="producto-list.php" class="tile">
					<div class="tile-tittle">PRODUCTOS</div>
					<div class="tile-icon">
						<i class="fas fa-pallet fa-fw"></i>
						<p><?php echo $contp ?> Registrados</p>
					</div>
				</a>

				<?php 
					$consultaI="select count(*) from inventario";
					$ejecutarI=mysqli_query($conexion, $consultaI);
					$conti = mysqli_fetch_row($ejecutarI)[0];

				?>
				<a href="inventario-list.php" class="tile">
					<div class="tile-tittle">INVENTARIO</div>
					<div class="tile-icon">
						<i class="fas fa-store-alt fa-fw"></i>
						<p><?php echo $conti ?> Registrados</p>
					</div>
				</a>

				<?php 
					$consultaE="select count(*) from entrada";
					$ejecutarE=mysqli_query($conexion, $consultaE);
					$conte = mysqli_fetch_row($ejecutarE)[0];

				?>
				<a href="entrada-list.php" class="tile">
					<div class="tile-tittle">ENTRADAS</div>
					<div class="tile-icon">
						<i class="fas bi bi-box2-fill fa-fw"></i>
						<p><?php echo $conte ?> Registradas</p>
					</div>
				</a>

				<?php 
					$consultaSa="select count(*) from salida";
					$ejecutarSa=mysqli_query($conexion, $consultaSa);
					$contsa = mysqli_fetch_row($ejecutarSa)[0];

				?>
				<a href="salida-list.php" class="tile">
					<div class="tile-tittle">SALIDAS</div>
					<div class="tile-icon">
						<i class="fas fa-shopping-cart fa-fw"></i>
						<p><?php echo $contsa ?> Registradas</p>
					</div>
				</a>
				<?php 
					$consultaU="select count(*) from usuario";
					$ejecutarU=mysqli_query($conexion, $consultaU);
					$contu = mysqli_fetch_row($ejecutarU)[0];

					if($_SESSION['rolu']=="Administrador"):
				?>
				<a href="user-list.php" class="tile">
					<div class="tile-tittle">Usuarios</div>
					<div class="tile-icon">
						<i class="fas fa-user-secret fa-fw"></i>
						<p> <?php echo $contu ?> Registrados</p>
					</div>
				</a>

				<a href="generar-reporte.php" class="tile">
					<div class="tile-tittle">REPORTES</div>
					<div class="tile-icon">
						<i class="fas fa-file-invoice fa-fw"></i>
						<p>Reportes</p>
					</div>
				</a>

				<a href="generar-respaldo.php" class="tile">
					<div class="tile-tittle">RESPALDO</div>
					<div class="tile-icon">
						<i class="fas bi bi-server fa-fw"></i>
						<p>Respaldo</p>
					</div>
				</a>
				<?php
					endif;
				?>
				
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
		function cerrarSesion(){
			alertify.confirm("Cerrando sesión",'¿Seguro que desea cerrar sesión?', function(){
				window.location="procesos/reglogin/salir.php";
			}, function(){ 
				alertify.error('Cancelo!')
			}).set('labels', {ok:'Si, salir!', cancel:'No, cancelar'});
		}
	</script>
</body>
</html>

<?php
	}else{
		header("location:index.php");
	}
?>