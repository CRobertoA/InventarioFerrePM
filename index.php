<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Login</title>

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

	<!-- Sweet Alert V8.13.0 JS file -->
	<script src="./js/sweetalert2.min.js" ></script>

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
		session_start();
		require_once "clases/Conexion.php";
												
		$c= new conectar();
		$conexion= $c->conexion();
	?>
	<div class="login-container">
		<div class="login-content">
			<p class="text-center">
				<i class="fas fa-user-circle fa-5x"></i>
			</p>
			<p class="text-center">
				Inicia sesión con tu cuenta
			</p>
			<!-- formulario para el login -->
			<form id="frmlogin">
				<div class="form-group"> 
					<label for="UserName" class="bmd-label-floating"><i class="fas fa-user-secret"></i> &nbsp; Usuario</label>
					<input type="text" class="form-control" id="UserName" name="UserName" pattern="[a-zA-Z0-9]{1,35}" maxlength="35">
				</div>
				<div class="form-group">
					<label for="UserPassword" class="bmd-label-floating"><i class="fas fa-key"></i> &nbsp; Contraseña</label>
					<input type="password" class="form-control" id="UserPassword" name="UserPassword" maxlength="200">
				</div>
				<span class="btn-login text-center" id="entrarSistema" >INGRESAR</span>
			</form>
			<?php if(!$conexion) {?>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalRestore"><i class="bi bi-cloud-upload-fill"></i> &nbsp; Restauración</button>
			<?php } ?>
		</div>
	</div>

			<!-- MODAL MARCA -->
			<div class="modal fade" id="ModalRestore" tabindex="-1" role="dialog" aria-labelledby="ModalRestore" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalRestore">Restauración</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
						<p><i class="bi bi-cloud-upload-fill"></i> &nbsp; Restaurar base de datos</p>
                            <form action="procesos/restauracion/restore.php" method="POST" enctype="multipart/form-data">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12 col-md-10">
                                            <div class="form-group">
                                                <label for="sql" >Archivo sql</label>
                                                <input type="file" class="form-control-file" id="sql" name="sql" placeholder="base de datos que deseas restaurar" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <p class="text-center" style="margin-top: 40px;">
                                <!-- boton para guardar datos de la marca-->
								<button type="submit" class="btn btn-raised btn-info btn-sm" id="restore" name="restore"><i class="bi bi-upload"></i> RESTAURAR BASE</button>
                            </p>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

	
	<!--=============================================
	=            Archivos JavaScript              =
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
	
	<script type="text/javascript">
		$(document).ready(function(){
			$('#entrarSistema').click(function(){
				vacios=validarFormVacio('frmlogin');
				if(vacios > 0){
					alertify.alert("Advertencia","Debes llenar todos los campos");
					return false;
				}

			datos=$('#frmlogin').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"procesos/reglogin/login.php",
					success:function(r){
						if(r==1){
							window.location="home.php";
						}else{
							alertify.alert("Advertencia","Usuario o contraseña incorrecto");
						}
					}
				});
			});
		});

		$('#restore').click(function(){

			var filepath = document.getElementById("sql").value;
			var allowedExtensions = /(.sql)$/i;

			if(filepath == ''){
				alertify.alert("Advertencia", "Debes seleccionar un archivo");
				return false;
			}else{
				if(!allowedExtensions.exec(filepath)){
					alertify.alert("Advertencia", "Debes seleccionar un archivo con extensión .sql");
					document.getElementById("sql").value = '';
					return false;
				} else{
					
				}
			}
		});
    </script>


</body>
</html>