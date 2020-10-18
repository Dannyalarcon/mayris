<?php
//se llama la conexion a la base de datos
include 'conexion.php';
$conection = @mysqli_connect($host, $user, $password, $db);

//se llama el id seleccionado
$id_inventario = $_GET['id'];

//se hace una consulta delete para el id
$query_delete = mysqli_query($conection, "DELETE FROM inventario WHERE id_inventario=$id_inventario");

//si todo esta correcto se elimina el id y se redirige a la vista principal
if($query_delete){
    header('location: inventario.php');
    echo 'Se ingreso un nuevo cliente correctamente';
}else{
echo 'No nada';
}
/*se cierra la conexion*/
?>