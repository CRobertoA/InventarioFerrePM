<?php
	session_start();
	
	if(isset($_SESSION['usuario']) and $_SESSION['estado']== 1){
		
	
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Nuevo producto</title>

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
							<a href="company.html"><i class="fas bi bi-box2-fill fa-fw"></i> &nbsp; ENTRADAS</a>
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
                    <i class="bi bi-boxes "></i> &nbsp; AGREGAR PRODUCTO
                </h3>
                <p class="text-justify">
                Capturar los datos del nuevo producto
                </p>
            </div>
            <div class="container-fluid">
                <ul class="full-box list-unstyled page-nav-tabs">
                    <li>
                        <a class="active" href="producto-new.php"><i class="bi bi-boxes"></i> &nbsp; AGREGAR PRODUCTO</a>
                    </li>
                    <li>
                        <a href="producto-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE PRODUCTOS</a>
                    </li>
                    <!--<li>
                        <a href="item-search.html"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR ITEM</a>
                    </li>-->
                </ul>
            </div>
            
            <!--CONTENIDO-->
            <div class="container-fluid">
                <!-- formulario para ingresar datos de nuevo producto -->
				<form action="" class="form-neon" autocomplete="off" id="frmrproducto" enctype="multipart/form-data">
					<fieldset>
						<!--<legend><i class="far fa-plus-square"></i> &nbsp; Información del producto</legend>-->
                        <legend><i class="bi bi-tools"></i> &nbsp; Información del producto</legend>
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="producto_nombre" class="bmd-label-floating">Nombre del producto</label>
										<input type="text" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{1,45}" class="form-control" name="producto_nombre" id="producto_nombre" maxlength="45">
									</div>
								</div>
								
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="producto_modelo" class="bmd-label-floating">Modelo</label>
										<input type="text" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9()- ]{1,140}" class="form-control" name="producto_modelo" id="producto_modelo" maxlength="45">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="producto_descripcion" class="bmd-label-floating">Descripción</label>
										<input type="num" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9()- ]{1,190}" class="form-control" name="producto_descripcion" id="producto_descripcion" maxlength="140">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="producto_marca" class="bmd-label-floating">Marca</label>
										<select class="form-control" name="producto_marca" id="producto_marca">
                                            <?php
												
												$c= new conectar();
            									$conexion= $c->conexion();
												$consulta="SELECT * from marca";
												$ejecutar=mysqli_query($conexion, $consulta);
											?>
											<option value="A" selected="">Seleccione una marca</option>
                                            <?php foreach ($ejecutar as $opciones): ?>
                                                <option value="<?php echo $opciones['idmarca'] ?>"><?php echo $opciones['nombre'] ?></option>
                                            <?php endforeach ?>
										</select>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="producto_smin" class="bmd-label-floating">Stock minimo</label>
										<input type="text" pattern="[0-9]{1,9}" class="form-control" name="producto_smin" id="producto_smin" maxlength="190">
									</div>
								</div>
                                <div class="col-12 col-md-6">
									<div class="form-group">
										<label for="producto_smax" class="bmd-label-floating">Stock maximo</label>
										<input type="text" pattern="[0-9]{1,9}" class="form-control" name="producto_smax" id="producto_smax" maxlength="190">
									</div>
								</div>
                                <div class="col-12 col-md-6">
									<div class="form-group">
										<label for="producto_img" class="bmd-label-floating">Imagen del producto</label>
										<input type="file" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9()- ]{1,190}" class="form-control" name="producto_img" id="producto_img" maxlength="190">
									</div>
								</div>
							</div>
						</div>
					</fieldset>
					<br>
					<p class="text-center" style="margin-top: 40px;">
						<button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp; LIMPIAR</button>
						&nbsp; &nbsp;
						<span class="btn btn-raised btn-info btn-sm" id="registrop"><i class="far fa-save"></i> &nbsp; GUARDAR</span>
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

    <!-- Alertify -->
	<script src="alertify/alertify.min.js"></script>

	<!-- registrar producto -->
	<script type="text/javascript">
		$(document).ready(function(){
			$('#registrop').click(function(){

				// obtenemos los valores de los input 
				var stockmin = document.getElementById("producto_smin").value; 
				var stockmax = document.getElementById("producto_smax").value; 

				vacios=validarFormVacio('frmrproducto');
				if(vacios > 0){
					alertify.alert("Advertencia", "Debes llenar todos los campos");
					return false;
				}else if(stockmin <= 0){ 
                 	alertify.alert("Advertencia", "El stock minimo debe ser mayor a 0"); 
                 return false; 
				}else if(stockmax <= 0){ 
					alertify.alert("Advertencia", "El stock maximo debe ser mayor a 0"); 
					return false; 
				}else if(parseInt(stockmaxi) <= parseInt(stockmini)){ 
					alertify.alert("Advertencia", "El stock maximo debe ser mayor al stock minimo"); 
					return false; 
				}

				var formData = new FormData(document.getElementById("frmrproducto"));

				$.ajax({
					url: "procesos/productos/registrarProducto.php",
					type: "post",
					dataType: "html",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,

					success:function(r){
                        //alert(r);
						
						if(r == 1){
							$('#frmrproducto')[0].reset();
							//$('#tablaArticulos').load('articulos/tablaArticulos.php');
							alertify.success("Producto agregado con exito");
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