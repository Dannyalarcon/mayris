<?php 
include 'conexion.php';

/*se llama la conexion para la base de datos*/
if (empty($_GET['cl']) || empty($_POST['descripcion']) || empty($_POST['precio']) || empty($_POST['fecha'])){
    /*si las siguientes variables son correctas pueden seguir con la siguiente operacion*/
           
            $descripcion = $_POST['descripcion'];
            $cl = $_POST['cl'];
            $precio = $_POST['precio'];
            $fecha = $_POST['fecha'];
    
    
            $query_insert = mysqli_query($conection,"INSERT INTO deuda( descripcion, precio, fecha, id_cliente) 
            VALUES (  '$descripcion','$precio','$fecha','$cl')");
            /*se crea una consulta para insertar los datos guardados en la variables del formulario y pasarlos a las variables de la base de datos*/
            mysqli_close($conection);
                                if($query_insert){
                                    header('location:cliente.php');
                                }   
              }

    
?>