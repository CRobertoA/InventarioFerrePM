<?php
	session_start();
	
	if(isset($_SESSION['usuario']) and $_SESSION['estado']== 1){
		
	
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Nueva entrada</title>

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
									<a href="producto-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR PRODUCTO</a>
								</li>
								<li>
									<a href="marca-new.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; AGREGAR MARCA</a>
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
							<a href="company.html"><i class="fas fa-shopping-cart fa-fw"></i> &nbsp; SALIDAS</a>
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
									<a href="entrada-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Nuevo préstamo</a>
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
            <!-- Page header -->
            <div class="full-box page-header">
                <h3 class="text-left">
                    <i class="fas fa-plus fa-fw"></i> &nbsp; NUEVA ENTRADA
                </h3>
                <p class="text-justify">
                    Capturar los datos de la nueva entrada
                </p>
            </div>
            <div class="container-fluid">
                <ul class="full-box list-unstyled page-nav-tabs">
                    <li>
                        <a class="active" href="entrada-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVA ENTRADA</a>
                    </li>
                    <li>
                        <a href="reservation-list.html"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE ENTRADAS</a>
                    </li>
                </ul>
            </div>
            
            <!--CONTENIDO-->
            <div class="container-fluid">
                    <div class="container-fluid">
                        <form action="" autocomplete="off">
                            <fieldset>
                                <p><i class="far fa-plus-square"></i> &nbsp; Información del producto</p>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12 col-md-3">
                                            <div class="form-group">
                                                <label for="listproducto" class="bmd-label-floating">Producto</label>
                                                    <?php
                                                        
                                                        $c= new conectar();
                                                        $conexion= $c->conexion();
                                                        $consulta="SELECT * from producto";
                                                        $ejecutar=mysqli_query($conexion, $consulta);
                                                    ?>
                                                <select class="form-control" name="listproducto" id="listproducto" onchange="agregaDatosProdu(event.target.value)">
                                                    <option value="A" selected="">Seleccione un producto</option>
                                                    <?php foreach ($ejecutar as $opciones): ?>
                                                    <option value="<?php echo $opciones['codigoproduc'] ?>"> <?php echo $opciones['nombre'] ?> </option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <div class="form-group">
                                                <label for="codigo_producto">Codigo de producto</label>
                                                <input type="text" class="form-control" name="codigo_producto" id="codigo_producto" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <div class="form-group">
                                                <label for="producto_producto">Nombre producto</label>
                                                <input type="text" class="form-control" name="producto_producto" id="producto_producto" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <div class="form-group">
                                                <label for="modelo_producto">Modelo</label>
                                                <input type="text" class="form-control" name="modelo_producto" id="modelo_producto" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="producto_fecha">Fecha registro</label>
                                                <input type="date" class="form-control" name="producto_fecha" id="producto_fecha">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="producto_cantidad" class="bmd-label-floating">Cantidad</label>
                                                <input type="text" pattern="[0-9.]{1,10}" class="form-control" name="producto_cantidad" id="producto_cantidad" maxlength="10">
                                            </div>
                                        </div>
                                        <!--<div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="producto_stock" class="bmd-label-floating">Stock actual</label>
                                                <input type="text" pattern="[0-9.]{1,10}" class="form-control" name="producto_stock" id="producto_stock" maxlength="10">
                                            </div>
                                        </div>-->
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="producto_observacion" class="bmd-label-floating">Observación</label>
                                                <input type="text" pattern="[a-zA-z0-9áéíóúÁÉÍÓÚñÑ#() ]{1,400}" class="form-control" name="producto_observacion" id="producto_observacion" maxlength="400">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <p class="text-center" style="margin-top: 40px;">
                                <span class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp; AGREGAR</span>
                            </p>
                        </form>
                    </div>
            </div>

           <div class="container-fluid">
				<div class="table-responsive">
                    <table class="table table-dark table-sm">
                        <thead>
                            <tr class="text-center roboto-medium">
                                <th>CODIGO PRODUCTO</th>
                                <th>PRODUCTO</th>
                                <th>MODELO</th>
                                <th>CANTIDAD</th>
                                <th>FECHA</th>
                                <th>TIPO ENTRADA</th>
                                <th>ELIMINAR</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center" >
                                <td>Codigo producto</td>
                                <td>Producto</td>
                                <td>Modelo producto</td>
                                <td>7</td>
                                <td>29-05-2022</td>
                                <td>Compra</td>
                                <td>
                                    <span class="btn btn-warning" title="Eliminar de la lista">
                                        <i class="bi bi-trash3-fill"></i>
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
				</div>
                    <p class="text-center" style="margin-top: 40px;">
                        <span class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp; AGREGAR ENTRADA</span>
                    </p>
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

    <!-- Funcion para rellenar imputs -->
	<script type="text/javascript">
        function agregaDatosProdu(idproducto){

            $.ajax({
                type:"POST",
                data:"idproducto=" + idproducto,
                url:"procesos/entradas/obtenDatosProdu.php",
                success:function(r){
                    dato=jQuery.parseJSON(r);

                    $('#codigo_producto').val(dato['codigoproduc']);
                    $('#producto_producto').val(dato['nombre']);
                    $('#modelo_producto').val(dato['modelo']);
                }
            });
        }

    </script>
</body>
</html>

<?php
	}else{
		header("location:index.php");
	}
?>