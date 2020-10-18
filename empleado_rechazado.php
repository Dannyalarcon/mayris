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
    <link rel="stylesheet" href="css/style_empleado.css">
    <link rel="stylesheet" href="css/general.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amaranth|Lobster|Philosopher&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="icon" href="imagenes/logs.png" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Empleados Rechazados</title>
</head>

<body>
    <nav class="breadcrumbs">
        <a href="principal.jsp">Inicio</a>
        <a href="empleado.jsp">Empleados</a>

        <span class="last-crumb">Empleados Rechazados</span>
    </nav>
    <div class="title-box">
        <img class="profile-img-card" src="imagenes/logo1.png" />
        <h1>Empleados Rechazados</h1>
    </div>
    <center>

    <a title="Atras" class="a" href="empleado.php"><button type="button" class="btn btn-primary"><i class="fas fa-angle-double-left"></i></button></a>
        <a title="Inicio" class="a" href="principal.php"><button type="button" class="btn btn-primary"><i class="fas fa-home"></i></button></a>
    </center>
    <br>
    <div id="tabla" class="container">

        <table class="table  table-hover">
            <thead role="rowgroup">
                <tr role="row">
                    <th class="center">ID</th>
                    <th class="center">DPI</th>
                    <th class="center">Nombre</th>
                    <th class="center">Apellido</th>
                    <th class="center">Rol</th>
                    <th class="center">Telefono</th>
                    <th class="center">Direccion</th>
                    <th class="center">Sueldo</th>
                    <th class="center">Acciones</th>
                </tr>
            </thead>
            <?php
            //se crea una variable donde se le pasa la variable de conexion y la consulta
            $sql = mysqli_query($conection, "SELECT u.id_usuario, u.dpi, u.nombre, u.apellido,u.direccion, u.correo, u.telefono, u.salario, u.user, u.estatus, r.rol 
                                                                FROM usuario u 
                                                                INNER JOIN rol r on u.rol = r.id_rol 
                                                                WHERE estatus = 0
                                                                ORDER BY u.id_usuario ASC");
            mysqli_close($conection);

            $result = mysqli_num_rows($sql);
            if ($result > 0) {
                while ($row = mysqli_fetch_array($sql)) {
            ?>

                    <tbody role="rowgroup">
                        <tr role="row">
                            <td data-th="id" role="cell"><?php echo $row['id_usuario'] ?></td>
                            <td data-th="dpi" role="cell"><?php echo $row['dpi'] ?></td>
                            <td data-th="nombre" role="cell" class="texto"><?php echo $row['nombre'] ?></td>
                            <td data-th="apellido" role="cell" class="texto"><?php echo $row['apellido'] ?></td>
                            <td data-th="rol" role="cell"><?php echo $row['rol'] ?> </td>
                            <td data-th="telefono" role="cell"><?php echo $row['telefono'] ?></td>

                            <td data-th="direccion" role="cell"><?php echo $row['direccion'] ?></td>
                            <td data-th="sueldo" role="cell">Q.<?php echo $row['salario'] ?>.00</td>
                            <td data-th="accion" role="cell" class="center">
                                <?php
                                if ($row["rol"] != "Administrador") {
                                ?>
                                  <a href="view_empleado.php?id=<?php echo $row["id_usuario"]; ?>">
                                        <button type="button" class="boto btn btn-success">
                                        <i class="fas fa-address-book icon"></i>                                        </button>
                                    </a>
                                    <a href="delete_positive_empleado.php?id=<?php echo $row["id_usuario"]; ?>">
                                        <button type="button" class="boto btn btn-success">
                                        <i class="fas fa-angle-double-up icon"></i>
                                        </button>
                                    </a>
                             
                                    <a href="delete_empleado_rechazado.php?id=<?php echo $row["id_usuario"]; ?>">
                                        <button type="button" class="boto btn btn-danger">
                                            <i class="far fa-trash-alt icon"></i>
                                        </button>
                                    </a> 
                            <?php
                                }
                            }
                            ?>
                            </td>
                        </tr>
                    </tbody>
                <?php
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