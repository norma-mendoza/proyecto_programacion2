$(document).ready(()=>{
    /*Paginado y buscador*/
	/*Envia el numero de paginas*/
    $("a.pagina").click(function(event){
        var num, reg;
        num = $(this).attr("v-num");
        reg = $(this).attr("num-reg");
        $("#capa").load("ventas/principal.php?num=" + num +"&num_reg="+reg);
        event.preventDefault();
    })
    /*Aumentar el numero de registro tabla categoria*/
    $('#select-reg').on('change', function(event){
        var valor;
        valor = $("#select-reg option:selected").val();
        $("#capa").load("ventas/principal.php?n_reg=1&num_reg="+valor);
        event.preventDefault();
    })
    /*Buscar categoria*/
    $('#like-productos').on('change', function(event){
        var valor;
        valor = $("#like-productos").val();
        $("#capa").load("ventas/principal.php?like=1&valor="+valor);
        event.preventDefault();
    });
})