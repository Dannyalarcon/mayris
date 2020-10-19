<?php
include 'conexion.php';
$conection = @mysqli_connect($host, $user, $password, $db);
session_start();
/* si el rol de la sesion iniciada 
*es igual a 1 se puede acceder,
*de lo contrario devolvera a la lista de usuarios
*/
if ($_SESSION['rol'] != 1) {
    header('location:  empleado.php');
}

//validamos si se ha hecho o no el inicio de sesión correctamente
//si no se ha hecho la sesión nos regresará a login.php
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}
$id = $_GET['id'];
$sql = mysqli_query($conection, "SELECT u.id_usuario,
 u.dpi,
  u.nombre,
   u.apellido,
   u.fechadenacimiento,
   u.direccion,
    u.correo, 
    u.telefono,
     u.salario, 
     u.user, 
     u.pass,
     u.estatus,
      r.rol 
FROM usuario u 
INNER JOIN rol r on u.rol = r.id_rol 
WHERE u.id_usuario = '$id'
ORDER BY u.id_usuario ASC");
mysqli_close($conection);

$row = mysqli_fetch_array($sql)
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style_edit_agenda.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="icon" href="imagenes/logs.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amaranth|Lobster|Philosopher&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>View Empleado</title>
</head>

<body>
    <nav class="breadcrumbs">
        <a href="principal.php">Inicio</a>
        <a href="empleado.php">Empleado</a>

        <span class="last-crumb">View Empleado</span>

    </nav>
    <div class="title-box">
        <img class="profile-img-card" src="imagenes/logo1.png" />
        <h1>View Empleado</h1>
    </div>
    <center>

        <a title="Atras" class="a" href="empleado.php"><button type="button" class="btn btn-primary"><i class="fas fa-angle-double-left"></i></button></a>
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
                    <input type="" name="id" autocomplete="off" class="form-control" value="<?php echo $row['id_usuario'] ?>" disabled />
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <center><label for="text"><b>DPI</b></label></center>
                    <input type="text" name="dpi" autocomplete="off" class="form-control" placeholder="dpi" value="<?php echo $row['dpi'] ?>" disabled />
                </div>
                <div class="form-group col-md-4">
                    <center><label for="text"><b>Nombre</b></label></center>
                    <input type="text" name="nombre" autocomplete="off" class="form-control" placeholder="Nombre" value="<?php echo $row['nombre'] ?>" disabled />
                </div>
                <div class="form-group col-md-4">
                    <center> <label for="text"><b>Apellido</b></label></center>
                    <input type="text" name="apellido" autocomplete="off" class="form-control" placeholder="Apellido" value="<?php echo $row['apellido'] ?>" disabled />
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <center><label for="text"><b>Fecha de nacimiento</b></label></center>
                    <input type="date" name="fechadenacimiento" autocomplete="off" class="form-control" placeholder="00/00/2020" value="<?php echo $row['fechadenacimiento'] ?>" disabled />
                </div>
                <div class="form-group col-md-4">
                    <center><label for="text"><b>Correo</b></label></center>
                    <input type="text" name="correo" autocomplete="off" class="form-control" placeholder="ejemplo@gmail.com" value="<?php echo $row['correo'] ?>" disabled />
                </div>
                <div class="form-group col-md-4">
                    <center> <label for="text"><b>Teléfono</b></label></center>
                    <input type="text" name="telefono" autocomplete="off" class="form-control" placeholder="1234-5678" value="<?php echo $row['telefono'] ?>" disabled />
                </div>
            </div>

            <div class="form-row center">
                <div class="form-group col-md-4">
                    <center> <label for="text"><b>Rol</b></label></center>
                    <input type="text" autocomplete="off" name="estatus" class="form-control" id="inputAddress" placeholder="estatus" value="<?php echo $row['rol'] ?>" disabled />
                </div>
                <div class="form-group col-md-4">
                    <center> <label for="text"><b>Dirección</b></label></center>
                    <input type="text" autocomplete="off" name="direccion" class="form-control" id="inputAddress" placeholder="usuario" value="<?php echo $row['direccion'] ?>" disabled />
                </div>
                <div class="form-group col-md-4">
                    <center> <label for="text"><b>Salario</b></label></center>
                    <input type="text" autocomplete="off" name="salario" class="form-control" id="inputAddress" placeholder="Q.00.00" value="<?php echo $row['salario'] ?>" disabled />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                <center> <label for="text"><b>Usuario</b></label></center>
                    <input type="text" autocomplete="off" name="estatus" class="form-control" id="inputAddress" placeholder="Usuario" value="<?php echo $row['user'] ?>" disabled />
                </div>
                <div class="form-group col-md-4">
                <center> <label for="text"><b>Contraseñ</b></label></center>
                    <input type="text" autocomplete="off" name="estatus" class="form-control" id="inputAddress" placeholder="pass" value="<?php echo $row['pass'] ?>" disabled />
                </div>
                <div class="form-group col-md-4">
                    <center> <label for="text"><b>Estatus</b></label></center>
                    <input type="text" autocomplete="off" name="estatus" class="form-control" id="inputAddress" placeholder="estatus" value="<?php echo $row['estatus'] ?>" disabled />
                </div>
            </div>
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