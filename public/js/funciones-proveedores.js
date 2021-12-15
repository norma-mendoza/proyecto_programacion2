$(document).ready(function(){
    //Funcion para cargar la vista de principal proveedor
    $("a.proveedor").click(function(event){
        $("#contenido-procesos").load("procesos_varios/proveedor/principal_proveedor.php");
        event.preventDefault();
    });
    /*Envia el numero de paginas*/
    $("a.pagina").click(function(event){
        var num, reg;
        num = $(this).attr("v-num");
        reg = $(this).attr("num-reg");
        $("#contenido-procesos").load("procesos_varios/proveedor/principal_proveedor.php?num=" + num +"&num_reg="+reg);
        event.preventDefault();
    })
    /*Aumentar el numero de registro tabla categoria*/
    $('#select-reg').on('change', function(event){
        var valor;
        valor = $("#select-reg option:selected").val();
        $("#contenido-procesos").load("procesos_varios/proveedor/principal_proveedor.php?n_reg=1&num_reg="+valor);
        event.preventDefault();
    })
    /*Buscar categoria*/
    $('#like-proveedor').on('change', function(event){
        var valor;
        valor = $("#like-proveedor").val();
        $("#contenido-procesos").load("procesos_varios/proveedor/principal_proveedor.php?like=1&valor="+valor);
        event.preventDefault();
    });
    /*Cargar formulario para nueva categoria*/
    $("#new-proveedor").click(function(event){
        $("#contenido-procesos").load("procesos_varios/proveedor/form_insert.php");
        event.preventDefault();
    });
    //Obtener los datos del formulario de registro de nuevo producto
    $("#add-proveedor").on('submit',function(event){
        event.preventDefault();

        var formData = new FormData(document.getElementById('add-proveedor'));
        formData.append("dato","valor");
        $.ajax({
            url: "procesos_varios/proveedor/save_proveedor.php",
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        }).done(function(res){
            $("#contenido-procesos").html(res);
        })
    })
    //Cargar formulario de editar para proveedor
    $("a.edit-proveedores").click(function(event){
        var id_proveedor;
        id_proveedor = $(this).attr("id-proveedor");
        $("#contenido-procesos").load("procesos_varios/proveedor/edit_proveedores.php?id-proveedor="+id_proveedor);
        event.preventDefault();
    });
    //Update proveedor
    $("#update-proveedores").on("submit",(event)=>{
        event.preventDefault();
        var formData = new FormData(document.getElementById('update-proveedores'));
        $.ajax({
            url: "procesos_varios/proveedor/update_proveedor.php",
            type: "post",
            dataType: "html",
            data: formData,
            contentType: false,
            processData: false
        }).done(function(res){
            $("#contenido-procesos").html(res);
        })
    })
    //Eliminar proveedor
    $("a.del-proveedor").click(function(event){
        if(confirm("Eliminar de forma permanente")){
            var id_prov = $(this).attr("id-proveedor");
            $("#contenido-procesos").load("procesos_varios/proveedor/delete_proveedor.php?id-prov="+id_prov);
            event.preventDefault();
        }
        
    });
});
