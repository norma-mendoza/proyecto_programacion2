<?php
session_start();
include_once "../../controllers/redireccionar.php";
$rd = new Rd();
$rd->Store();
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<title>Store</title>
	<link rel="stylesheet" href="../../public/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../public/css/bootstrap-theme.css">
	<link rel="stylesheet" href="../../public/css/estilo.css">
	<link rel="stylesheet" href="../../public/css/alertify.min.css" />
	<link rel="stylesheet" href="../../public/css/default.min.css" />

	<!--JS -->
	<script src="../../public/js/alertify.min.js"></script>
	<script src="../../public/js/jquery-3.5.1.slim.min.js"></script>
	<script src="../../public/js/jquery-1.9.1.min.js"></script>
	<script src="../../public/js/bootstrap.min.js"></script>
	<script src="../../public/js/funciones-ventas.js"></script>
	<script src="../../public/js/js_funciones.js"></script>
	<script src="../../public/js/funciones-navbar.js"></script>

	<script src="https://kit.fontawesome.com/05f4903dc9.js" crossorigin="anonymous"></script>

</head>

<body>
	<?php include './navbar/navbar.php'; ?>
	<div class="container-fluid"><br>
		<div class="row">
			<div class="col-md-12">
				<div id="capa">
					<div class="card" style="background-color: #212121;color: white;">
						<h5 class="card-header"></h5>
					</div>
					<div class="card-body" style="background-color: #757575;">

						<div class="row">
							<div class="col-md-4">
								<div class="alert alert-primary"><i class="fas fa-user"></i> Bienvenido/a: <?php echo $_SESSION["usuario"]; ?></div>
							</div>
						</div>
					</div>
				</div><br><br>
			</div>
		</div>
		<br><br>
	</div>
	<div class="footer" style="color:#ff7043;text-align: center;">
		<div class="row">
			<div class="col-md-4 md-auto">
				<b>Desarrollador: </b>
			</div>
			<div class="col-md-4 md-auto">
				<?php
				date_default_timezone_set('America/El_Salvador');
				$fecha_creacion = "2021";
				$fecha = date("Y");
				if ($fecha_creacion == $fecha) {
					echo "&copy; " . $fecha . " ";
				} else {
					echo "&copy; " . $fecha_creacion . " - " . $fecha . " ";
				}
				?>
			</div>
			<div class="col-md-4 md-auto">
			</div>
		</div>
	</div>
</body>

</html>