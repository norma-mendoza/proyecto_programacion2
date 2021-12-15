$(document).ready(function() {
    //Funcion para cargar la vista de principal productos
    $("a.reportes").click(function(event) {
        $("#contenido-procesos").load("procesos_varios/reportes/principal_productos.php");
        event.preventDefault();
    });
    $("a.reportes1").click(function(event) {
        $("html").load("procesos_varios/reportes/ventas_reportes.php");
        event.preventDefault();
    });
    /*Envia el numero de paginas*/
    $("a.pagina").click(function(event) {
        var num, reg;
        num = $(this).attr("v-num");
        reg = $(this).attr("num-reg");
        $("#contenido-procesos").load("procesos_varios/reportes/principal_productos.php?num=" + num + "&num_reg=" + reg);
        event.preventDefault();
    })
    /*Aumentar el numero de registro tabla categoria*/
    $('#select-reg').on('change', function(event) {
        var valor;
        valor = $("#select-reg option:selected").val();
        $("#contenido-procesos").load("procesos_varios/reportes/principal_productos.php?n_reg=1&num_reg=" + valor);
        event.preventDefault();
    })
    /*Buscar categoria*/
    $('#like-productos').on('change', function(event) {
        var valor;
        valor = $("#like-productos").val();
        $("#contenido-procesos").load("procesos_varios/reportes/principal_productos.php?like=1&valor=" + valor);
        event.preventDefault();
    });
    /*Cargar formulario para nueva categoria*/
    $("#new-product").click(function(event) {
        $("#contenido-procesos").load("procesos_varios/productos/form_insert.php");
        event.preventDefault();
    });
    //Obtener los datos del formulario de registro de nuevo producto
    $("#add-product").on('submit', function(event) {
        event.preventDefault();
        var formData = new FormData(document.getElementById('add-product'));
        formData.append("dato", "valor");
        $.ajax({
            url: "procesos_varios/productos/save_producto.php",
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        }).done(function(res) {
            $("#contenido-procesos").html(res);
        })
    })
    /**funcion para obtener registros de busquedas*/
    $("#busquedafecha").on('submit', function(event) {
        event.preventDefault();
        var formData = new FormData(document.getElementById('busquedafecha'));
        formData.append("dato", "valor");
        $.ajax({
            url: "procesos_varios/reportes/reportes_fechas.php",
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        }).done(function(res) {
            $("#contenido-procesos").html(res);
        })
    })
    //Editar productos
    $("a.edit_producto").click(function(event) {
        var idProducto = $(this).attr("id-producto");
        $("#contenido-procesos").load("procesos_varios/productos/edit_product.php?id_product=" + idProducto);
        event.preventDefault();
    });
    //Obtener los datos del formulario de editar
    $("#edit-product").on('submit', function(event) {
        event.preventDefault();
        var formData = new FormData(document.getElementById('edit-product'));
        formData.append("dato", "valor");
        $.ajax({
            url: "procesos_varios/productos/update_product.php",
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        }).done(function(res) {
            $("#contenido-procesos").html(res);
        })
    })
    //Eliminar producto
    $("a.del_producto").click(function(event) {
        if (confirm("Seguro/a de eliminarla Producto?")) {
            var idProducto = $(this).attr("id-producto");
            $("#contenido-procesos").load("procesos_varios/productos/delete_prod.php?delete_product=1&id_product=" + idProducto);
            event.preventDefault();
        } else {
            alertify.alert("Eliminar Producto", "Proceso cancelado..");
            //alert("Proceso cancelado..");
            event.preventDefault();
        }
    });
});