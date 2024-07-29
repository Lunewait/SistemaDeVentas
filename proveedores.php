<?php
include_once "encabezado.php";
include_once "navbar.php";
include_once "funciones.php";
session_start();

if(empty($_SESSION['usuario'])) header("location: login.php");

$proveedores = obtenerProveedores();
?>
<div class="container">
    <h1>
        <a class="btn btn-success btn-lg" href="agregar_proveedor.php">
            <i class="fa fa-plus"></i>
            Agregar
        </a>
        Proveedores
    </h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>RUC</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($proveedores as $proveedor){
            ?>
                <tr>
                    <td><?php echo $proveedor->nomproveedor; ?></td>
                    <td><?php echo $proveedor->rucproveedor; ?></td>
                    <td><?php echo $proveedor->dirproveedor; ?></td>
                    <td><?php echo $proveedor->telproveedor; ?></td>
                    <td><?php echo $proveedor->emailproveedor; ?></td>
                    <td>
                        <a class="btn btn-info" href="editar_proveedor.php?id=<?php echo $proveedor->id;?>">
                            <i class="fa fa-edit"></i>
                            Editar
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="eliminar_proveedor.php?id=<?php echo $proveedor->id;?>">
                            <i class="fa fa-trash"></i>
                            Eliminar
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
