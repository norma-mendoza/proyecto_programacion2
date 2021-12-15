<script src="../../public/js/funciones-navbar.js"></script>
<script src="../../public/js/funciones-usuario.js"></script>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <h3 style="text-align: center;">Registro Usuario</h3>
        <hr>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Usuario</span>
            </div>
            <input type="text" name="user" id="user" class="form-control" placeholder="Usuario" required="on" />
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Contraseña</span>
            </div>
            <input type="password" minlength="8" name="passw" id="passw" class="form-control" placeholder="Contraseña" required="on" />
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Email</span>
            </div>
            <input type="email" name="email" id="email"class="form-control" placeholder="Email" required="on" />
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text">Tipo</label>
            </div>
            <select class="custom-select" name="tipo" id="tipo-user" required="on">
                <option value ="0" selected disabled>Seleccione Tipo</option>
                <option value="1">Administrador</option>
                <option value="2">Operador</option>
            </select>
        </div>
        <div>
            <a class="btn btn-primary text-white" id="save-user"><i class="fas fa-save"></i> Guardar</a>
            <a class="btn btn-danger text-white usuario"><i class="fas fa-ban"></i> Cancelar</a>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>