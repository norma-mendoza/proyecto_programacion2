<script src="../../public/js/js_funciones.js"></script>
<script src="../../public/js/funciones-navbar.js"></script>
<script src="../../public/js/funciones-categorias.js"></script>
<script src="../../public/js/funciones-productos.js"></script>
<script src="../../public/js/funciones-limite-productos.js"></script>
<script src="../../public/js/funciones-proveedores.js"></script>
<script src="../../public/js/funciones-stock.js"></script>
<script src="../../public/js/funciones-clientes.js"></script>
<script src="../../public/js/funciones-reportes.js"></script>
<script src="../../public/js/funciones-sucursal.js"></script>

<style>
</style>
<div class="container-fluid" style="margin-top: 20px; margin-bottom:40px;">
    <div class="card" style="background-color: #212121;color: #ff7043;">
        <h5 class="card-header">
            <i class="fas fa-store-alt"> </i> Sistema Gestión Farmacia(SGF)
        </h5>
    </div>
    <div class="card-body" style="background-color: #757575;">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 auto-md" style="margin-bottom:20px">
                        <div class="card">
                            <div class="card-header" style="background-color: #212121;color: #ff7043;">
                                <b>Panel de Control</b>&nbsp;
                                <a style="background-color: #757575;margin-bottom:10px;float: right;" class="btn btn-sm" onclick="myFunction()">
                                    <i class="fas fa-sliders-h"></i>
                                </a>
                            </div>
                            <div class="card-body">
                                <div id="myDIV">
                                    <?php
                                    include 'menus/menu_a.php';
                                    include 'menus/menu_b.php';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 auto-md">
                        <div class="card">
                            <div class="card-header" style="background-color: #212121;color: #ff7043;">
                                <b>Acciones</b>
                            </div>
                            <div class="card-body">
                                <div id="contenido-procesos">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>