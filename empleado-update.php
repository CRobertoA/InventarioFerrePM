<?php
	session_start();
	
	if(isset($_SESSION['usuario']) and $_SESSION['rolu']=="Administrador" and $_SESSION['estado']== 1){
		
	
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Actualizar empleado</title>

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
					<i class="fas fa-user-cog fa-fw"></i> &nbsp; EDITAR EMPLEADO
				</h3>
				<p class="text-justify">
					Editar los datos del empleado seleccionado
				</p>
			</div>

			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a href="empleado-new.php"><i class="bi bi-person-plus-fill"></i> &nbsp; AGREGAR EMPLEADO</a>
					</li>
					<li>
						<a href="empleado-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE EMPLEADOS</a>
					</li>
					<!--<li>
						<a href="client-search.html"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR CLIENTE</a>
					</li>-->
				</ul>	
			</div>
			
			<!-- Content here-->
			<div class="container-fluid">
					<?php
						$id = $_GET['id'];
						$sql="SELECT * FROM empleado where curp = '$id'";
						$resultEU= mysqli_query($conexion, $sql);
						$ver=mysqli_fetch_row($resultEU);

						$id_localidad = $ver[11];
						$id_municipio = $ver[10];
						$id_estado = $ver[9];

						$queryE = "SELECT id_estado, estado FROM t_estado ORDER BY estado";
						$resultadoE = mysqli_query($conexion, $queryE);

						$queryM = "SELECT id_municipio, municipio FROM t_municipio WHERE id_estado = '$id_estado' ORDER BY municipio";
						$resultadoM = mysqli_query($conexion, $queryM);

						$queryL = "SELECT id_localidad, localidad FROM t_localidad WHERE id_municipio = '$id_municipio' ORDER BY localidad";
						$resultadoL = mysqli_query($conexion, $queryL);

					?>
				<form class="form-neon" autocomplete="off" id="frmrempleadoAct">
					<fieldset>
						<legend><i class="fas fa-user"></i> &nbsp; Información básica</legend>
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="curpeu" >CURP</label>
										<input type="text" pattern="[a-zA-Z0-9-]{1,27}" class="form-control" name="curpeu" id="curpeu" maxlength="27" readonly="readonly" value="<?php echo $ver[0] ?>"> 
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="empleado_nombre" >Nombre</label>
										<input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control" name="empleado_nombre" id="empleado_nombre" maxlength="40" readonly="readonly" value="<?php echo $ver[1] ?>">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="empleado_apellido" >Apellido Paterno</label>
										<input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control" name="empleado_apellido" id="empleado_apellido" maxlength="40" readonly="readonly" value="<?php echo $ver[2] ?>">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="empleado_apellidoM" class="bmd-label-floating">Apellido materno</label>
										<input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control" name="empleado_apellidoM" id="empleado_apellidoM" maxlength="40" readonly="readonly" value="<?php echo $ver[3] ?>">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="empleado_email" >E-mail</label>
										<input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ#- ]{1,150}" class="form-control" name="empleado_email" id="empleado_email" maxlength="150" value="<?php echo $ver[5] ?>">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="empleado_tel" class="bmd-label-floating">Telefono</label>
										<input type="text" pattern="[0-9]{1,}" class="form-control" name="empleado_tel" id="empleado_tel" maxlength="150" value="<?php echo $ver[6] ?>">
									</div>
								</div>
							</div>
						</div>
						<legend><i class="bi bi-geo-fill"></i> &nbsp; Dirección</legend>
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="empleado_calle" class="bmd-label-floating">Calle y número</label>
										<input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ#- ]{1,150}" class="form-control" name="empleado_calle" id="empleado_calle" maxlength="100" value="<?php echo $ver[7] ?>">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="empleado_colonia" class="bmd-label-floating">Colonia</label>
										<input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control" name="empleado_colonia" id="empleado_colonia" maxlength="100" value="<?php echo $ver[8] ?>">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="cbx_estado" class="bmd-label-floating">Estado</label>
										<select class="form-control" name="cbx_estado" id="cbx_estado" >
											<option value="A" selected="" >Seleccione un estado</option>
											<?php while($rowE = $resultadoE->fetch_assoc()) { ?>
												<option value="<?php echo $rowE['id_estado'] ?>" <?php if($rowE['id_estado']==$id_estado) { echo 'selected'; } ?>> <?php echo $rowE['estado'] ?> </option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="cbx_municipio" class="bmd-label-floating">Municipio</label>
										<select class="form-control" name="cbx_municipio" id="cbx_municipio" >
										<?php while($rowM = $resultadoM->fetch_assoc()) { ?>
											<option value="<?php echo $rowM['id_municipio']; ?>" <?php if($rowM['id_municipio']==$id_municipio) { echo 'selected'; } ?>><?php echo $rowM['municipio']; ?></option>
										<?php } ?>
										</select>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="cbx_localidad" class="bmd-label-floating">Localidad</label>
										<select class="form-control" name="cbx_localidad" id="cbx_localidad" >
										<?php while($rowL = $resultadoL->fetch_assoc()) { ?>
											<option value="<?php echo $rowL['id_localidad']; ?>" <?php if($rowL['id_localidad']==$id_localidad) { echo 'selected'; } ?>><?php echo $rowL['localidad']; ?></option>
										<?php } ?>
										</select>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
					<br><br>
					<p class="text-center" style="margin-top: 40px;">
						<span class="btn btn-raised btn-success btn-sm" id="actualizaEmpleado"><i class="fas fa-sync-alt"></i> &nbsp; ACTUALIZAR</span>
						<a href="empleado-list.php" class="btn btn-raised btn-secondary btn-sm"><i class="bi bi-chevron-double-left"></i> &nbsp; VOLVER</a>
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
			jQuery("#empleado_tel").on('input', function (evt) {
				// Allow only numbers.
				jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
			});
			$('#actualizaEmpleado').click(function(){

				var correo = document.getElementById("empleado_email").value;
				//EXPRESION REGULAR PARA LA VALIDACION DEL CORREO 
				re=/^([\da-z_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/ 

				vacios=validarFormVacio('frmrempleadoAct');
				if(vacios > 0){
					alertify.alert("Advertencia","Debes llenar todos los campos");
					return false;
				}else if(!re.exec(correo)){ 
					alertify.alert("Advertencia", "Correo ingresado invalido"); 
					return false; 
				}   
				
				datos=$('#frmrempleadoAct').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"procesos/reglogin/actualizarempleado.php",
					success:function(r){
						//alert(r);
						if(r==1){
							//window.location="empleado-list.php";
							alertify.success("Empleado actualizado con éxito");
							//alert("Empleado actualizado con exito");
							
						}else{
							alertify.error("Error al actualizar");
						}
					}
				});
			});
		});
	</script>
		<script language="javascript">
			$(document).ready(function(){
				$("#cbx_estado").change(function () {
					
					$('#cbx_localidad').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					
					$("#cbx_estado option:selected").each(function () {
						id_estado = $(this).val();
						$.post("includes/getMunicipio.php", { id_estado: id_estado }, function(data){
							$("#cbx_municipio").html(data);
						});            
					});
				})
			});
			
			$(document).ready(function(){
				$("#cbx_municipio").change(function () {
					$("#cbx_municipio option:selected").each(function () {
						id_municipio = $(this).val();
						$.post("includes/getLocalidad.php", { id_municipio: id_municipio }, function(data){
							$("#cbx_localidad").html(data);
						});            
					});
				})
			});
		</script>
</body>
</html>

<?php
	}else{
		header("location:index.php");
	}
?>