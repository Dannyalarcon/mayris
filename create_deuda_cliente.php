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

// Obteniendo la fecha actual del sistema con PHP
$FecIni = date('Y') ."-". date('m') ."-". date('d');
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <link rel="icon" href="imagenes/logs.png" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amaranth|Lobster|Philosopher&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/form_create.css">
    <link rel="stylesheet" href="css/general.css">
    <title>Crear Deuda</title>
</head>
<body>
    <nav class="breadcrumbs">
        <a href="principal.php">Inicio</a>
        <a href="cliente.php">Cliente</a>
        <span class="last-crumb">Crear deuda</span>
    </nav>
    <div class="title-box">
        <img class="profile-img-card" src="imagenes/logo1.png" />
        <h1>Crear Deuda Cliente</h1>
    </div>
    <center>
        <a title="cliente" class="a" href="cliente.php"><button type="button" class="btn btn-primary"><i class="fas fa-angle-double-left"></i></button></a>
        <a title="Inicio" class="a" href="principal.php"><button type="button" class="btn btn-primary"><i class="fas fa-home"></i></button></a>
    </center>
    <br>
    <div id="formulario" class="container">
        <form method="post" name="registro" action="controlador_crear_deudas.php">
            <div class="form-row">
                <div class="form-group col-md-4">
                </div>
                <div class="form-group col-md-4">
                    <center><label for="text"><b>Cliente</b></label></center>
                    <input type="num" id="cl" name="cl" class="form-control" value="<?php echo $_GET['id'] ?>" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <center><label for="text"><b>Descripción</b></label></center>
                    <input type="text" autocomplete="off" name="descripcion" class="form-control" placeholder="descripcion" required/>
                </div>
                <div class="form-group col-md-4">
                    <center> <label for="text"><b>Precio</b></label></center>
                    <input type="number" autocomplete="off" name="precio" class="form-control" placeholder="precio" required/>
                </div>
                <div class="form-group col-md-4">
                    <center> <label for="text"><b>Fecha</b></label></center>
                    <input type="text" readonly value="<?php echo $FecIni?>"  autocomplete="off" name="fecha" class="form-control" placeholder="fecha" required/>
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