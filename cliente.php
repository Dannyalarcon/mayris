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
//if($_SESSION['rol'] != 1){
//header('location: principal.php');
//}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/general.css">
  <link rel="stylesheet" href="css/vistas.css">
  <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Amaranth|Lobster|Philosopher&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="icon" href="imagenes/logs.png" type="image/x-icon">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <title>Clientes</title>
</head>

<body>
  <nav class="breadcrumbs">
    <a class="a" href="principal.php">Inicio</a>
    <span class="last-crumb">Clientes</span>
  </nav>
  <div class="title-box">
    <img class="profile-img-card" src="imagenes/logo1.png" />
    <h1>Clientes</h1>
  </div>
  <center>
    <a title="Inicio" href="principal.php"><button type="button" class="btn btn-primary"><i class="fas fa-home"></i></button></a>
    <a title="Crea nuevo cliente" href="create_cliente.php"><button type="button" class="btn btn-success"><i class="fas fa-plus"></i></button></a>
    <?php
        if ($_SESSION["rol"] != "3") {
        ?>
    <a title="Ver clientes de baja" href="cliente_rechazado.php"><button type="button" class="boto btn btn-danger"><i class="fas fa-angle-double-down"></i></button></a>
    <?php
        }

        ?>
  </center>
  <br>
  <div id="tabla" class="container">
    <table class="table  table-hover">
      <thead>
        <tr>
          <th class="center">DPI</th>
          <th class="center">Nombre</th>
          <th class="center">Apellido</th>
          <th class="center">Teléfono</th>
          <th class="center">Dirección</th>
          <th class="center">Acciones</th>
        </tr>
      </thead>
      <?php
      /*se llama la conexion para la base de datos*/
      $consulta = "SELECT * FROM cliente WHERE estatus = 1";
      /*se crea una consulta para llamar la tabla requerida */
      $resultado = mysqli_query($conection, $consulta) or die("Algo ha ido mal en la consulta a la base de datos");
      /*se crea una validacion entre la conexion y la consulta*/
      while ($mostrar = mysqli_fetch_array($resultado)) {
        /*mientras la variable $resultado este correcto los datos se mostraran en la variable $mostrar */
      ?>
        <tbody>
          <tr>
         

            <td data-th="DPI" role="cell"><?php echo $mostrar['dpi'] ?></td>
            <td class="texto" data-th="Nombre" role="cell"><?php echo $mostrar['nombre'] ?></td>
            <td class="texto" data-th="Apellido" role="cell"><?php echo $mostrar['apellido'] ?></td>
            <td title="Llamar" data-th="Teléfono" role="cell"><a href="tel:<?php echo $mostrar['telefono'] ?>"><?php echo $mostrar['telefono'] ?></a> </td>
            <td class="texto" data-th="Dirección" role="cell"><?php echo $mostrar['direccion'] ?></td>
            <td data-th="Acciones" role="cell" class="center">
              <a title="Ver Deudas" href="deuda.php?id=<?php echo $mostrar["id_cliente"]; ?>">
                <button type="button" class="boto btn btn-info">
                  <i class="icon fas fa-align-justify"></i>
                </button>
              </a>
              <a title="Crear Deuda" href="create_deuda_cliente.php?id=<?php echo $mostrar["id_cliente"]; ?>">
                <button type="button" class="boto btn btn-success">
                  <i class="icon fas fa-plus"></i>
                </button>
              </a>
              <?php
                                if ($_SESSION["rol"] != "3") {
                                ?>
                <a title="Editar Cliente" href="edit_cliente.php?id=<?php echo $mostrar["id_cliente"]; ?>">
                  <button type="button" class="boto btn btn-warning">
                    <i class="icon far fa-edit"></i>
                  </button>
                </a>
                <a title="Dar de baja" href="delete_cliente_rechazado.php?id=<?php echo $mostrar["id_cliente"]; ?>">
                  <button type="button" class="boto btn btn-danger">
                    <i class="icon fas fa-angle-double-down"></i>
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