<script src="../../public/js/js_funciones.js"></script>
<script src="../../public/js/funciones-usuario.js"></script>
<?php 
    session_start();
    include '../../../models/conexion.php';
    include '../../../models/procesos.php';
	include '../../../controllers/procesos.php';

    if(isset($_GET['nclave'])){
        $id_user = $_GET['id_user'];
        $new_clave = password_hash($_GET['nclave'],PASSWORD_DEFAULT);

        $tabla = "usuarios";
        $campos = "passw = '$new_clave'";
        $condicional = "id_usuario = '$id_user'";

        $query = "UPDATE $tabla SET $campos WHERE $condicional";

        $update = U_I_D($query);
    ?>
    <?php if ($update == 1):?>
    <script>
        $(document).ready(function() 
        {
            alertify.alert("Modificar Contraseña","Contraseña modificada...");
            $("#capa").load("usuarios/principal.php");
            event.preventDefault();
        });
    </script>
    <?php else: ?>    
        <script>
        $(document).ready(function() 
        {
            alertify.alert("Modificar Contraseña","Error al modificar contraseña...");
            $("#capa").load("usuarios/principal.php");
            event.preventDefault();
        });
    </script>
    <?php endif ?>
    <?php }else{
        $id_user = $_GET['id_user'];
        $tipo = $_GET['tipo'];
        $email = $_GET['email'];

        $tabla = "usuarios";
        $campos = "email='$email',tipo='$tipo'";
        $condicional = "id_usuario = '$id_user'";

        $query = "UPDATE $tabla SET $campos WHERE $condicional";

        $update = U_I_D($query);
    ?>
    <?php if($update == 1):?>
        <script>
            $(document).ready(function() 
            {
                alertify.alert("Modificar Tipo y Email","Tipo y Email modificado...");
                $("#capa").load("usuarios/principal.php");
                event.preventDefault();
            });
        </script>
    <?php else: ?>
        <script>
            $(document).ready(function() 
            {
                alertify.alert("Modificar Tipo y Email","Error al modificar Tipo y Email...");
                $("#capa").load("usuarios/principal.php");
                event.preventDefault();
            });
        </script>
    <?php endif ?>
    <?php } ?>