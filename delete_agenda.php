<?php
//se llama la conexion a la base de datos
include 'conexion.php';
$conection = @mysqli_connect($host, $user, $password, $db);

//se llama el id seleccionado
$id_agenda = $_GET['id'];

//se hace una consulta delete para el id
$query_delete = mysqli_query($conection, "DELETE FROM agenda WHERE id_agenda=$id_agenda");

//si todo esta correcto se elimina el id y se redirige a la vista principal
if($query_delete){
    header('location: agenda_fin.php');
    echo 'Se elimino correctamente';
}else{
echo 'No nada';
}
/*se cierra la conexion*/
?>