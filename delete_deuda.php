<?php
//se llama la conexion a la base de datos
include 'conexion.php';

$conection = @mysqli_connect($host, $user, $password, $db);

if ($_SESSION['rol'] != 1) {
    header('location: cliente.php');
  }
//se llama el id seleccionado
$id_deuda = $_GET['id'];

//se hace una consulta delete para el id
$query_delete = mysqli_query($conection, "DELETE FROM deuda WHERE id_deuda=$id_deuda");

//si todo esta correcto se elimina el id y se redirige a la vista principal
if($query_delete){
    header('location: cliente.php');
    echo 'Se ingreso un nuevo cliente correctamente';
}else{
echo 'No nada';
}
/*se cierra la conexion*/
?>