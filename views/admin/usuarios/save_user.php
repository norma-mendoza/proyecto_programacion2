<script src="../../public/js/js_funciones.js"></script>
<script src="../../public/js/funciones-usuario.js"></script>
<?php 
    session_start();
    include '../../../models/conexion.php';
    include '../../../models/procesos.php';
	include '../../../controllers/procesos.php';

    $user = $_GET['user'];
    $clave = password_hash($_GET['clave'], PASSWORD_DEFAULT);
    $email = $_GET['email'];
    $tipo = $_GET['tipo'];

    $tabla = "usuarios";
    $campo = "usuario,email,passw,tipo";
    $valores = "'$user','$email','$clave','$tipo'";
    $query = "INSERT INTO $tabla ($campo) VALUES($valores)";
    
    $insert = U_I_D($query);
?>
<?php if ($insert == 1):?>
<script>
    $(document).ready(function() 
    {
        alertify.alert("Registro Usuario","Usuario registrado");
        $("#capa").load("usuarios/principal.php");
        event.preventDefault();
    });
</script>
<?php else: ?>    
    <script>
    $(document).ready(function() 
    {
        alertify.alert("Registro Usuario","Error al registrar usuario...");
        $("#contenido-usuario").load("usuarios/form_new_user.php");
        event.preventDefault();
    });
</script>
<?php endif ?>