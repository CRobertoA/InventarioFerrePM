<?php
	session_start();
	
	if(isset($_SESSION['usuario']) and $_SESSION['estado']== 1){
		
	
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Lista de salidas</title>

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
    <script src="./js/sweetalert2.min.js"></script>

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
                    <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE SALIDAS
                </h3>
                <p class="text-justify">
					Salidas registradas en el sistema
                </p>
            </div>
            <div class="container-fluid">
                <ul class="full-box list-unstyled page-nav-tabs">
                    <li>
                        <a href="salida-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVA SALIDA</a>
                    </li>
                    <li>
                        <a class="active" href="salida-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE SALIDAS</a>
                    </li>
                </ul>
            </div>
            
            <!--CONTENIDO-->
			 <div class="container-fluid">
				<div class="table-responsive">
					<?php
						$sql="SELECT S.folio_salida, S.fecha, EM.nombre, EM.apellidoP, S.tipo_salida, GROUP_CONCAT(	P.codigoproduc, '..',  P.nombreproducto, '..', D.lote_producto SEPARATOR '__') AS productos 
						FROM salida S INNER JOIN detalle_salida D ON S.folio_salida = D.folio_salida
						INNER JOIN inventario I ON D.idinventario = I.idinventario
						INNER JOIN producto P ON I.codigoproduc = P.codigoproduc
						INNER JOIN usuario U ON S.idusuario = U.idusuario
						INNER JOIN empleado EM ON U.curp = EM.curp
						GROUP BY S.folio_salida ORDER BY S.folio_salida;";
						$resultU= mysqli_query($conexion, $sql);
					?>
					<!-- tabla para listar salidas registrados -->
					<table class="table table-dark table-sm" id="tablasalida">
						<thead>
							<tr class="text-center roboto-medium">
								<th>FOLIO SALIDA</th>
								<th>FECHA REGISTRO</th>
								<th>USUARIO REGISTRO</th>
								<th>TIPO SALIDA</th>
								<th>PRODUCTOS</th>
							</tr>
						</thead>
						<tbody>
							<!-- consulta rellena datos de salida -->
							<?php
								while($ver=mysqli_fetch_row($resultU)):
							?>
							<tr class="text-center" >
								<td><?php echo $ver[0] ?></td>
								<td><?php echo $ver[1] ?></td>
								<td><?php echo $ver[2]." ".$ver[3] ?></td>
								<td><?php echo $ver[4] ?></td>
								<td>
									<table class="table table-bordered table-xs">
									<thead>
										<tr class="text-center">
											<th>Código</th>
											<th>Nombre</th>
											<th>lote</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach(explode("__", $ver[5]) as $productosConcatenados){ 
										$producto = explode("..", $productosConcatenados)
										?>
										<tr>
											<td><?php echo $producto[0] ?></td>
											<td><?php echo $producto[1] ?></td>
											<td><?php echo $producto[2] ?></td>
										</tr>
										<?php } ?>
									</tbody>
									</table>
								</td>
								<!--<td>
									<a href="#" class="btn btn-info">
	  									<i class="fas fa-file-pdf"></i>	
									</a>
								</td>-->
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

    <!-- Funcion para DataTables -->
	<script> 
          //$('#tablaempleado').DataTable();  
          $(document).ready(function() {     
              $('#tablasalida').DataTable({ 
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