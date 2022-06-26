<?php
	session_start();
	
	if(isset($_SESSION['usuario']) and $_SESSION['estado']== 1){
		
	
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Lista de productos</title>

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

		$sql2="SELECT E.nombre, E.apellidos FROM empleado E INNER JOIN usuario U ON E.curp = U.curp  where U.idusuario = $idusu";
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
                    <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE PRODUCTOS
                </h3>
                <p class="text-justify">
                    Productos registrados en el sistema
                </p>
            </div>
            <div class="container-fluid">
                <ul class="full-box list-unstyled page-nav-tabs">
                    <li>
                        <a href="producto-new.php"><i class="bi bi-boxes"></i> &nbsp; AGREGAR PRODUCTO</a>
                    </li>
                    <li>
                        <a class="active" href="producto-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE PRODUCTOS</a>
                    </li>
                </ul>
            </div>
            
            <!--CONTENIDO-->
           <div class="container-fluid">
				<div class="table-responsive">
                    <?php
						$sql="SELECT pro.codigoproduc, pro.nombre, pro.modelo, pro.descripcion, pro.foto, pro.stockminimo, pro.stockmaximo, inv.stock
                                FROM inventario inv INNER JOIN producto pro ON pro.codigoproduc = inv.codigoproduc order by substring(pro.codigoproduc, 6);";
						$resultU= mysqli_query($conexion, $sql);
						$sql2="SELECT M.nombre FROM marca M INNER JOIN producto P ON M.idmarca = P.idmarca order by substring(P.codigoproduc, 6)";
						$resultU2= mysqli_query($conexion, $sql2);
					?>
					<!-- tabla para listar productos registrados -->
					<table class="table table-dark table-sm" id="tablaproducto">
						<thead>
							<tr class="text-center roboto-medium">
								<th>CÓDIGO</th>
								<th>NOMBRE</th>
								<th>MARCA</th>
                                <th>MODELO</th>
                                <th>DESCRIPCIÓN</th>
                                <th>STOCK MÍNIMO</th>
                                <th>STOCK MÁXIMO</th>
                                <th>IMAGEN</th>
								<th>EDITAR</th>
								<th>ELIMINAR</th>
							</tr>
						</thead>
						<tbody>
                            <!-- consulta rellena datos de producto -->
                            <?php
								while($ver=mysqli_fetch_row($resultU) and $ver2=mysqli_fetch_row($resultU2)):
							?>
							<tr class="text-center" >
								<td><?php echo $ver[0] ?></td>
								<td><?php echo $ver[1] ?></td>
								<td><?php echo $ver2[0] ?></td>
								<td><?php echo $ver[2] ?></td>
                                <td><?php echo $ver[3] ?></td>
                                <td><?php echo $ver[5] ?></td>
                                <td><?php echo $ver[6] ?></td>
                                <td>
                                    <?php 
                                        $imgVer=explode("/", $ver[4]) ; 
                                        $imgruta=$imgVer[2]."/".$imgVer[3];
                                    ?>
                                    <img width="65" height="65" src="<?php echo $imgruta ?>">
                                </td>
								<td>
                                    <!-- boton para actualizar producto -->
                                    <a href="producto-update.php?id=<?php echo $ver[0] ?>" class="btn btn-success" title="Editar producto" >
	  									<i class="bi bi-pen-fill"></i>	
									</a>
                                    <!--<a href="producto-update.php?id=<?php //echo $ver[0] ?>" class="btn btn-success" onclick="agregaDatosProducto('<?php //echo $ver[0] ?>')">
	  									<i class="bi bi-pen-fill"></i>	
									</a>-->
                                </td>
                                <td>
                                    <!-- boton para eliminar producto -->
                                    <?php if($ver[7] == 0){ ?>
                                    <!-- si la existencia del producto = o se puede eliminar -->
                                    <span class="btn btn-warning" title="Eliminar producto" onclick="eliminaProducto('<?php echo $ver[0] ?>')">
                                        <i class="bi bi-trash3-fill"></i>
                                    </span>
                                    <?php }else{ ?>
                                    <!-- si el producto tiene existencias no se puede eliminar -->
                                    <span class="btn btn-secondary" title="Eliminar producto">
                                        <i class="bi bi-trash3-fill"></i>
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

    <!-- Funcion para DataTables -->
	<script> 
          //$('#tablaempleado').DataTable();  
          $(document).ready(function() {     
              $('#tablaproducto').DataTable({ 
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

    <!-- funcion para eliminar producto -->
    <script type="text/javascript">
        function eliminaProducto(idProducto){
			alertify.confirm("Advertencia",'¿Desea eliminar este producto?', function(){ 
				$.ajax({
					type:"POST",
					data:"idproducto=" + idProducto,
					url:"procesos/productos/eliminarProducto.php",
					success:function(r){
                        //alert(r);
						if(r==1){
							//$('#tablaArticulosLoad').load("articulos/tablaArticulos.php");
                            location.reload();
							alertify.success("Producto eliminado con éxito");
						}else{
							alertify.error("Error al eliminar ");
						}
					}
				});
			}, function(){ 
				alertify.error('Cancelo!')
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

    <!--<script type="text/javascript">
        function agregaDatosProducto(idproducto){
            $.ajax({
                type:"POST",
				data:"idpro=" + idproducto,
				url:"procesos/productos/obtenDatosProducto.php",
                success:function(r){
                    alert(r);
                    dato= jQuery.parseJSON(r);
                    $('#idproductoA').val(dato['codigoproduc']);
                    $('clases/Productos.php/#producto_nombreU').val(dato['nombre']);
                    $('#producto_modeloU').val(dato['modelo']);
                    $('#producto_descripcionU').val(dato['descripcion']);
                    $('#producto_marcaU').val(dato['idmarca']);
                    $('#producto_sminU').val(dato['stockminimo']);
                    $('#producto_smaxU').val(dato['stockmaximo']);
                }
            });
        }
    </script>-->
</body>
</html>

<?php
	}else{
		header("location:index.php");
	}
?>