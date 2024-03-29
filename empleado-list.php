<?php
	session_start();
	
	if(isset($_SESSION['usuario']) and $_SESSION['rolu']=="Administrador" and $_SESSION['estado']== 1){
		
	
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Lista de empleados</title>

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

	<!-- DataTable -->
	<link rel="stylesheet" type="text/css" href="dataTables/datatables.min.css" />
	<link rel="stylesheet" type="text/css" href="dataTables/DataTables-1.11.5/css/dataTables.bootstrap4.min.css" />

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
					<i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE EMPLEADOS
				</h3>
				<p class="text-justify">
					Empleados registrados en el sistema
				</p>
			</div>

			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a href="empleado-new.php"><i class="bi bi-person-plus-fill"></i> &nbsp; AGREGAR EMPLEADO</a>
					</li>
					<li>
						<a class="active" href="empleado-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE EMPLEADOS</a>
					</li>
					<!--<li>
						<a href="client-search.html"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR CLIENTE</a>
					</li>-->
				</ul>	
			</div>
			
			<!-- Content here-->
			<div class="container-fluid">
				<div class="table-responsive">
					<?php
						$sql="SELECT E.curp, E.nombre, E.apellidoP, E.apellidoM, E.estado, E.email, E.telefono, E.callenumero, E.colonia, ES.estado, M.municipio, L.localidad
							FROM empleado E INNER JOIN t_estado ES ON E.id_estado = ES.id_estado
							INNER JOIN t_municipio M ON E.id_municipio = M.id_municipio
							INNER JOIN t_localidad L ON E.id_localidad = L.id_localidad;";
						$resultE= mysqli_query($conexion, $sql);
					?>
					<!--tabla para listar los empleados registrados -->
					<table class="table table-dark table-sm" id="tablaempleado">
						<thead>
							<tr class="text-center roboto-medium">
								<th>CURP</th>
								<th>NOMBRE</th>
								<th>E-MAIL</th>
								<th>TELEFONO</th>
								<th>DIRECCIÓN</th>
								<th>ESTADO</th>
								<th>EDITAR</th>
								<th>ACTUALIZAR</th>
							</tr>
						</thead>
						<tbody>
							<!-- while para listar los datos de la bd -->
							<?php
								while($ver=mysqli_fetch_row($resultE)):
							?>
							<tr class="text-center" >
								<td><?php echo $ver[0] ?></td>
								<td><?php echo $ver[1]. " " .$ver[2]. " " .$ver[3] ?></td>
								<td><?php echo $ver[5] ?></td>
								<td><?php echo $ver[6] ?></td>
								<td><?php echo $ver[7]. ", " .$ver[9]. ", " .$ver[10]. ", " .$ver[11]?></td>
								<td>
									<?php if($ver[4] == 1){ ?>
										<button class="btn btn-success">
		  									Activo
										</button>
									<?php }else{ ?>
										<button class="btn btn-warning">
		  									Inactivo
										</button>
									<?php } ?>
								</td>
								<td>
									<a href="empleado-update.php?id=<?php echo $ver[0] ?>" class="btn btn-success" title="Editar empleado">
	  									<i class="fas fa-user-cog"></i>	
									</a>
									<!--<a href="empleado-update.php" class="btn btn-success" onclick="agregaDato('<?php //echo $ver[0] ?>','<?php //echo $ver[1] ?>')" >
	  									<i class="fas fa-sync-alt"></i>	
									</a>-->
								</td>
								<td>
									<?php if($ver[4] == 1){ ?>
										<span class="btn btn-warning" title="Desactivar empleado" onclick="desactivaEmpleado('<?php echo $ver[0]; ?>')">
		  									<i class="bi bi-emoji-dizzy-fill"></i>
										</span>
									<?php }else{ ?>
										<span class="btn btn-success" title="Activar empleado" onclick="activaEmpleado('<?php echo $ver[0]; ?>')">
		  									<i class="bi bi-emoji-smile-fill"></i>
										</span>
									<?php }?>
								</td>
							</tr>
							<?php
								endwhile;
							?>
						</tbody>
					</table>
				</div>
				<!--<nav aria-label="Page navigation example">
					<ul class="pagination justify-content-center">
						<li class="page-item disabled">
							<a class="page-link" href="#" tabindex="-1">Previous</a>
						</li>
						<li class="page-item"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item">
							<a class="page-link" href="#">Next</a>
						</li>
					</ul>
				</nav>-->
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

	<!-- DataTables -->
	<script type="text/javascript" src="dataTables/datatables.min.js" ></script>
	
	<!-- Funcion para desactivar/activar el empleado -->
	<script type="text/javascript">
		function desactivaEmpleado(idempleado){
			$.ajax({
				type:"POST",
				data:"idempleado=" + idempleado,
				url:"procesos/reglogin/desactivarempleado.php",
				success:function(r){
					if(r==1){
						//recarga la pagina actual
						location.reload();
						//$('#tablaEmpleadoLoad').load('tablas/tablaEmpleados.php');
					}else{
						alertify.error("Error al actualizar estado");
					}
				}
			});
		}
		
		function activaEmpleado(idempleado){
			$.ajax({
				type:"POST",
				data:"idempleado=" + idempleado,
				url:"procesos/reglogin/activarempleado.php",
				success:function(r){
					if(r==1){
						//recarga la pagina actual
						location.reload();
						//$('#tablaEmpleadoLoad').load('tablas/tablaEmpleados.php');
					}else{
						alertify.error("Error al actualizar estado");
					}
				}
			});
		}

		function cerrarSesion(){
			alertify.confirm("Cerrando sesión",'¿Seguro que desea cerrar sesión?', function(){
				window.location="procesos/reglogin/salir.php";
			}, function(){ 
				alertify.error('Cancelo!')
			}).set('labels', {ok:'Si, salir!', cancel:'No, cancelar'});
		}
	</script>

	<!-- Funcion para DataTables -->
	<script> 
          //$('#tablaempleado').DataTable();  
          $(document).ready(function() {     
              $('#tablaempleado').DataTable({ 
             //para cambiar el lenguaje a español 
                 "language": { 
                         "lengthMenu": "Mostrar _MENU_ registros", 
                         "zeroRecords": "No se encontró ninguna coincidencia", 
                         "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros", 
                         "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros", 
                         "infoFiltered": "(filtrado de un total de _MAX_ registros)", 
                         "sSearch": "Buscar:", 
                         "oPaginate": { 
                             "sFirst": "Primero", 
                             "sLast":"Último", 
                             "sNext":"Siguiente", 
                             "sPrevious": "Anterior" 
                         }, 
                         "sProcessing":"Procesando...", 
                     } 
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