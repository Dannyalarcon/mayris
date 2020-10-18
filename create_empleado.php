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
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/form_create.css">
    <link rel="icon" href="imagenes/logs.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amaranth|Lobster|Philosopher&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


    <title>Crear Empleado</title>
</head>

<body>
    <nav class="breadcrumbs">
        <a title="Inicio" class="a" href="principal.php">Inicio</a>
        <a title="Empleado" class="a" href="empleado.php">Empleado</a>
        <span class="last-crumb">Crear Empleado</span>
    </nav>
    <div class="title-box">
        <img class="profile-img-card" src="imagenes/logo1.png" />
        <h1>Crear Empleado</h1>
    </div>
    <center>
        <a title="Atras" class="a" href="empleado.php"><button type="button" class="btn btn-primary"><i class="fas fa-angle-double-left"></i></button></a>
        <a title="Inicio" class="a" href="principal.php"><button type="button" class="btn btn-primary"><i class="fas fa-home"></i></button></a>
    </center>

    <br>
    <div id="formulario" class="container">
        <form action="controlador_crear_empleado.php" method="post">

            <div class="form-row">
                <div class="form-group col-md-4">
                    <center><label for="text"><b>DPI</b></label></center>
                    <input type="text" name="dpi" autocomplete="off" class="form-control" placeholder="DPI" required />
                </div>
                <div class="form-group col-md-4">
                    <center><label for="text"><b>Nombre</b></label></center>
                    <input type="text" name="nombre" autocomplete="off" class="form-control" placeholder="Nombre" required />
                </div>
                <div class="form-group col-md-4">
                    <center> <label for="text"><b>Apellido</b></label></center>
                    <input type="text" name="apellido" autocomplete="off" class="form-control" placeholder="Apellido" required />
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <center><label for="text"><b>Fecha De Nacimiento</b></label></center>
                    <input type="date" name="fechadenacimiento" autocomplete="off" class="form-control" placeholder="00/00/2020" required />
                </div>
                <div class="form-group col-md-4">
                    <center><label for="text"><b>Correo</b></label></center>
                    <input type="email" name="correo" autocomplete="off" class="form-control" placeholder="ejemplo@gmail.com" required />
                </div>
                <div class="form-group col-md-4">
                    <center> <label for="text"><b>Teléfono</b></label></center>
                    <input type="number" name="telefono" autocomplete="off" class="form-control" placeholder="1234-5678" required />
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <center> <label for="text"><b>Dirección</b></label></center>
                    <input type="text" autocomplete="off" name="direccion" class="form-control" id="inputAddress" placeholder="Dirección" required />
                </div>
                <div class="form-group col-md-4">
                    <center> <label for="text"><b>User</b></label></center>
                    <input type="text" autocomplete="off" name="user" class="form-control" id="inputAddress" placeholder="Usuario" required />
                </div>

                <div class="form-group col-md-4">
                    <center> <label for="text"><b>Pass</b></label></center>
                    <input type="text" autocomplete="off" name="pass" class="form-control" id="inputAddress" placeholder="Password" required />
                </div>

            </div>
            <div class="form-row center">
                <div class="form-group col-md-2">
                </div>
                <div class="form-group col-md-4">
                    <center> <label for="text"><b>rol</b></label></center>
                    <select class="form-control" name="rol">
                        <option class="form-control">Seleccione:</option>
                        <?php
                        $consulta = "SELECT id_rol, rol  FROM rol";
                        /*se crea una consulta para llamar la tabla requerida */
                        $resultado = mysqli_query($conection, $consulta) or die("Algo ha ido mal en la consulta a la base de datos");
                        /*se crea una validacion entre la conexion y la consulta*/
                        while ($mostrar = mysqli_fetch_array($resultado)) {
                            echo "<option value='" . $mostrar['id_rol'] . "'>" . $mostrar['rol'] .  "</option>";
                        }

                        ?>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <center> <label for="text"><b>salario</b></label></center>
                    <input type="text" autocomplete="off" name="salario" class="form-control" id="inputAddress" placeholder="Q.00.00" required />
                </div>
            </div>
            <center>
                <input title="Enviar" class="Fields" type="submit" name="Guardar" />
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