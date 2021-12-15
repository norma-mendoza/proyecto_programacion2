<?php
session_start();
include_once "../../models/conexion.php";
include_once "../../models/procesos.php";
include_once "../../controllers/redireccionar.php";
include_once "../../controllers/procesos.php";

$rd = new Rd();
$rd->Admin();
//Consulta para mostrar el modal de aviso
$query = "SELECT inventarios.stock as stock,
	producto.nombre_productos as producto,
	producto.unidad_medida as unidad,
	categorias.categoria as categoria,
	categorias.id_categoria as id_categoria,
	limite_productos.limite as limite
	FROM inventarios
	INNER JOIN producto ON inventarios.id_producto=producto.id_producto
	INNER JOIN categorias ON inventarios.id_categoria=categorias.id_categoria
	INNER JOIN limite_productos ON limite_productos.id_producto=inventarios.id_producto WHERE limite_productos.limite >= inventarios.stock";

$busca_producto = SelectData($query, "i");
$busca_num = NumReg($query);
$cont = 0;
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="../../public/img/logos/bull.png" />
	<title>Adminitración</title>
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
	<script src="../../public/js/funciones-navbar.js"></script>
	<script src="../../public/js/js_funciones.js"></script>
	<script src="../../public/js/funciones-productos.js"></script>

	<script src="https://kit.fontawesome.com/05f4903dc9.js" crossorigin="anonymous"></script>
	<script>
		$(document).ready(() => {
			$('#modal').modal('toggle');
		});
	</script>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@500&display=swap" rel="stylesheet">
	<style>
		body{
			font-family: 'Lato', sans-serif;
		}
	</style>
</head>

<body>
	<?php include './navbar/navbar.php';

	if ($busca_num > 0) {
		include_once './modals/importante.php';
	}
	?>
	<div class="container-fluid"><br>
		<div class="row">
			<div class="col-md-12">
				<div id="capa">
					<?php include './menu/principal.php'; ?>
				</div>
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