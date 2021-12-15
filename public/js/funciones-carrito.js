$(document).ready(function(){
    /*Agregar carrito*/
	$("a.add_carrito").click((event)=>{
		var element = $(this)[0].activeElement;
		var id = $(element).attr("id-producto");
		$("#view_carrito").load("ventas/carrito.php?accion=0&id="+id);
        event.preventDefault();
    });
	$("a.delete_product").click((event)=>{
		var element = $(this)[0].activeElement;
		var id = $(element).attr("id-carrito");
		$("#view_carrito").load("ventas/carrito.php?accion=1&id_carrito="+id);
        event.preventDefault();
    });
})