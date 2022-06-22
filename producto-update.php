<?php
	session_start();
	
	if(isset($_SESSION['usuario']) and $_SESSION['estado']== 1){
		
	
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Actualizar producto</title>

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
                <a href="#" class="btn-exit-system">
                    <i class="fas fa-power-off"></i>
                </a>
            </nav>
            <!-- Cabecera de pagina -->
            <div class="full-box page-header">
                <h3 class="text-left">
                    <i class="fas fa-sync-alt fa-fw"></i> &nbsp; EDITAR PRODUCTO
                </h3>
                <p class="text-justify">
                    Editar los datos del producto seleccionado
                </p>
            </div>
            <div class="container-fluid">
                <ul class="full-box list-unstyled page-nav-tabs">
                    <li>
                        <a href="producto-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR PRODUCTO</a>
                    </li>
                    <li>
                        <a href="producto-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE PRODUCTOS</a>
                    </li>
                </ul>
            </div>
            
            <!--CONTENIDO-->
            <div class="container-fluid">
                    <?php
						$id = $_GET['id'];
						$sql="SELECT * FROM producto where codigoproduc = '$id'";
						$resultPU= mysqli_query($conexion, $sql);
						$ver=mysqli_fetch_row($resultPU);
						
					?>
				<form class="form-neon" autocomplete="off" id="frmrproductoAct" enctype="multipart/form-data">
					<fieldset>
						<legend><i class="bi bi-tools"></i> &nbsp; Información del producto</legend>
						<div class="container-fluid">
							<div class="row">
                            <div class="col-12 col-md-6">
									<div class="form-group">
                                        <input type="text" hidden="" id="idproductoA" name="idproductoA" value="<?php echo $ver[0] ?>">
										<label for="producto_nombreU" >Nombre del producto</label>
										<input type="text" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{1,45}" class="form-control" name="producto_nombreU" id="producto_nombreU" maxlength="45" value="<?php echo $ver[3] ?>">
									</div>
								</div>
								
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="producto_modeloU" >Modelo</label>
										<input type="text" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9()- ]{1,140}" class="form-control" name="producto_modeloU" id="producto_modeloU" maxlength="45" value="<?php echo $ver[4] ?>">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="producto_descripcionU" >Descripción</label>
										<input type="num" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9()- ]{1,190}" class="form-control" name="producto_descripcionU" id="producto_descripcionU" maxlength="140" value="<?php echo $ver[5] ?>">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="producto_marcaU" class="bmd-label-floating">Marca</label>
										<select class="form-control" name="producto_marcaU" id="producto_marcaU" >
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
										<label for="producto_sminU" class="bmd-label-floating">Stock minimo</label>
										<input type="text" pattern="[0-9]{1,9}" class="form-control" name="producto_sminU" id="producto_sminU" maxlength="190" value="<?php echo $ver[7] ?>">
									</div>
								</div>
                                <div class="col-12 col-md-6">
									<div class="form-group">
										<label for="producto_smaxU" class="bmd-label-floating">Stock maximo</label>
										<input type="text" pattern="[0-9]{1,9}" class="form-control" name="producto_smaxU" id="producto_smaxU" maxlength="190" value="<?php echo $ver[8] ?>">
									</div>
								</div>
                                <!--<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="producto_imgU" class="bmd-label-floating">Imagen del producto</label>
										<input type="file" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9()- ]{1,190}" class="form-control" name="producto_imgU" id="producto_imgU" maxlength="190">
									</div>
								</div>-->
							</div>
						</div>
					</fieldset>
					<br><br>
					<p class="text-center" style="margin-top: 40px;">
						<span  class="btn btn-raised btn-success btn-sm" id="actualizaProducto"><i class="fas fa-sync-alt"></i> &nbsp; ACTUALIZAR</span>
                        <a href="producto-list.php" class="btn btn-raised btn-secondary btn-sm"><i class="bi bi-chevron-double-left"></i> &nbsp; VOLVER</a>
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

	<!-- Actualizar producto -->
	<script type="text/javascript">
		$(document).ready(function(){
			$('#actualizaProducto').click(function(){

				// obtenemos los valores de los input 
				var stockmini = document.getElementById("producto_sminU").value; 
				var stockmaxi = document.getElementById("producto_smaxU").value; 

				vacios=validarFormVacio('frmrproductoAct');
				if(vacios > 0){
					alertify.alert("Advertencia","Debes llenar todos los campos");
					return false;
				}else if(stockmini <= 0){ 
                 	alertify.alert("Advertencia", "El stock minimo debe ser mayor a 0"); 
                 return false; 
				}else if(stockmaxi <= 0){ 
					alertify.alert("Advertencia", "El stock maximo debe ser mayor a 0"); 
					return false; 
				}else if(parseInt(stockmaxi) <= parseInt(stockmini)){ 
					alertify.alert("Advertencia", "El stock maximo debe ser mayor al stock minimo"); 
					return false; 
				}
				
				datos=$('#frmrproductoAct').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"procesos/productos/actualizarProducto.php",
					success:function(r){
						//alert(r);
						//comsole.log(r);
						if(r==1){
							//window.location="empleado-list.php";
							alertify.success("Producto actualizado con éxito");
							//alert("Empleado actualizado con exito");
							
						}else{
							alertify.error("Error al actualizar");
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