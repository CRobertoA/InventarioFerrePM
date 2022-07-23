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
                <!--<a href="#" class="btn-exit-system">
					<i class="fas fa-power-off"></i>
				</a>-->
				<a onclick="cerrarSesion();" title="Cerrar sesion">
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
										<input type="text" hidden="" class="form-control" name="generacodigo" id="generacodigo" maxlength="45">
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
										<input type="text" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9()- ]{1,190}" class="form-control" name="producto_descripcion" id="producto_descripcion" maxlength="140">
									</div>
								</div>
								<div class="col-12 col-md-4">
									<div class="form-group" id="divMarca">
										
										
									</div>
								</div>
								<div class="col-12 col-md-2">
									<div class="form-group">
										<label for="producto_descripcion" class="bmd-label-floating">Marca nueva</label>
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalMarca"><i class="bi bi-plus-square-dotted"></i> &nbsp; Marca</button>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="producto_smin" class="bmd-label-floating">Stock minimo</label>
										<input type="number" min="1" pattern="[0-9]{1,}" class="form-control" name="producto_smin" id="producto_smin" maxlength="190">
									</div>
								</div>
                                <div class="col-12 col-md-6">
									<div class="form-group">
										<label for="producto_smax" class="bmd-label-floating">Stock maximo</label>
										<input type="number" min="1" pattern="[0-9]{1,}" class="form-control" name="producto_smax" id="producto_smax" maxlength="190">
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

			<!-- MODAL MARCA -->
            <div class="modal fade" id="ModalMarca" tabindex="-1" role="dialog" aria-labelledby="ModalMarca" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalMarca">Agregar marca</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form autocomplete="off" id="frmrmarcaM">
                            <fieldset>
                                <p><i class="far fa-plus-square"></i> &nbsp; Información de la marca</p>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12 col-md-8">
                                            <div class="form-group">
                                                <label for="marca_nombre">Nombre marca</label>
                                                <input type="text" class="form-control" name="marca_nombre" id="marca_nombre">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <p class="text-center" style="margin-top: 40px;">
                                <!-- boton para guardar datos de la marca-->
								<span class="btn btn-raised btn-info btn-sm" id="registromM" ><i class="far fa-save"></i> &nbsp;GUARDAR</span>
                            </p>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
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

	<!-- registrar producto -->
	<script type="text/javascript">
		$(document).ready(function(){
			$('#divMarca').load('tablas/selectMarcas.php');
			$('#registrop').click(function(){

				// obtenemos los valores de los input 
				var stockmin = document.getElementById("producto_smin").value; 
				var stockmax = document.getElementById("producto_smax").value; 
				var modeloco = document.getElementById("producto_modelo").value; 

				/*$("#producto_marca").change(function() {
					var valor = $(this).val(); // Capturamos el valor del select
					var texto = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
				});*/
				var texto = ShowSelected();

				var submarca = texto.substr(0,3);
				var submodelo = modeloco.substr(0,2);

				document.getElementById("generacodigo").value = submarca + submodelo;

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
				}else if(parseInt(stockmax) <= parseInt(stockmin)){ 
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
							$('#divMarca').load('tablas/selectMarcas.php');
							alertify.success("Producto agregado con éxito");
						}else if(r==2){
							alertify.error("El producto ya ha sido registrado");
						}else{
							alertify.error("Error al agregar");
						}
					}
				});
			});
		});
	</script>

	<script type="text/javascript">
		function ShowSelected(){
			/* Funsion para obtener el valor del select*/
			var cod = document.getElementById("producto_marca").value;
			//alert(cod);
			
			/* Para obtener el texto */
			var combo = document.getElementById("producto_marca");
			var selected = combo.options[combo.selectedIndex].text;
			//alert(selected);
			return selected;
		}

		function cerrarSesion(){
			alertify.confirm("Cerrando sesión",'¿Seguro que desea cerrar sesión?', function(){
				window.location="procesos/reglogin/salir.php";
			}, function(){ 
				alertify.error('Cancelo!')
			}).set('labels', {ok:'Si, salir!', cancel:'No, cancelar'});
		}
		/*function LlenarCombo(){
			$.ajax({
                type:"POST",
				url:"procesos/marcas/obtenDatosMarca.php",
                success:function(r){
                    alert(r);
					$("#producto_marca").empty();
                    dato= jQuery.parseJSON(r);
					$.each(dato, function(i, item){
							$('#producto_marca').append('<option value="'+item.idmarca+'">'+item.nombre+'</option>');
					});
                }
            });
    	}*/
	</script>
	<!-- registrar marca -->
	<script type="text/javascript">
		$(document).ready(function(){
			$('#registromM').click(function(){

				vacios=validarFormVacio('frmrmarcaM');
				if(vacios > 0){
					alertify.alert("Advertencia","Debes llenar todos los campos");
					return false;
				}
				datos=$('#frmrmarcaM').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"procesos/marcas/registrarmarca.php",
					success:function(r){
						//alert(r);
						if(r==1){
							//limpia el formulario una vez agregado
							//location.reload();
							//$('#frmrmarcaM')[0].reset();
							$('#ModalMarca').modal('hide');
							$('#divMarca').load('tablas/selectMarcas.php');
							//LlenarCombo();
							alertify.success("Marca agregada con éxito");
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