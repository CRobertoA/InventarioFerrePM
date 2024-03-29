<?php
	session_start();
	
	if(isset($_SESSION['usuario']) and $_SESSION['rolu']=="Administrador" and $_SESSION['estado']== 1){
		
	
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Generar reportes</title>

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

		<!-- Contenido de la pagina -->
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
					<i class="bi bi-file-earmark-text-fill"></i> &nbsp; REPORTES
				</h3>
				<p class="text-justify">
					Generar reportes del sistema
				</p>
			</div>

			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<!--<li>
						<a href="empleado-new.php"><i class="bi bi-person-plus-fill"></i> &nbsp; AGREGAR EMPLEADO</a>
					</li>-->
					<li>
						<a class="active" href="generar-reporte.php"><i class="bi bi-file-earmark-text-fill"></i> &nbsp; GENERAR REPORTE</a>
					</li>
					<!--<li>
						<a href="client-search.html"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR CLIENTE</a>
					</li>-->
				</ul>	
			</div>
			
			<!-- Contenido-->
			<div class="container-fluid">
                <form action="clases/reportes.php" method="POST" id="frmrReportes">
                    <div class="row text-center justify-content-center">
                        <div class="col-12 col-md-4" >
                            <div class="form-group">
                                <label for="selectTipoReporte" class="bmd-label-floating">Tipo Reporte</label>
                                <select class="form-control" name="selectTipoReporte" id="selectTipoReporte" class="mx-auto">
                                    <option value="A" selected="" >Seleccione una opción</option>
									<option value="1">Reporte productos stock minimo</option>
                                    <option value="2">Reporte productos</option>
                                    <option value="3">Reporte entradas</option>
                                    <option value="4">Reporte salidas</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row text-center justify-content-center">
                            <p class="form-group" id="divMarcaR" >
                                <label for="selectMarcaR" class="bmd-label-floating">Marca producto</label>
                                <?php 
                                    $consulta="SELECT * from marca";
                                    $ejecutar=mysqli_query($conexion, $consulta);
                                ?>
                                <select class="form-control" name="selectMarcaR" id="selectMarcaR" style="width : 350px;" >
                                    <option value="A" selected="" >Seleccione una opción</option>
                                    <option value="0">Todas las marcas</option>
                                    <?php foreach ($ejecutar as $opciones): ?>
                                        <option value="<?php echo $opciones['idmarca'] ?>"><?php echo $opciones['nombre'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </p>
                            <p class="form-group" id="divFechaIniR">
                                <label for="Fecha_inicioR">Fecha inicio</label>
                                <input type="date" class="form-control" name="Fecha_inicioR" id="Fecha_inicioR" style="width : 350px;">
                            </p>
                            <p class="form-group" id="divFechaFinR" style="margin-left: 50px;">
                                <label for="Fecha_finalR">Fecha final</label>
                                <input type="date" class="form-control" name="Fecha_finalR" id="Fecha_finalR" style="width : 350px;">
                            </p>
                        
                        <!--<div class="col-12 col-md-8">
                            <div class="table-responsive" id="divTablaR">
                        
                            </div>
                        </div>-->
                    </div>
                    <p class="text-center" style="margin-top: 40px;">
                        <button type="submit" class="btn btn-raised btn-info btn-sm" id="generaReporte"><i class="bi bi-file-earmark-spreadsheet"></i> &nbsp; GENERAR REPORTE</button>
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

	<!-- DataTables -->
	<script type="text/javascript" src="dataTables/datatables.min.js" ></script>

	<!-- Funcion para DataTables -->
	<script> 
          //$('#tablainventario').DataTable();  
          $(document).ready(function() {     
            $('#divTablaR').load('tablas/tabla-reportes.php');
            $('#tablainventario').DataTable({ 
             //para cambiar el lenguaje a español 
			 	"ordering": false,
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
        $(document).ready(function() {
			/*$('#generaReporte').click(function(){
				vacios=validarFormVacio('frmrReportes');
				if(vacios > 0){
					alertify.alert("Advertencia", "Debes llenar todos los campos");
					return false;
				}
			});*/

            $("#divMarcaR").hide();
            $("#divFechaIniR").hide();
            $("#divFechaFinR").hide();
            $("#selectTipoReporte").click(function() {
                if($("#selectTipoReporte").val()==1){
                    $("#divMarcaR").hide();
                    $("#divFechaIniR").hide();
                    $("#divFechaFinR").hide();
                } else if($("#selectTipoReporte").val()==2){
                    $("#divMarcaR").show();
                    $("#divFechaIniR").hide();
                    $("#divFechaFinR").hide();
                } else if($("#selectTipoReporte").val()==3){
                    $("#divMarcaR").hide();
                    $("#divFechaIniR").show();
                    $("#divFechaFinR").show();
                } else if($("#selectTipoReporte").val()==4){
                    $("#divMarcaR").hide();
                    $("#divFechaIniR").show();
                    $("#divFechaFinR").show();
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
		function refreshR() {
            window.location="generar-reporte.php";
        }
	</script>
	<!-- Obsiones de alertas -->
	<?php 
        if(isset($_GET["status"])){
            if($_GET["status"] === "1"){
    ?>
        <script type="text/javascript">
            alertify.success("Reporte generado con éxito");
            setTimeout(refreshR,4000);
        </script>
        <?php
            } else if($_GET["status"] === "2"){
        ?>
        <script type="text/javascript">
            alertify.alert("Advertencia","Debes seleccionar una marca");
            setTimeout(refreshR,4000);
        </script>
        <?php
            } else if($_GET["status"] === "3"){
        ?>
        <script type="text/javascript">
            alertify.alert("Advertencia","Debes seleccionar las fechas del reporte");
            setTimeout(refreshR,4000);
        </script>
		<?php
            } else if($_GET["status"] === "4"){
        ?>
        <script type="text/javascript">
            alertify.alert("Advertencia","Debes seleccionar un tipo de reporte");
            setTimeout(refreshR,4000);
        </script>
    <?php
            } 
        }
    ?>
	
</body>
</html>

<?php
	}else{
		header("location:index.php");
	}
?>