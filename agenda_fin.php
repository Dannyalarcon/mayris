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
    header('location: agenda.php');
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/vistas.css">
    <link rel="icon" href="imagenes/logs.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amaranth|Lobster|Philosopher&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Citas Finalizadas</title>
</head>

<body>

    <nav class="breadcrumbs">
        <!--migaja de pan muestra la vista del modulo en el que esta-->
        <a title="Inicio" class="a" href="principal.php">Inicio</a>
        <a title="Agenda" class="a" href="agenda.php">Agenda</a>
        <span title="Citas finalizadas" class="last-crumb">Citas Finalizadas</span>
    </nav>
    <div class="title-box">
        <img class="profile-img-card" src="imagenes/logo1.png" />
        <h1>Citas Finalizadas</h1>
    </div>
    <center>
        <a title="Atras" class="a" href="agenda.php"><button type="button" class="btn btn-primary"><i class="fas fa-angle-double-left"></i></button></a>
        <a title="Inicio" class="a" href="principal.php"><button type="button" class="btn btn-primary"><i class="fas fa-home"></i></button></a>
    </center>
    <br>
    <div id="tabla" class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th><b> N#</b></th>
                    <th class="center">Nombre</th>
                    <th class="center">Apellido</th>
                    <th class="center">Teléfono</th>
                    <th class="center">Descripción</th>
                    <th class="center">precio</th>
                    <th class="center">Fecha</th>
                    <th class="center">Hora</th>
                    <th class="center">Asistencia</th>
                    <th class="center">Acciones</th>
                </tr>
            </thead>
            <?php
            /*se llama la conexion para la base de datos*/
            $consulta = "SELECT * FROM agenda  WHERE estatus = 0";
            /*se crea una consulta para llamar la tabla requerida */
            $resultado = mysqli_query($conection, $consulta) or die("Algo ha ido mal en la consulta a la base de datos");
            /*se crea una validacion entre la conexion y la consulta*/
            while ($row = mysqli_fetch_array($resultado)) {
                /*mientras la variable $resultado este correcto los datos se mostraran en la variable $mostrar */
            ?>
                <tbody>
                    <tr>
                        <td data-th="id"><?php echo $row['id_agenda'] ?></td>
                        <td class="texto" data-th="Nombre"><?php echo $row['nombre'] ?></td>
                        <td class="texto" data-th="Apellido"><?php echo $row['apellido'] ?></td>
                        <td data-th="Teléfono"><a href="tel:+502<?php echo $row['telefono'] ?>"><?php echo $row['telefono'] ?></a></td>
                        <td data-th="Descripción"><?php echo $row['descripcion'] ?></td>
                        <td data-th="Precio"><?php echo $row['precio'] ?>.00</td>
                        <td data-th="Fecha"><?php echo $row['fecha'] ?></td>
                        <td data-th="Hora"><?php echo $row['hora'] ?></td>
                        <td data-th="Asistencia"><?php echo $row['asistencia'] ?></td>
                        <td data-th="Acción" class="center">
                            <!-- <a href="https://api.whatsapp.com/send?phone=+502<?php echo $row['telefono'] ?> ">
                                <button type="button" class="boto btn btn-success">
                                    <i class="fab fa-whatsapp "></i>
                                </button>
                            </a>
                            <a href="edit_agenda.php?id=<?php echo $row["id_agenda"]; ?>">                               
                             <button type="button" class="boto btn btn-warning">
                                    <i class="far fa-edit"></i>
                                </button>
                            </a> -->
                            <a title="Eliminar cita <?php echo $row["id_agenda"]; ?>" href="delete_agenda.php?id=<?php echo $row["id_agenda"]; ?>">
                                <button type="button" class="boto btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </a>

                        </td>
                    </tr>
                </tbody>
            <?php
            }
            ?>
        </table>
    </div>
    <br>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>