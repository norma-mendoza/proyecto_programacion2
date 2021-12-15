$(document).ready(function(){
    /*Envia el numero de paginas*/
    $("a.pagina").click(function(event){
        var num, reg;
        num = $(this).attr("v-num");
        reg = $(this).attr("num-reg");
        $("#contenido-procesos").load("procesos_varios/sucursal/principal.php?num=" + num +"&num_reg="+reg);
        event.preventDefault();
    })
    /*Modifica el logo*/
    $("#add-logo").on("submit",(event)=>{
        event.preventDefault();
        var formData = new FormData(document.getElementById('add-logo'));
        $.ajax({
            url: "configuracion/add_logo.php",
            type: "post",
            dataType: "html",
            data: formData,
            contentType: false,
            processData: false
        }).done(function(res){
            $("#capa").html(res);
        })
    });
    /*Modifica el banner*/
    $("#add-banner").on("submit",(event)=>{
        event.preventDefault();
        var formData = new FormData(document.getElementById('add-banner'));
        $.ajax({
            url: "configuracion/add_banner.php",
            type: "post",
            dataType: "html",
            data: formData,
            contentType: false,
            processData: false
        }).done(function(res){
            $("#capa").html(res);
        })
    });
});
