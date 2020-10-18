<?php
include 'conexion.php';

//creamos la sesión
session_start();
//validamos si se ha hecho o no el inicio de sesión correctamente
//si no se ha hecho la sesión nos regresará a login.php


if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}
if ($_SESSION['rol'] != 1) {
    header('location: principal.php');
}

$id_usuario = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $dpi = $_POST['dpi'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fechadenacimiento = $_POST['fechadenacimiento'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $user = $_POST['user'];
    $pass = md5($_POST['pass']);
    $rol = $_POST['rol'];
    $salario = $_POST['salario'];



    $resultt = mysqli_query($conection, "UPDATE usuario
                                                    SET dpi = '$dpi', nombre = '$nombre', 
                                                    apellido = '$apellido', fechadenacimiento = '$fechadenacimiento',
                                                    correo = '$correo', telefono = '$telefono', 

                                                    direccion = '$direccion', user = '$user',
                                                    pass = MD5('$pass'), rol = '$rol',
                                                    
                                                    salario = '$salario' WHERE id_usuario = $id_usuario");

    if ($resultt) {
        header('location: empleado.php');
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style_edit_agenda.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="icon" href="logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amaranth|Lobster|Philosopher&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Editar Empleado</title>
</head>

<body>
    <nav class="breadcrumbs">
        <a href="principal.php">Inicio</a>

        <span class="last-crumb">Clientes</span>

    </nav>
    <div class="title-box">
        <img class="profile-img-card" src="imagenes/logo1.png" />
        <h1>Modificar empleado</h1>
    </div>
    <center>
        <a title="Atras" class="a" href="empleado.php"><button type="button" class="btn btn-primary"><i class="fas fa-angle-double-left"></i></button></a>
        <a title="Inicio" class="a" href="principal.php"><button type="button" class="btn btn-primary"><i class="fas fa-home"></i></button></a>

    </center>
    <br>
    <div id="formulario" class="container">
        <?php
        include 'conexion.php';

        $id_usuario = $_GET['id'];
        $result = mysqli_query($conection, "SELECT usuario.id_usuario, 
                                                    usuario.dpi, usuario.nombre, 
                                                    usuario.apellido, usuario.fechadenacimiento, 
                                                    usuario.correo, usuario.telefono, 
                                                    usuario.direccion, usuario.user, 
                                                    usuario.pass, usuario.rol, 
                                                    usuario.salario, rol.rol 

                                                        FROM usuario 
                                                        INNER JOIN rol 
                                                        on usuario.rol = rol.id_rol
                                                        WHERE id_usuario= $id_usuario");
        $row = mysqli_fetch_assoc($result);


        //consulta para mostrar los datos


        ?>


        <form action="" method="post">
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
                    <center><label for="text"><b>dpi</b></label></center>
                    <input type="text" name="dpi" autocomplete="off" class="form-control" placeholder="dpi" value="<?php echo $row['dpi'] ?>" required />
                </div>
                <div class="form-group col-md-4">
                    <center><label for="text"><b>Nombre</b></label></center>
                    <input type="text" name="nombre" autocomplete="off" class="form-control" placeholder="Nombre" value="<?php echo $row['nombre'] ?>" required />
                </div>
                <div class="form-group col-md-4">
                    <center> <label for="text"><b>Apellido</b></label></center>
                    <input type="text" name="apellido" autocomplete="off" class="form-control" placeholder="Apellido" value="<?php echo $row['apellido'] ?>" required />
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <center><label for="text"><b>fechadenacimiento</b></label></center>
                    <input type="date" name="fechadenacimiento" autocomplete="off" class="form-control" placeholder="00/00/2020" value="<?php echo $row['fechadenacimiento'] ?>" required />
                </div>
                <div class="form-group col-md-4">
                    <center><label for="text"><b>correo</b></label></center>
                    <input type="text" name="correo" autocomplete="off" class="form-control" placeholder="ejemplo@gmail.com" value="<?php echo $row['correo'] ?>" required />
                </div>
                <div class="form-group col-md-4">
                    <center> <label for="text"><b>telefono</b></label></center>
                    <input type="text" name="telefono" autocomplete="off" class="form-control" placeholder="1234-5678" value="<?php echo $row['telefono'] ?>" required />
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <center> <label for="text"><b>direccion</b></label></center>
                    <input type="text" autocomplete="off" name="direccion" class="form-control" id="inputAddress" placeholder="usuario" value="<?php echo $row['direccion'] ?>" required />
                </div>
                <div class="form-group col-md-4">
                    <center> <label for="text"><b>user</b></label></center>
                    <input type="text" autocomplete="off" name="user" class="form-control" id="inputAddress" placeholder="usuario" value="<?php echo $row['user'] ?>" required />
                </div>

                <div class="form-group col-md-4">
                    <center> <label for="text"><b>pass</b></label></center>
                    <input type="text" autocomplete="off" name="pass" class="form-control" id="inputAddress" placeholder="password" value="<?php echo $row['pass'] ?>" required />
                </div>

            </div>
            <div class="form-row center">
                <div class="form-group col-md-4">
                    <center><label class="" for="rol">Tipo de Usuario</label></center>
                    <?php
                    include "conexion.php";
                    $query_rol = mysqli_query($conection, "SELECT * FROM rol");
                    mysqli_close($conection);
                    $result_rol = mysqli_num_rows($query_rol);
                    ?>

                    <select class="form-control" name="rol" id="rol">
                        <option value="<?php echo $row["rol"]; ?>"><?php echo $row["rol"] ?></option>

                        <?php

                        echo $option;
                        if ($result_rol > 0) {
                            while ($rol = mysqli_fetch_array($query_rol)) {
                        ?>

                                <option value="<?php echo $rol["id_rol"]; ?>"><?php echo $rol["rol"] ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <center> <label for="text"><b>salario</b></label></center>
                    <input type="text" autocomplete="off" name="salario" class="form-control" id="inputAddress" placeholder="Q.00.00" value="<?php echo $row['salario'] ?>" required />
                </div>
            </div>
            <center>
                <input title="guardar" class="Fields" type="submit" name="Guardar" />
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