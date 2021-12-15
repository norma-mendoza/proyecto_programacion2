<!--<div class="d.none d.sm d.md-block">
    <div class="row">
        <div class="col">
            <a href="" class="btn btn-dark categorias">
                Categoria <br>
                <i class="fas fa-sitemap fa-2x"></i>
            </a>
        </div>
        <div class="col">
            <a href="" class="btn btn-dark categorias">
                Categoria <br>
                <i class="fas fa-sitemap fa-2x"></i>
            </a>
        </div>
        <div class="col">
            <a href="" class="btn btn-dark categorias">
                Categoria <br>
                <i class="fas fa-sitemap fa-2x"></i>
            </a>
        </div>
    </div>
</div>


SELECT dv.id_detalle_v,dv.precio_unitario,dv.cantidad_prod,ventas.fecha_venta,ventas.total_pago,ventas.descuento,producto.nombre_productos,sucursal.nombre_empresa FROM detalle_venta as dv INNER JOIN ventas ON ventas.id_venta=dv.id_venta INNER JOIN producto ON producto.id_producto = dv.id_producto INNER JOIN sucursal on sucursal.id_empresa = dv.id_sucursal 



-->