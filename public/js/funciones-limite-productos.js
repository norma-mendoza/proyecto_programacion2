$(document).ready(function () {
  //Funcion para cargar la vista de principal productos
  $("a.limite").click(function (event) {
    $("#contenido-procesos").load(
      "procesos_varios/limite/principal_limite.php"
    );
    event.preventDefault();
  });
  /*Envia el numero de paginas*/
  $("a.pagina").click(function (event) {
    var num, reg;
    num = $(this).attr("v-num");
    reg = $(this).attr("num-reg");
    $("#contenido-procesos").load(
      "procesos_varios/limite/principal_limite.php?num=" +
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
      "procesos_varios/limite/principal_limite.php?n_reg=1&num_reg=" + valor
    );
    event.preventDefault();
  });
  /*Buscar categoria*/
  $("#like-limite-prod").on("change", function (event) {
    var valor;
    valor = $("#like-limite-prod").val();
    $("#contenido-procesos").load(
      "procesos_varios/limite/principal_limite.php?like=1&valor=" + valor
    );
    event.preventDefault();
  });
  /*Cargar formulario para nueva categoria*/
  $("#new-limite-prod").click(function (event) {
    $("#contenido-procesos").load("procesos_varios/limite/form_insert.php");
    event.preventDefault();
  });
  $("#save-limite-prod").click(function (event) {
    var limite_product = $("#limite-product").val();
    var id_product = $("#id_producto option:selected").val();
    if (id_product == "") {
      alertify.alert("Registro", "El producto no esta selecionado");
      event.preventDefault();
    } else if (limite_product == "") {
      alertify.alert("Registro", "El campo limite esta vacio");
      event.preventDefault();
    } else {
      $("#contenido-procesos").load(
        "procesos_varios/limite/IUD_limite.php?option=1&insert_limite=" +
          limite_product +
          "&id_product=" +
          id_product
      );
      event.preventDefault();
    }
  });
  /*Cargar la vista de editar limite*/
  $("a.edit-limite").click(function (event) {
    var id_limite = $(this).attr("id-limite");
    $("#contenido-procesos").load(
      "procesos_varios/limite/edit_limite.php?id-limite=" + id_limite
    );
    event.preventDefault();
  });
  /*Editar formulario para limite*/
  $("#update-limite").click(function (event) {
    var idLimite = $("#id-limite").val();
    var limiteProducto = $("#limite-product").val();
    $("#contenido-procesos").load(
      "procesos_varios/limite/IUD_limite.php?option=2&id-limite=" +
        idLimite +
        "&limite-producto=" +
        limiteProducto
    );
    event.preventDefault();
  });

  /*Eliminar un limite de un producto*/
  $("a.delete-limite").click(function (event) {
    if (confirm("Seguro/a de eliminar el Limite Producto?")) {
      var idLimite = $(this).attr("id-limite");
      $("#contenido-procesos").load("procesos_varios/limite/IUD_limite.php?option=3&id-limite=" + idLimite);
      event.preventDefault();
    } else {
      alertify.alert("Eliminar Limite", "Proceso cancelado..");
      //alert("Proceso cancelado..");
      event.preventDefault();
    }
  });
});
