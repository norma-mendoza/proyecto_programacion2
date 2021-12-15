$(document).ready(function(){
    //Funcion para cargar la vista de principal sucursal
    $("a.sucursal").click(function(event){
        event.preventDefault();
        $("#contenido-procesos").load("procesos_varios/sucursal/principal.php");
        
    });
    /*Envia el numero de paginas*/
    $("a.pagina").click(function(event){
        var num, reg;
        num = $(this).attr("v-num");
        reg = $(this).attr("num-reg");
        $("#contenido-procesos").load("procesos_varios/sucursal/principal.php?num=" + num +"&num_reg="+reg);
        event.preventDefault();
    })
    /*Aumentar el numero de registro tabla sucursal*/
    $('#select-reg').on('change', function(event){
        var valor;
        valor = $("#select-reg option:selected").val();
        $("#contenido-procesos").load("procesos_varios/sucursal/principal.php?n_reg=1&num_reg="+valor);
        event.preventDefault();
    })
    /*Buscar sucursal*/
    $('#like-sucursal').on('change', function(event){
        var valor;
        valor = $("#like-sucursal").val();
        $("#contenido-procesos").load("procesos_varios/sucursal/principal.php?like=1&valor="+valor);
        event.preventDefault();
    });
    /*Cargar formulario para nueva sucursal*/
    $("#new-sucursal").click(function(event){
        $("#contenido-procesos").load("procesos_varios/sucursal/form_insert.php");
        event.preventDefault();
    });
    /*Guardar los datos de sucursal*/
    $("#add-sucursal").on("submit",(event)=>{
        event.preventDefault();
        var formData = new FormData(document.getElementById('add-sucursal'));
        $.ajax({
            url: "procesos_varios/sucursal/save_sucursal.php",
            type: "post",
            dataType: "html",
            data: formData,
            contentType: false,
            processData: false
        }).done(function(res){
            $("#contenido-procesos").html(res);
        })
    });
    //Cargar formulario de editar para sucursal
    $("a.edit-sucursal").click(function(event){
        var id_sucursal;
        id_sucursal = $(this).attr("id-empresa");
        $("#contenido-procesos").load("procesos_varios/sucursal/edit_sucursal.php?id-sucursal="+id_sucursal);
        event.preventDefault();
    });
    //Update sucursal
    $("#update-sucursal").on("submit",(event)=>{
        event.preventDefault();
        var formData = new FormData(document.getElementById('update-sucursal'));
        $.ajax({
            url: "procesos_varios/sucursal/update_sucursal.php",
            type: "post",
            dataType: "html",
            data: formData,
            contentType: false,
            processData: false
        }).done(function(res){
            $("#contenido-procesos").html(res);
        })
    })
    /*Eliminar una sucursal*/
  $("a.del-sucursal").click(function (event) {
    if (confirm("Seguro/a de eliminarla sucursal?")) {
      var idSucursal = $(this).attr("id-empresa");
      $("#contenido-procesos").load("procesos_varios/sucursal/delete_sucursal.php?id_sucursal="+idSucursal);
      event.preventDefault();
    } else {
      alertify.alert("Eliminar sucursal", "Proceso cancelado..");
      //alert("Proceso cancelado..");
      event.preventDefault();
    }
  });
});
