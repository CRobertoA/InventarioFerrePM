<?php
	session_start();
	
	if(isset($_SESSION['usuario']) and $_SESSION['rolu']=="Administrador" and $_SESSION['estado']== 1){
		
	
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Nuevo empleado</title>

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
									<a href="entrada-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; REPORTES</a>
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

			<!-- Page header -->
			<div class="full-box page-header">
				<h3 class="text-left">
					<i class="bi bi-person-plus-fill"></i> &nbsp; AGREGAR EMPLEADO
				</h3>
				<p class="text-justify">
					Capturar los datos del nuevo empleado
				</p>
			</div>

			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a class="active" href="empleado-new.php"><i class="bi bi-person-plus-fill"></i> &nbsp; AGREGAR EMPLEADO</a>
					</li>
					<li>
						<a href="empleado-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE EMPLEADOS</a>
					</li>
					<!--<li>
						<a href="client-search.html"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR CLIENTE</a>
					</li>-->
				</ul>	
			</div>
			
			<!-- Contentenido-->
			<div class="container-fluid">
				<!-- formulario para registrar nuevo empleado -->
				<form  action="" class="form-neon" autocomplete="off" id="frmrempleado">
					<fieldset>
						<legend><i class="fas fa-user"></i> &nbsp; Información básica</legend>
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="curpe" class="bmd-label-floating">CURP</label>
										<input type="text" pattern="[a-zA-Z0-9-]{1,27}" class="form-control" name="curpe" id="curpe" maxlength="27">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="empleado_nombre" class="bmd-label-floating">Nombre</label>
										<input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control" name="empleado_nombre" id="empleado_nombre" maxlength="40">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="empleado_apellido" class="bmd-label-floating">Apellidos</label>
										<input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control" name="empleado_apellido" id="empleado_apellido" maxlength="40">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="empleado_email" class="bmd-label-floating">E-mail</label>
										<input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ#- ]{1,150}" class="form-control" name="empleado_email" id="empleado_email" maxlength="150">
									</div>
								</div>
							</div>
						</div>
					</fieldset>
					<br><br>
					<p class="text-center" style="margin-top: 40px;">
						<!-- boton para limpiar formulario -->
						<button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp; LIMPIAR</button>
						&nbsp; &nbsp;
						<!-- boton para guardar datos del empleado-->
						<span class="btn btn-raised btn-info btn-sm" id="registroe" ><i class="far fa-save"></i> &nbsp;GUARDAR</span>
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

	<!-- Funcion para agregar empleado -->
	<script type="text/javascript">
		$(document).ready(function(){
			$('#registroe').click(function(){
				// obtenemos los valores de los input
				var numCaracCURP = (document.getElementById("curpe").value).length; 
				var elementosCURP = document.getElementById("curpe").value; 
				var nombre = document.getElementById("empleado_nombre").value; 
				var apellido_paterno = document.getElementById("empleado_apellido").value; 
				var correo = document.getElementById("empleado_email").value;

				//EXPRESION REGULAR PARA LA VALIDACION DEL CORREO 
				re=/^([\da-z_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/ 
  
				//EXPRESION REGULAR PARA LA CURP 
				reCurp =  /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0\d|1[0-2])(?:[0-2]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/ 

				vacios=validarFormVacio('frmrempleado');
				if(vacios > 0){
					alertify.alert("Advertencia","Debes llenar todos los campos");
					return false;
				}else if(numCaracCURP < 18){ 
                 	alertify.alert("Advertencia", "La CURP debe tener 18 caracteres"); 
                 return false; 
				}else if(!reCurp.exec(elementosCURP)){ 
					alertify.alert("Advertencia", "La CURP no cuenta con la estructura correcta"); 
					return false; 
				}/*else if(nombre == ''){ 
					alertify.alert("Advertencia", "Ingrese su nombre"); 
					return false; 
				}else if(apellido_paterno == ''){ 
					alertify.alert("Advertencia", "Ingrese sus apellidos"); 
					return false; 
				}else if(correo == ''){ 
					alertify.alert("Advertencia", "Ingrese su correo electrónico"); 
					return false; 
				}*/else if(!re.exec(correo)){ 
					alertify.alert("Advertencia", "Correo ingresado invalido"); 
					return false; 
				}   

				
				
				datos=$('#frmrempleado').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"procesos/reglogin/registrarempleado.php",
					success:function(r){
						//alert(r);
						if(r==1){
							//limpia el formulario una vez agregado
							$('#frmrempleado')[0].reset();
							alertify.success("Empleado agregado con éxito");
						}else if(r==2){
							alertify.error("El empleado ya ha sido agregado");
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