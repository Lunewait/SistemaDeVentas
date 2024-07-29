<?php
include_once "encabezado.php";
include_once "navbar.php";
session_start();

if(empty($_SESSION['usuario'])) header("location: login.php");

$id = $_GET['id'];
if (!$id) {
    echo 'No se ha seleccionado el proveedor';
    exit;
}
include_once "funciones.php";
$proveedor = obtenerProveedorPorId($id);
?>

<div class="container">
    <h3>Editar proveedor</h3>
    <form method="post">
        <div class="mb-3">
            <label for="nomproveedor" class="form-label">Nombre del proveedor</label>
            <input type="text" name="nomproveedor" class="form-control" value="<?php echo $proveedor->nomproveedor;?>" id="nomproveedor" placeholder="Escribe el nombre del proveedor">
        </div>
        <div class="mb-3">
            <label for="rucproveedor" class="form-label">RUC del proveedor</label>
            <input type="text" name="rucproveedor" class="form-control" value="<?php echo $proveedor->rucproveedor;?>" id="rucproveedor" placeholder="Escribe el RUC del proveedor">
        </div>
        <div class="mb-3">
            <label for="dirproveedor" class="form-label">Dirección</label>
            <input type="text" name="dirproveedor" class="form-control" value="<?php echo $proveedor->dirproveedor;?>" id="dirproveedor" placeholder="Escribe la dirección del proveedor">
        </div>
        <div class="mb-3">
            <label for="telproveedor" class="form-label">Teléfono</label>
            <input type="text" name="telproveedor" class="form-control" value="<?php echo $proveedor->telproveedor;?>" id="telproveedor" placeholder="Ej. 2111568974">
        </div>
        <div class="mb-3">
            <label for="emailproveedor" class="form-label">Email</label>
            <input type="text" name="emailproveedor" class="form-control" value="<?php echo $proveedor->emailproveedor;?>" id="emailproveedor" placeholder="Ej. proveedor@example.com">
        </div>

        <div class="text-center mt-3">
            <input type="submit" name="registrar" value="Registrar" class="btn btn-primary btn-lg">
            <a href="proveedores.php" class="btn btn-danger btn-lg">
                <i class="fa fa-times"></i> 
                Cancelar
            </a>
        </div>
    </form>
</div>
<?php
if(isset($_POST['registrar'])){
    $nomproveedor = $_POST['nomproveedor'];
    $rucproveedor = $_POST['rucproveedor'];
    $dirproveedor = $_POST['dirproveedor'];
    $telproveedor = $_POST['telproveedor'];
    $emailproveedor = $_POST['emailproveedor'];
    if(empty($nomproveedor) || empty($rucproveedor) || empty($dirproveedor) || empty($telproveedor) || empty($emailproveedor)){
        echo'
        <div class="alert alert-danger mt-3" role="alert">
            Debes completar todos los datos.
        </div>';
        return;
    } 

    include_once "funciones.php";
    $resultado = editarProveedor($nomproveedor, $rucproveedor, $dirproveedor, $telproveedor, $emailproveedor, $id);
    if($resultado){
        echo'
        <div class="alert alert-success mt-3" role="alert">
            Información del proveedor actualizada con éxito.
        </div>';
    }
}
?>

