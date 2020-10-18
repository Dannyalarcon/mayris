<?php 
include 'conexion.php';
$conection = @mysqli_connect($host, $user, $password, $db);


/*se llama la conexion para la base de datos*/
if (strlen($_POST['dpi']) > 0 &&
strlen($_POST['nombre']) > 0 &&
strlen($_POST['apellido']) > 0 && 
strlen($_POST['fechadenacimiento']) > 0 &&
strlen($_POST['correo']) > 0 && 
strlen($_POST['telefono']) > 0 && 
strlen($_POST['direccion']) > 0 &&
strlen($_POST['user']) > 0 && 
strlen($_POST['pass']) > 0 && 
strlen($_POST['salario']) > 0 ){
/*si las siguientes variables son correctas pueden seguir con la siguiente operacion*/


$dpi = $_POST['dpi'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$fechadenacimiento = $_POST['fechadenacimiento'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$user = $_POST['user'];
$estatus = $_POST['estatus'];
$pass = md5($_POST['pass']);
$rol = $_POST['rol'];
$salario = $_POST['salario'];

/*se llaman las variables que se ocupan para guardar las variables en la parte de formulario, y tambien se llaman las variables creadas en la base de datos*/
//consulta para insertar

$consulta = "INSERT INTO usuario (dpi, nombre, apellido, fechadenacimiento, correo, telefono, direccion, user, estatus,pass, rol, salario) 
VALUES ( '$dpi','$nombre','$apellido','$fechadenacimiento','$correo','$telefono','$direccion','$user',1,'$pass','$rol','$salario')";
/*se crea una consulta para insertar los datos guardados en la variables del formulario y pasarlos a las variables de la base de datos*/
$resultado = mysqli_query($conection, $consulta);
if ($resultado){
/*se valida que este todo correcto, pasara a la siguiente face*/
/*se redirigira a la vista principal cuando haya ingresado los datos a la base de datos*/
    header('Location: empleado.php');
        echo 'Se ingreso un nuevo cliente correctamente';
}else{
    /*si no se a completado dara la siguiente alerta de que no se ingreso nada*/
    echo 'No se ingreso nada';
}
$conection->close();
/*se cierra la conexion*/
}
