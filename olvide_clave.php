<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="UTF-8">
		<title>Olvide Clave</title>
		<link rel="stylesheet" href="./public/css/bootstrap.min.css">
  		<link rel="stylesheet" href="./public/css/bootstrap-theme.css">
  		<link rel="stylesheet" href="./public/css/estilo.css">
  		<!--JS -->
		<script src="./public/js/jquery-3.5.1.slim.min.js"></script>
		<script src="./public/js/jquery-1.9.1.min.js"></script>
		<script src="./public/js/bootstrap.min.js"></script>
		<script src="https://kit.fontawesome.com/05f4903dc9.js" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="container"><br>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<form action="./controllers/login.php" method="POST">
						<div class="input-group mb-3">
						 	<div class="input-group-prepend">
						    	<span class="input-group-text" id="basic-addon1">
						    		<i class="fas fa-user"></i>
						    	</span>
						  	</div>
						  	<input type="text" name="user" class="form-control" placeholder="Usuario" autocomplete="off" required>
						</div>
						<button class="btn btn-info" name="recuperar_clave">Enviar</button>
					</form>	
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
	</body>
</html>