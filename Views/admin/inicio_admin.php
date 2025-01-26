<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Salario</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/ca9fa9751b.js" crossorigin="anonymous"></script>
</head>

<body>

  <script>
    function eliminar() {
      var respuesta = confirm("Estas seguro de que deseas eliminar?")
      return respuesta
    }
  </script>
  <?php 
  include("../../controller/session_a.php");
  include("../../controller/eliminar_user.php");
  ?>

  <?php require("../../model/adminCitas/adminCitasEstado.php"); ?>


  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="admin_page.php">Pacientes (<?php echo $pt ?>)</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="admin_citas.php">Revisar Citas Por Confirmar (<?php echo $conta ?>) </a>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="admin_citasaprov.php">Revisar Citas Confirmadas (<?php echo $conta2 ?>) </a>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="admin_citaspos.php">Revisar Citas Pospuestas (<?php echo $conta3 ?>) </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="m.php">Conciliar Citas</a>
        </li>


        <li class="nav-item">
          <a class="nav-link" href="../../controller/salir.php">Salir</a>
        </li>

      </ul>
    </div>



  </nav>

  <h1 class="text-center">Bienvenido Administrador</h1>



  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdeliver.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>