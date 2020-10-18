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
    <link rel="stylesheet" href="css/style_principal.css">
    <link rel="icon" href="imagenes/logs.png" type="image/x-icon">
    <link rel="stylesheet" href="css/general.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amaranth|Lobster|Philosopher&display=swap" rel="stylesheet">
    <title>Principal</title>
</head>

<body>
    <nav class="breadcrumbs">
        <a>Usuario:</a>
        <span class="last-crumb" style="text-transform: capitalize;"><?php echo $_SESSION['user'] ?></span>
    </nav>
    <div class="title-box">
        <img class="profile-img-card" src="imagenes/logo1.png" />
        <h1>Salon de Belleza</h1>
    </div>

    <div>
        <a title="Agenda" href="agenda.php" class="boton1">AGENDA<span class="top"></span></a>
        <a title="Clientes" href="cliente.php" class="boton1">CLIENTES<span class="top"></span></a>
    </div>
    <div>
        <a title="Empleados" href="empleado.php" class="boton2">EMPLEADOS<span class="top"></span></a>
        <a title="Inventario" href="inventario.php" class="boton2">INVENTARIO<span class="top"></span></a>
    </div>
    <div>
        <a title="Salir" href="salir.php" class="boton3" onclick="salir()">Salir<span class="top"></span></a>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>