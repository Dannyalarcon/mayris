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
?>
<!doctype html>
<html lang="en">

<head>
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

    <title>Empleados</title>
</head>

<body>
    <nav class="breadcrumbs">
        <a class="a" href="principal.php">Inicio</a>
        <span class="last-crumb">Empleados</span>
    </nav>
    <div class="title-box">

        <img class="profile-img-card" src="imagenes/logo1.png" />
        <h1>Empleados</h1>
    </div>
    <center>
        <a title="Inicio" href="principal.php"><button type="button" class="a btn btn-primary"><i class="fas fa-home"></i></button></a>
        <a title="Crear Empleado" href="create_empleado.php"><button type="button" class="a btn btn-success"><i class="fas fa-plus"></i></button></a>
     
            <a title="ver bajas" class="a" href="empleado_rechazado.php"><button type="button" class="boto btn btn-danger"><i class="fas fa-angle-double-down"></i></button></a>
     
    </center>
    <br>
    <div id="tabla" class="container">

        <table class="table  table-hover">
            <thead role="rowgroup">
                <tr role="row">
                    <th class="center">DPI</th>
                    <th class="center">Nombre</th>
                    <th class="center">Apellido</th>
                    <th class="center">Rol</th>
                    <th class="center">Teléfono</th>
                    <th class="center">Dirección</th>
                    <th class="center">Sueldo</th>
                    <th class="center">Acciones</th>
                </tr>
            </thead>
            <?php
            //se crea una variable donde se le pasa la variable de conexion y la consulta
            $sql = mysqli_query($conection, "SELECT u.id_usuario, u.dpi, u.nombre, u.apellido,u.direccion, u.correo, u.telefono, u.salario, u.user, u.estatus, r.rol 
                                                                FROM usuario u 
                                                                INNER JOIN rol r on u.rol = r.id_rol 
                                                                WHERE estatus = 1
                                                                ORDER BY u.id_usuario ASC");
            mysqli_close($conection);

            $result = mysqli_num_rows($sql);
            if ($result > 0) {
                while ($row = mysqli_fetch_array($sql)) {
            ?>

                    <tbody role="rowgroup">
                        <tr role="row">
                            <?php
                            if ($_SESSION["rol"] != "3") {
                            ?>
                                <td data-th="DPI" role="cell"><?php echo $row['dpi'] ?></td>
                                <td data-th="Nombre" role="cell" class="texto"><?php echo $row['nombre'] ?></td>
                                <td data-th="Apellido" role="cell" class="texto"><?php echo $row['apellido'] ?></td>
                                <td data-th="Rol" role="cell"><?php echo $row['rol'] ?> </td>
                                <td data-th="Teléfono" role="cell"><?php echo $row['telefono'] ?></td>
                                <td data-th="Dirección" role="cell"><?php echo $row['direccion'] ?></td>
                                <td data-th="Sueldo" role="cell">Q.<?php echo $row['salario'] ?>.00</td>
                                <td data-th="Acciones" role="cell" class="center">
                                    <a title="info" href="view_empleado.php?id=<?php echo $row["id_usuario"]; ?>">
                                        <button type="button" class="boto btn btn-success">
                                            <i class="fas fa-address-book"></i> </button>
                                    </a>
                                    <a title="Editar" href="edit_empleado.php?id=<?php echo $row["id_usuario"]; ?>">
                                        <button type="button" class="boto btn btn-warning">
                                            <i class="far fa-edit"></i>
                                        </button>
                                    </a>
                                    <a title="Dar de baja" href="delete_empleado.php?id=<?php echo $row["id_usuario"]; ?>">
                                        <button type="button" class="boto btn btn-danger">
                                            <i class="fas fa-angle-double-down"></i>
                                        </button>
                                    </a>
                                <?php
                            }

                                ?>
                                </td>
                        </tr>
                    </tbody>
            <?php
                }
            }
            ?>
        </table>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>