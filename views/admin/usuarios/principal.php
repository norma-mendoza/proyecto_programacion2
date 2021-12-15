<?php 
    session_start();
    include '../../../models/conexion.php';
    include '../../../models/procesos.php';
	include '../../../controllers/procesos.php';
    $query = "SELECT * FROM usuarios";
    $DataUser = SelectData($query);
    $cont = 0;
?>
<script src="../../public/js/js_funciones.js"></script>
<script src="../../public/js/funciones-usuario.js"></script>
<script>
    function muestra_oculta(id)
    {
        if(document.getElementById){
            var el = document.getElementById(id);
            el.style.display = (el.style.display == 'block') ? 'none' : 'block';
        }
        
       
    }
    window.onload = function(){
        muestra_oculta('contenido-icon')
    };

</script>
<style>
    th{text-align: center;background-color: #212121;color:#ff7043;font-weight: bold;}
    td{text-align: center;}
</style>

<div class="container" id="contenido-usuario" style="margin-top: 20px; margin-bottom:40px;">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <a class="btn btn-success text-white new_user" style="margin-bottom: 10px;"><i class="fas fa-user-plus"></i> Agregar</a>
            <div style="margin-top: 10px;margin-bottom: 10px;">
                <a style='cursor: pointer;' onClick="muestra_oculta('contenido-icon')" title="" class="btn btn-info text-white boton_mostrar">
                    <i class="fas fa-info-circle"></i>  Información Iconos
                </a>

                <div id="contenido-icon" style="display: none;">
                    <?php include 'tabla_icon.php';?>
                </div>
            </div>
            <table class="table table-hover table-responsive-xl">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Usuario</th>
                        <th>Email</th>
                        <th>Acceso</th>
                        <th>Tipo</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($DataUser AS $result):?>
                    <tr>
                        <td><?php echo $cont += 1; ?></td>
                        <td><?php echo $result['usuario']; ?></td>
                        <td><?php echo $result['email']; ?></td>
                        <td>
                        <?php if ($result['estado'] == 0): ?>
                            <a class="btn btn-danger text-white edit-estado"  id-user="<?php echo $result['id_usuario']; ?>" estado="<?php echo $result['estado']; ?>">
                                <i class="fas fa-user-slash"></i>
                            </a>
                        <?php else: ?>
                            <a class="btn btn-secondary text-white edit-estado" id-user="<?php echo $result['id_usuario']; ?>" estado="<?php echo $result['estado']; ?>">
                            <i class="fas fa-user-check"></i>
                            </a>
                        <?php endif ?>
                        </td>
                        <td>
                        <?php if ($result['tipo'] == 1): ?>
                            <a class="btn btn-primary text-white edit-tipo" id-user="<?php echo $result['id_usuario']; ?>" tipo="<?php echo $result['tipo']; ?>">
                            <i class="fas fa-user-shield"></i>
                            </a>
                        <?php else: ?>
                            <a class="btn btn-warning text-white edit-tipo" id-user="<?php echo $result['id_usuario']; ?>" tipo="<?php echo $result['tipo']; ?>">
                            <i class="fas fa-user-cog"></i>
                            </a>
                        <?php endif ?>
                        </td>
                        <td>
                            <a class="btn btn-success text-white edit-user" id-user="<?php echo $result['id_usuario']; ?>">
                                <i class="fas fa-user-edit"></i>
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger text-white del-user" id-user="<?php echo $result['id_usuario']; ?>">
                            <i class="fas fa-user-times"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>