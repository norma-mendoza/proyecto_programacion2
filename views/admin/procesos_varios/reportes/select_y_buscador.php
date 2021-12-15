<div class="row" style="margin-bottom: 10px">
    <div class="col-md-12">
        <a href="procesos_varios/reportes/ventas_reportes.php" target="_blank" class="btn btn-success">
            <i class="fas fa-plus-circle"><b> Reportes Ventas</b></i>
        </a>

        <a href="procesos_varios/reportes/productos_masvendidos.php" target="_blank" class="btn btn-primary m-4 ">
            <i class="fas fa-plus-circle"><b> Productos mas vendidos</b></i>
        </a>

        <a href="procesos_varios/reportes/producto_escasos.php" target="_blank" class="btn btn-info ">
            <i class="fas fa-plus-circle"><b> Productos Escasos</b></i>
        </a>

    </div>
    <form id="busquedafecha" class="m-2">

        <div class="col-md-12">
            <label style="font-weight: normal;">Desde: <input name="desde" class="form-control" type="date" id="bd-desde" /></label>

            <label style="font-weight: normal;">Hasta: <input name="hasta" class="form-control" type="date" id="bd-hasta" /></label>
            <div class="text-center">

                <button type="submit" id="rango_fecha" class="my btn-sm btn-primary">Reporte por fechas</button>
            </div>

        </div>
    </form>
    <div class="col-md-12">
        <label> Buscar</label>
        <input type="search" class="form-control" id="like-productos" placeholder="Buscar producto">
    </div>

</div>

<div class="col-md-4">
    <select name="" id="select-reg" class="custom-select" style="width: 150px; margin-bottom:10px;">
        <option value="" disabled selected>N° Registro</option>
        <option value="5">5</option>
        <option value="10">10</option>
        <option value="15">15</option>
        <option value="20">20</option>
        <option value="30">30</option>
        <option value="40">40</option>
        <option value="50">50</option>
    </select>
</div>