<?php
//se llama la conexion a la base de datos
include 'conexion.php';
$conection = @mysqli_connect($host, $user, $password, $db);

//se llama el id seleccionado
$id_cliente = $_GET['id'];

//se hace una consulta delete para el id
$query_delete = mysqli_query($conection, "DELETE FROM cliente WHERE id_cliente=$id_cliente");

//si todo esta correcto se elimina el id y se redirige a la vista principal
if($query_delete){
    header('location: cliente_rechazado.php');
    echo 'Se elimino correctamente';
}else{
echo 'No se puede eliminar este cliente aun tiene deudas pendientes';
echo '<br>';
echo '<a class="a" href="cliente.php"><button type="button" class="btn btn-primary"><i class="fas fa-angle-double-left"> regresar</i></button></a>';
}
/*se cierra la conexion*/
?>