<?php
//se llama la conexion a la base de datos
include 'conexion.php';
$conection = @mysqli_connect($host, $user, $password, $db);

//se llama el id seleccionado
$id_usuario = $_GET['id'];

//se hace una consulta delete para el id
$query_delete = mysqli_query($conection, "UPDATE usuario SET estatus = '1' WHERE id_usuario=$id_usuario");

//si todo esta correcto se elimina el id y se redirige a la vista principal
if($query_delete){
    header('location: empleado.php');
    echo 'Se elimino correctamente';
}else{
echo 'No nada';
}
/*se cierra la conexion*/
?>