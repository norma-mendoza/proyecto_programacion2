<?php
$cont = 0;
$pagina = 0;

if (isset($_GET['num'])) {
    $pagina = $_GET['num'];
}
//Definir el numero de registross
if (isset($_GET['n_reg']) || isset($_GET['num'])) {
    $registros = $_GET['num_reg'];
} else {
    $registros = 3;
}

//Definir el inicio a la pagina a mostrar
if (!$pagina) {
    $inicio = 0;
    $pagina = 1;
} else {
    $inicio = ($pagina - 1) * $registros;
}
$query = "SELECT * FROM clientes"; //Total de registro para paginado

if (isset($_GET['like'])) {
    $valor = $_GET['valor'];
    $queryCate = "SELECT * FROM clientes WHERE nombres LIKE '%$valor%'";
} else {
    $queryCate = "SELECT * FROM clientes ORDER BY id_cliente LIMIT $inicio, $registros";
}

$DataCategorias = SelectData($queryCate, "i");
$num_registro = NumReg($query);
$paginas = ceil($num_registro / $registros);

?>