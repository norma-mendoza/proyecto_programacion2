<script src="../../public/js/funciones-navbar.js"></script>
<script src="../../public/js/funciones-usuario.js"></script>
<?php 
    session_start();
    include '../../../models/conexion.php';
    include '../../../models/procesos.php';
	include '../../../controllers/procesos.php';
    
?>
<style>
    .div-header{
        text-align: center;
        font-weight: bold;
    }

</style>
<div class="row">
    <div class="col-4"></div>
    <div class="col-4">
<?php if ($_GET['accion'] == 1): ?>
<?php 
    $iduser = $_GET['id_user'];
    $query = "SELECT * FROM usuarios WHERE id_usuario = '$iduser'";
    $DataUser = SelectData($query);
?>
<div class="div-header">
    Cambio Contraseña
</div>
<hr>
<?php foreach ($DataUser AS $result): ?>
<div class="div-body">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Usuario</span>
        </div>
        <input type="hidden" name="user" id="id-user"  value="<?php echo $iduser; ?>" required="on" readonly />
        <input type="text" name="user" id="user" class="form-control" placeholder="Usuario" value="<?php echo $result['usuario']; ?>" required="on" readonly />
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Contraseña</span>
        </div>
        <input type="password" minlength="8" name="passw" id="n-passw" class="form-control" value="" placeholder="Contraseña" required="on" />
    </div>
    <div>
        <a class="btn btn-primary text-white" id="upd-user"><i class="fas fa-save"></i> Actualizar</a>
        <a class="btn btn-danger text-white usuario"><i class="fas fa-ban"></i> Cancelar</a>
    </div>
</div>
<?php endforeach ?>
<?php elseif ($_GET['accion'] == 2): ?>
    
<?php
    $iduser = $_GET['id_user'];
    $query = "DELETE FROM usuarios WHERE id_usuario = '$iduser'";
    $delete_user = U_I_D($query);
?>
    <?php if ($delete_user == 1):?>
     <script>
        $(document).ready(function() 
        {
            alertify.alert("Eliminar usuario","Usuario eliminado...");
            $("#capa").load("usuarios/principal.php");
            event.preventDefault();
        });
    </script>
    <?php else: ?>    
        <script>
        $(document).ready(function() 
        {
            alertify.alert("Eliminar usuario","Error al modificar estado...");
            $("#capa").load("usuarios/principal.php");
            event.preventDefault();
        });
    </script>
    <?php endif ?>
<?php elseif ($_GET['accion'] == 3): ?>
<?php
    $iduser = $_GET['id_user'];
    if($_GET['estado'] == 0){
        $estado = 1;
    }else{
        $estado = 0;
    }
    $query = "UPDATE usuarios SET estado='$estado' WHERE id_usuario='$iduser'";
    $update = U_I_D($query);
?>
<?php 
    ?>
    <?php if ($update == 1):?>
     <script>
        $(document).ready(function() 
        {
            alertify.alert("Modificar Estado","Estado modificado...");
            $("#capa").load("usuarios/principal.php");
            event.preventDefault();
        });
    </script>
    <?php else: ?>    
        <script>
        $(document).ready(function() 
        {
            alertify.alert("Modificar Estado","Error al modificar estado...");
            $("#capa").load("usuarios/principal.php");
            event.preventDefault();
        });
    </script>
    <?php endif ?>
<?php else: ?>
<?php 
    $iduser = $_GET['id_user'];
    $tipo = $_GET['tipo'];
    $query = "SELECT * FROM usuarios WHERE id_usuario = '$iduser'";
    $DataUser = SelectData($query);
?>
    <div class="div-header">
                Cambio Tipo y Email
            </div>
            <hr>
            <?php foreach ($DataUser as $result) : ?>
                <div class="div-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Usuario</span>
                        </div>
                        <input type="hidden" name="user" id="id-user" value="<?php echo $iduser; ?>" required="on" readonly />
                        <input type="text" name="user" id="user" class="form-control" placeholder="Usuario" value="<?php echo $result['usuario']; ?>" required="on" readonly />
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Email</span>
                        </div>
                        <input type="email" name="email" id="email" class="form-control" value="<?php echo $result['email']; ?>" placeholder="Emal" required="on" />
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text">Tipo</label>
                        </div>
                        <select class="custom-select" name="tipo" id="tipo-user" required="on">
                            <option value="0" selected disabled>Seleccione Tipo</option>
                            <?php if ($result['tipo'] == 1) : ?>
                                <option value="2">Operador</option>
                            <?php else : ?>
                                <option value="1">Administrador</option>
                            <?php endif ?>
                        </select>
                    </div>
                    <div>
                        <a class="btn btn-primary text-white" id="upd2-user"><i class="fas fa-save"></i> Actualizar</a>
                        <a class="btn btn-danger text-white usuario"><i class="fas fa-ban"></i> Cancelar</a>
                    </div>
                </div>
            <?php endforeach ?>
<?php endif?>
</div>
    <div class="col-4"></div>
</div>