<?php
include 'conexion.php';
$conection = @mysqli_connect($host, $user, $password, $db);
session_start();
/* si el rol de la sesion iniciada 
*es igual a 1 se puede acceder,
*de lo contrario devolvera a la lista de usuarios
*/
if ($_SESSION['rol'] != 1) {
    header('location:  inventario.php');
}

//validamos si se ha hecho o no el inicio de sesión correctamente
//si no se ha hecho la sesión nos regresará a login.php
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}

$id = $_GET['id'];
//consulta para mostrar los datos
$result = mysqli_query($conection, "SELECT * FROM inventario WHERE id_inventario = '$id'");
$row = mysqli_fetch_assoc($result);
//Acutalizar datos de la DB
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $producto = $_POST['producto'];
    $precio = $_POST['precio'];

    $cantidad = $_POST['cantidad'];


    $resultt = mysqli_query($conection, "UPDATE inventario SET producto = '$producto',precio = '$precio',cantidad = '$cantidad' WHERE id_inventario = '$id'");
    if ($resultt) {

        header('location: inventario.php');
    } else {
        echo " <div class='alert alert-primary' role='alert'>
               error al editar
                
              </div>  ";
    }
}
mysqli_close($conection);


?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/form_edit.css">
    <link rel="icon" href="imagenes/logs.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amaranth|Lobster|Philosopher&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Modificar Producto</title>
</head>

<body>
<nav class="breadcrumbs">
    <a title="Inicio" class="a" href="principal.php">Inicio</a>
    <a title="Inventario" class="a" href="inventario.php">Inventario</a>
    <span class="last-crumb">Modificar Producto</span>
</nav>
    <div class="title-box">
        <img class="profile-img-card" src="imagenes/logo1.png" />
        <h1>Modificar Cita</h1>
    </div>
    <center>
    <a title="Atras" class="a" href="inventario.php"><button type="button" class="btn btn-primary"><i class="fas fa-angle-double-left"></i></button></a>
    <a title="Inicio" class="a" href="principal.php"><button type="button" class="btn btn-primary"><i class="fas fa-home"></i></button></a>    
</center>
<br>
    <div id="formulario" class="container">



        <form action="" method="POST">
            <div class="form-row">
                <div class="form-group col-md-4">
                </div>
                <div class="form-group col-md-4">
                    <center><label for="text"><b>Nº</b></label></center>
                    <input type="" name="id" autocomplete="off" class="form-control" value="<?php echo $row['id_inventario'] ?>" disabled />
                </div>
            </div>
            <div class="form-row">

                <div class="form-group col-md-4">
                    <center><label for="text"><b>producto</b></label></center>
                    <input type="text" name="producto" autocomplete="off" class="form-control" placeholder="producto" value="<?php echo $row['producto'] ?>" required />
                </div>
                <div class="form-group col-md-4">
                    <center> <label for="text"><b>precio</b></label></center>
                    <input type="text" name="precio" autocomplete="off" class="form-control" placeholder="precio" value="<?php echo $row['precio'] ?>" required />
                </div>
       
                <div class="form-group col-md-4">
                    <center> <label for="text"><b>cantidad</b></label></center>
                    <input type="number" autocomplete="off" name="cantidad" class="form-control" placeholder="cantidad" value="<?php echo $row['cantidad'] ?>" required />
                </div>
  
            </div>
   
   
            <center>
                <input class="Fields" type="submit" name="Guardar" />
            </center>
        </form>
    </div>
    <br>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>