$(document).ready(function() {
    //Funcion para cargar la vista de principal sucursal
    $("a.clientes").click(function(event) {
        event.preventDefault();
        $("#contenido-procesos").load("procesos_varios/clientes/principal.php");
    });
    /*Envia el numero de paginas*/
    $("a.pagina").click(function(event) {
        var num, reg;
        num = $(this).attr("v-num");
        reg = $(this).attr("num-reg");
        $("#contenido-procesos").load("procesos_varios/clientes/principal.php?num=" + num + "&num_reg=" + reg);
        event.preventDefault();
    })
    /*Aumentar el numero de registro tabla sucursal*/
    $('#select-reg').on('change', function(event) {
        var valor;
        valor = $("#select-reg option:selected").val();
        $("#contenido-procesos").load("procesos_varios/clientes/principal.php?n_reg=1&num_reg=" + valor);
        event.preventDefault();
    })
    /*Buscar sucursal*/
    $('#like-cliente').on('change', function(event) {
        var valor;
        valor = $("#like-cliente").val();
        $("#contenido-procesos").load("procesos_varios/clientes/principal.php?like=1&valor=" + valor);
        event.preventDefault();
    });
    /*Eliminar una sucursal*/
    $("a.del-cliente").click(function(event) {
        if (confirm("Seguro/a de eliminarla cliente?")) {
            var idcliente = $(this).attr("id-cliente");
            $("#contenido-procesos").load("procesos_varios/clientes/delete_cliente.php?id_cliente=" + idcliente);
            event.preventDefault();
        } else {
            alertify.alert("Eliminar Cliente", "Proceso cancelado..");
            //alert("Proceso cancelado..");
            event.preventDefault();
        }
    });
});