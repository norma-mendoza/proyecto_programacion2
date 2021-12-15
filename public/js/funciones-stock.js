$(document).ready(function () {
    //Funcion para cargar la vista de principal productos
    $("a.stock").click(function (event) {
      $("#contenido-procesos").load(
        "procesos_varios/inventario/principal_stock.php"
      );
      event.preventDefault();
    });
    /*Envia el numero de paginas*/
    $("a.pagina").click(function (event) {
      var num, reg;
      num = $(this).attr("v-num");
      reg = $(this).attr("num-reg");
      $("#contenido-procesos").load(
        "procesos_varios/inventario/principal_stock.php?num=" +
          num +
          "&num_reg=" +
          reg
      );
      event.preventDefault();
    });
    /*Aumentar el numero de registro tabla categoria*/
    $("#select-reg").on("change", function (event) {
      var valor;
      valor = $("#select-reg option:selected").val();
      $("#contenido-procesos").load(
        "procesos_varios/inventario/principal_stock.php?n_reg=1&num_reg=" + valor
      );
      event.preventDefault();
    });
    /*Buscar categoria*/
    $("#like-stock").on("change", function (event) {
      var valor;
      valor = $("#like-stock").val();
      $("#contenido-procesos").load(
        "procesos_varios/inventario/principal_stock.php?like=1&valor=" + valor
      );
      event.preventDefault();
    });
    /*Cargar formulario para nueva categoria*/
    $("#new-limite-prod").click(function (event) {
      $("#contenido-procesos").load("procesos_varios/inventario/principal_stock.php");
      event.preventDefault();
    });
    /*Cargar la vista de editar limite*/
    $("a.edit-stock").click(function (event) {
      var id_stock = $(this).attr("id-stock");
      $("#contenido-procesos").load(
        "procesos_varios/inventario/edit_stock.php?id-stock=" + id_stock
      );
      event.preventDefault();
    });
    /*Editar formulario para limite*/
    $("#update-stock").click(function (event) {
      var id_stock = $("#id-stock").val();
      var stock = $("#stock").val();
      $("#contenido-procesos").load(
        "procesos_varios/inventario/IUD_stock.php?option=2&id-stock=" +
        id_stock +
          "&stock=" +
          stock
      );
      event.preventDefault();
    });
  
    /*Eliminar un limite de un producto*/
   /*Eliminar un limite de un producto*/
   $("a.delete-stock").click(function (event) {
    if (confirm("Seguro/a desactivar del inventario?")) {
      var id_inventario = $(this).attr("id-stock");
      var estado = $(this).attr("estado");
      $("#contenido-procesos").load("procesos_varios/inventario/mod_estado.php?estado="+estado+"&id-stock=" + id_inventario);
      event.preventDefault();
    } else {
      alertify.alert("Acción", "Cancelado..");
      //alert("Proceso cancelado..");
      event.preventDefault();
    }
  });
  });
  