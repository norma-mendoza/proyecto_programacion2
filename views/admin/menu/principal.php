
<div class="card" style="background-color: #203338;color: #ff7043;">
    <h5 class="card-header">
    <i class="fas fa-store-alt"> </i> Sistema Gestión Farmacia(SGF)
    </h5>
</div>
<div class="card-body" style="background-color: #757575;">
    <div class="row">
        <div class="col-md-4">
            <div class="alert alert-primary">
                <i class="fas fa-user"></i> Bienvenido/a: <?php echo  $_SESSION["usuario"];?>
                <div style="text-align: center;">
                    <br>
                    <img src="../../public/img/logos/user.png" width="150px" alt="">
                </div>
            </div>
        </div>
        <div class="col-md-8">
        <div class="card">
        <div class="card-header" style="background-color: #203338;color: #ff7043;">
            <b>Panel Principal</b>
        </div>
        <div class="card-body">
        <div class="row" style="text-align: center;">
                <div class="col">
                    <a href="" class="btn btn-secondary procesos-v"> 
                        <i class="fas fa-tools fa-3x"></i><br>
                        Panel Control
                    </a>
                </div>
                <div class="col">
                <a href="" class="btn btn-secondary nav-item usuario">
                        <i class="fas fa-users fa-3x"></i><br>
                        Usuarios
                    </a>
                </div>
                <div class="col">
                    <a href="" class="btn btn-secondary nav-item ventas">
                    <i class="fas fa-cash-register fa-3x"></i><br>
                        Ventas
                    </a>
                </div>
            </div>
        </div>
        </div>
        </div>
    </div>
</div>