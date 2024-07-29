<?php
$id = $_GET['id'];
if (!$id) {
    echo 'No se ha seleccionado el proveedor';
    exit;
}
include_once "funciones.php";

$resultado = eliminarProveedor($id);
if(!$resultado){
    echo "Error al eliminar";
    return;
}

header("Location: proveedores.php");

?>
