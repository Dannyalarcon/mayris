<?php 
include 'conexion.php';
$conection = @mysqli_connect($host, $user, $password, $db);

/*se llama la conexion para la base de datos*/
if (strlen($_POST['nombre']) > 0 && strlen($_POST['apellido']) > 0 && 
strlen($_POST['descripcion']) > 0 && strlen($_POST['precio']) > 0 &&  strlen($_POST['telefono']) > 0 && 
strlen($_POST['fecha']) > 0 && strlen($_POST['hora']) > 0 && strlen($_POST['asistencia']) > 0 ){
/*si las siguientes variables son correctas pueden seguir con la siguiente operacion*/


$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];

$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$telefono = $_POST['telefono'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$asistencia = $_POST['asistencia'];

/*se llaman las variables que se ocupan para guardar las variables en la parte de formulario, y tambien se llaman las variables creadas en la base de datos*/
//consulta para insertar

$consulta = "INSERT INTO agenda( nombre, apellido, descripcion, precio, telefono, fecha, hora, asistencia,estatus ) 
VALUES (  '$nombre','$apellido','$descripcion','$precio','$telefono','$fecha','$hora','$asistencia',1)";
/*se crea una consulta para insertar los datos guardados en la variables del formulario y pasarlos a las variables de la base de datos*/
$resultado = mysqli_query($conection, $consulta);
if ($resultado){
/*se valida que este todo correcto, pasara a la siguiente face*/
/*se redirigira a la vista principal cuando haya ingresado los datos a la base de datos*/
    header('Location: agenda.php');
        echo 'Se ingreso un nuevo cliente correctamente';
}else{
    /*si no se a completado dara la siguiente alerta de que no se ingreso nada*/
    echo 'No se ingreso nada';
}
$conection->close();
/*se cierra la conexion*/
}
?>