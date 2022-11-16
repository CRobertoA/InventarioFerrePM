<?php
	session_start();
	
	if(isset($_SESSION['usuario']) and $_SESSION['rolu']=="Administrador" and $_SESSION['estado']== 1){
		
	
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Lista usuarios</title>

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
	<!-- Contenedor principal -->
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

			<!-- Cabecera de pagina -->
			<div class="full-box page-header">
				<h3 class="text-left">
					<i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE USUARIOS
				</h3>
				<p class="text-justify">
					Usuarios registrados en el sistema
				</p>
			</div>
			
			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a href="user-new.php"><i class="bi bi-person-plus-fill"></i> &nbsp; NUEVO USUARIO</a>
					</li>
					<li>
						<a class="active" href="user-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE USUARIOS</a>
					</li>
					<!--<li>
						<a href="user-search.html"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR USUARIO</a>
					</li>-->
				</ul>	
			</div>
			
			<!-- Contenido -->
			<div class="container-fluid">
				<div class="table-responsive">
					<?php
						$sql="SELECT * FROM usuario";
						$resultU= mysqli_query($conexion, $sql);
						$sql2="SELECT E.nombre, E.apellidoP, E.apellidoM FROM empleado E INNER JOIN usuario U ON E.curp = U.curp order by u.idusuario ";
						$resultU2= mysqli_query($conexion, $sql2);
					?>
					<!-- tabla para listar usuarios registrados -->
					<table class="table table-dark table-sm" id="tablausuario">
						<thead>
							<tr class="text-center roboto-medium">
								<th>#</th>
								<th>NOMBRE</th>
								<th>USUARIO</th>
								<th>CARGO</th>
								<th>ESTADO</th>
								<th>EDITAR</th>
								<th>ACTUALIZAR</th>
							</tr>
						</thead>
		
						<tbody>
							<!-- consulta rellena datos de usuario -->
							<?php
								while($ver=mysqli_fetch_row($resultU) and $ver2=mysqli_fetch_row($resultU2)):
							?>
							<tr class="text-center" >
								<td><?php echo $ver[0] ?></td>
								<th><?php echo $ver2[0]. " " .$ver2[1]. " " .$ver2[2] ?></th>
								<th><?php echo $ver[2] ?></th>
								<th><?php echo $ver[4] ?></th>
								<td>
									<?php if($ver[5] == 1){ ?>
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
									<!-- boton para actualizar empleado -->
									<a href="user-update.php?id=<?php echo $ver[0] ?>" class="btn btn-success" title="Editar usuario">
	  									<i class="fas fa-user-cog"></i>	
									</a>
								</td>
								<td>
									<!-- boton para activar/desactivar empleado -->
									<?php if($ver[5] == 1){ ?>
										<span class="btn btn-warning" title="Desactivar usuario" onclick="desactivaUsuario('<?php echo $ver[0]; ?>')">
		  									<i class="bi bi-emoji-dizzy-fill"></i>
										</span>
									<?php }else{ ?>
										<span class="btn btn-success" title="Activar usuario" onclick="activaUsuario('<?php echo $ver[0]; ?>')">
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

	<!-- Alertify -->
	<script src="alertify/alertify.min.js"></script>

	<!-- DataTables -->
	<script type="text/javascript" src="dataTables/datatables.min.js" ></script>

	<!-- Funcion para desactivar/activar el empleado -->
	<script type="text/javascript">
		function desactivaUsuario(idusuario){
			$.ajax({
				type:"POST",
				data:"idusuario=" + idusuario,
				url:"procesos/usuarios/desactivarusuario.php",
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

		function activaUsuario(idusuario){
			$.ajax({
				type:"POST",
				data:"idusuario=" + idusuario,
				url:"procesos/usuarios/activarusuario.php",
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
              $('#tablausuario').DataTable({ 
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