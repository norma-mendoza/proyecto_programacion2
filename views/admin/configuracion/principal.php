<script src="../../public/js/js_funciones.js"></script>
<script src="../../public/js/config-img.js"></script>
<div class="row">
    <div class="col-12 col-md-6">
        <h2 class="text-center my-3">Configurar banner de Login</h2>
        <form action="" id="add-banner" enctype="multipart/form-data">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label for="" class="input-group-text">Imagen</label>
                </div>
                <input type="file" name="imagen" id="imagen_banner" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary btn-outline mb-3">Cambiar</button>
        </form>
        <hr>
        <div class="row">
            <div class="col-md-6">
            <label for="">Imagen Cargada</label>
                <div class="logo">
                    <img id="show_banner" alt="">
                </div>
            </div>
            <div class="col-md-6">
            <label for="">Imagen Actual</label>
                <div class="logo">
                    <img src="../../public/img/login/banner.jpg" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6">
        <h2 class="text-center my-3">Modificar Logo</h2>
        <form action="" id="add-logo" enctype="multipart/form-data">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label for="" class="input-group-text">Imagen</label>
                </div>
                <input type="file" name="imagen" id="imagen_logo" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary btn-outline mb-3">Cambiar</button>
        </form>
        <hr>
        <div class="row">
            <div class="col-md-6">
            <label for="">Imagen Cargada</label>
                <div class="logo">
                    <img id="show_logo" alt="">
                </div>
            </div>
            <div class="col-md-6">
            <label for="">Imagen Actual</label>
                <div class="logo">
                    <img src="../../public/img/logos/logo.png" alt="">
                </div>
            </div>
        </div>
    </div>

</div>