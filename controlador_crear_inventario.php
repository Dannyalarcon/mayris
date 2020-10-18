<?php 
include 'conexion.php';
$conection = @mysqli_connect($host, $user, $password, $db);

/*se llama la conexion para la base de datos*/
if (strlen($_POST['producto']) > 0 && strlen($_POST['precio']) > 0 && strlen($_POST['cantidad']) > 0 ){
/*si las siguientes variables son correctas pueden seguir con la siguiente operacion*/


$producto = $_POST['producto'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];


/*se llaman las variables que se ocupan para guardar las variables en la parte de formulario, y tambien se llaman las variables creadas en la base de datos*/
//consulta para insertar

$consulta = "INSERT INTO inventario( producto, precio, cantidad) 
VALUES (  '$producto','$precio','$cantidad')";
/*se crea una consulta para insertar los datos guardados en la variables del formulario y pasarlos a las variables de la base de datos*/
$resultado = mysqli_query($conection, $consulta);
if ($resultado){
/*se valida que este todo correcto, pasara a la siguiente face*/
/*se redirigira a la vista principal cuando haya ingresado los datos a la base de datos*/
    header('Location: inventario.php');
        echo 'Se ingreso un nuevo producto correctamente';
}else{
    /*si no se a completado dara la siguiente alerta de que no se ingreso nada*/
    echo 'No se ingreso nada';
}
$conection->close();
/*se cierra la conexion*/
}
?>