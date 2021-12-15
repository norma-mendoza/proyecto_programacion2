$(document).ready(function(){
    //Funcion para cargar la vista de principal categorias
    $("a.categorias").click(function(event){
        event.preventDefault();
        $("#contenido-procesos").load("procesos_varios/categorias/principal_categorias.php");
        
    });
    /*Envia el numero de paginas*/
    $("a.pagina").click(function(event){
        var num, reg;
        num = $(this).attr("v-num");
        reg = $(this).attr("num-reg");
        $("#contenido-procesos").load("procesos_varios/categorias/principal_categorias.php?num=" + num +"&num_reg="+reg);
        event.preventDefault();
    })
    /*Aumentar el numero de registro tabla categoria*/
    $('#select-reg').on('change', function(event){
        var valor;
        valor = $("#select-reg option:selected").val();
        $("#contenido-procesos").load("procesos_varios/categorias/principal_categorias.php?n_reg=1&num_reg="+valor);
        event.preventDefault();
    })
    /*Buscar categoria*/
    $('#like-categoria').on('change', function(event){
        var valor;
        valor = $("#like-categoria").val();
        $("#contenido-procesos").load("procesos_varios/categorias/principal_categorias.php?like=1&valor="+valor);
        event.preventDefault();
    });
    /*Cargar formulario para nueva categoria*/
    $("#new-cate").click(function(event){
        $("#contenido-procesos").load("procesos_varios/categorias/form_insert.php");
        event.preventDefault();
    });
    $("#save-categoria").click(function(event){
        var categoria = $("#categoria").val();
        if(categoria == ""){
            alertify.alert("Registro","El campo categoria esta vacio")
            event.preventDefault();
        }else{
            $("#contenido-procesos").load("procesos_varios/categorias/IUD_categoria.php?insert_cate=1&categoria="+categoria);
            event.preventDefault();
        }
    })
    //Cargar categoria
    $("a.edit-categoria").click(function(event){
        var id_cate;
        id_cate = $(this).attr("id-categoria");
        $("#contenido-procesos").load("procesos_varios/categorias/edit_categoria.php?id-cate="+id_cate);
        event.preventDefault();
    });
    //Update categoria
    $("#update-categoria").on("submit",(event)=>{
        event.preventDefault();
        //Obj para obtener el formulario
        var formData = new FormData(document.getElementById('update-categoria'));
        $.ajax({
            url: "procesos_varios/categorias/IUD_categoria.php",
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        }).done((res)=>{
            $("#contenido-procesos").html(res);
        })
    })
    /*Eliminar una categoria*/
  $("a.del-categoria").click(function (event) {
    if (confirm("Seguro/a de eliminarla categoria?")) {
      var idCategoria = $(this).attr("id-categoria");
      $("#contenido-procesos").load("procesos_varios/categorias/delete_cate.php?delete_cate=1&id-cate=" + idCategoria);
      event.preventDefault();
    } else {
      alertify.alert("Eliminar Categoria", "Proceso cancelado..");
      //alert("Proceso cancelado..");
      event.preventDefault();
    }
  });
});
