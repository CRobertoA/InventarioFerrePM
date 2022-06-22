<?php
	session_start();
	
	if(isset($_SESSION['usuario']) and $_SESSION['estado']== 1){
        if(!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
		
	
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

    <!-- Select2 -->
    <link href="select2/dist/css/select2.min.css" rel="stylesheet" />


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
                        <a href="entrada-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE ENTRADAS</a>
                    </li>
                </ul>
            </div>
            
            <!--CONTENIDO-->
            <div class="container-fluid">
            	<div class="container-fluid form-neon">
                    <div class="container-fluid">
                        <p class="text-center roboto-medium">AGREGAR PRODUCTOS</p>
                        <p class="text-center">
                            <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalCliente"><i class="fas fa-user-plus"></i> &nbsp; Agregar cliente</button>-->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalItem"><i class="fas fa-box-open"></i> &nbsp; Agregar producto</button>
                        </p>
                        <div class="table-responsive">
                            <table class="table table-dark table-sm">
                                <thead>
                                    <tr class="text-center roboto-medium">
                                        <th>CODIGO PRODUCTO</th>
                                        <th>PRODUCTO</th>
                                        <th>MODELO</th>
                                        <th>CANTIDAD</th>
                                        <th>FECHA</th>
                                        <th>OBSERVACIONES</th>
                                        <th>ELIMINAR</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        foreach($_SESSION["carrito"] as $indice => $producto){ 
                                            //$granTotal += $producto->total;
                                        
                                    ?>
                                    <tr class="text-center" >
                                        <td><?php echo $producto->codigoproduc ?></td>
                                        <td><?php echo $producto->nombre ?></td>
                                        <td><?php echo $producto->modelo ?></td>
                                        <td><?php echo $producto->cantidad ?></td>
                                        <td><?php echo $producto->fechaR ?></td>
                                        <td><?php echo $producto->observaciones ?></td>
                                        <td>
                                            <a class="btn btn-warning" href="<?php echo "procesos/entradas/quitarDelCarrito.php?indice=" . $indice?>" title="Eliminar de la lista">
                                                <i class="bi bi-trash3-fill"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php 
                                        } 
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <form method="POST" action="procesos/entradas/registrarEntrada.php">
                        <p class="text-center" style="margin-top: 40px;">
                            <button type="submit" class="btn btn-raised btn-info btn-sm" id="btnAgregarEntrada1"><i class="far fa-save"></i> &nbsp; AGREGAR ENTRADA</button>
                            <span class="btn btn-raised btn-warning btn-sm" id="btnCancelarEntrada1"><i class="bi bi-x-lg"></i> &nbsp; CANCELAR ENTRADA</span>
                        </p>
                        </form>
                    </div>
            	</div>
			</div>


            <!-- MODAL PRODUCTO -->
            <div class="modal fade" id="ModalItem" tabindex="-1" role="dialog" aria-labelledby="ModalItem" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalItem">Agregar productos</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="procesos/entradas/agregarTablaTemp.php" autocomplete="off" id="frmrentrada1">
                            <fieldset>
                                <p><i class="far fa-plus-square"></i> &nbsp; Información del producto</p>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="listproducto" class="bmd-label-floating">Producto</label>
                                                    <?php
                                                        
                                                        $c= new conectar();
                                                        $conexion= $c->conexion();
                                                        $consulta="SELECT * from producto";
                                                        $ejecutar=mysqli_query($conexion, $consulta);
                                                    ?>
                                                <select class="form-control" name="listproducto" id="listproducto" onchange="agregaDatosProdu1(event.target.value)">
                                                    <option value="A" selected="">Seleccione un producto</option>
                                                    <?php foreach ($ejecutar as $opciones): ?>
                                                    <option value="<?php echo $opciones['codigoproduc'] ?>"> <?php echo $opciones['nombre'] ?> </option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="codigo_producto">Codigo de producto</label>
                                                <input type="text" class="form-control" name="codigo_producto" id="codigo_producto" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="producto_producto1">Nombre producto</label>
                                                <input type="text" class="form-control" name="producto_producto" id="producto_producto" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="modelo_producto">Modelo</label>
                                                <input type="text" class="form-control" name="modelo_producto" id="modelo_producto" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="producto_fecha">Fecha registro</label>
                                                <input type="text" class="form-control" name="producto_fecha" id="producto_fecha">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="producto_cantidad" class="bmd-label-floating">Cantidad</label>
                                                <input type="text" pattern="[0-9.]{1,10}" class="form-control" name="producto_cantidad" id="producto_cantidad" maxlength="10">
                                                <input type="text" hidden="" pattern="[0-9.]{1,10}" class="form-control" name="producto_stockmax" id="producto_stockmax" maxlength="10">
                                            </div>
                                        </div>
                                        <!--<div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="producto_stock" class="bmd-label-floating">Stock actual</label>
                                                <input type="text" pattern="[0-9.]{1,10}" class="form-control" name="producto_stock" id="producto_stock" maxlength="10">
                                            </div>
                                        </div>-->
                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <label for="producto_observacion" class="bmd-label-floating">Observación</label>
                                                <input type="text" pattern="[a-zA-z0-9áéíóúÁÉÍÓÚñÑ#() ]{1,400}" class="form-control" name="producto_observacion" id="producto_observacion" maxlength="400">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <p class="text-center" style="margin-top: 40px;">
                                <button type="submit" class="btn btn-raised btn-info btn-sm" id="registroen1"><i class="far fa-save"></i> &nbsp; AGREGAR PRODUCTO</button>
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

    <!-- Select2 -->
    <script src="select2/dist/js/select2.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            //$('#listproducto').select2();
            var fecha = new Date();
            var salida = String(fecha.getDate()).padStart(2, '0') + '/' + String(fecha.getMonth()+1).padStart(2, '0') + '/' + String(fecha.getFullYear());
            document.getElementById('producto_fecha').value = salida;

        });
    </script>

    <!-- Funcion para rellenar imputs -->
	<script type="text/javascript">
        function agregaDatosProdu1(idproducto){

            $.ajax({
                type:"POST",
                data:"idproducto=" + idproducto,
                url:"procesos/entradas/obtenDatosProdu.php",
                success:function(r){
                    dato=jQuery.parseJSON(r);

                    $('#codigo_producto').val(dato['codigoproduc']);
                    $('#producto_producto').val(dato['nombre']);
                    $('#modelo_producto').val(dato['modelo']);
                    $('#producto_stockmax').val(dato['stockmaximo']);
                }
            });
        }

        function quitarp1(index){

            $.ajax({
                type:"POST",
                data:"ind=" + index,
                url:"procesos/entradas/quitarDelCarrito1.php",
                success:function(r){
                    location.reload();
                }
            });
        }

        function refresh() {
            window.location="entrada-new.php";
        }

    </script>

    <!-- Agregar al carrito -->
	<script type="text/javascript">
		$(document).ready(function(){
			$('#registroen1').click(function(){

				// obtenemos los valores de los input 
				var cantidad = document.getElementById("producto_cantidad").value; 
                var smax = document.getElementById("producto_stockmax").value; 

				vacios=validarFormVacio('frmrentrada1');
				if(vacios > 0){
					alertify.alert("Advertencia", "Debes llenar todos los campos");
					return false;
				}
			});

            $('#btnCancelarEntrada1').click(function(){

                $.ajax({
                    url:"procesos/entradas/cancelarEntrada.php",
                    success:function(r){
                        location.reload();
                    }
                });
            });
		});
	</script>

     <!-- Obsiones de alertas -->
     <?php 
        if(isset($_GET["status"])){
            if($_GET["status"] === "1"){
    ?>
        <script type="text/javascript">
            alertify.success("Entrada agregada con éxito");
            setTimeout(refresh,4000);
        </script>
        <?php
            } else if($_GET["status"] === "2"){
        ?>
        <script type="text/javascript">
            alertify.alert("Advertencia","La cantidad ingresada supera el stock máximo del producto");
            setTimeout(refresh,4000);
        </script>
        <?php
            } else if($_GET["status"] === "3"){
        ?>
        <script type="text/javascript">
            alertify.alert("Advertencia","El producto ya se ha seleccionado");
            setTimeout(refresh,4000);
        </script>
        <?php
            } else if($_GET["status"] === "4"){
        ?>
        <script type="text/javascript">
            alertify.alert("Advertencia","El producto seleccionado no existe");
            setTimeout(refresh,4000);
        </script>
        <?php
            } else if($_GET["status"] === "5"){
        ?>
        <script type="text/javascript">
            alertify.alert("Advertencia","No seleccionaste ningun producto");
            setTimeout(refresh,4000);
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