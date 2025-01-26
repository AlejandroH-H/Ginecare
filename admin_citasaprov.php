<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Citas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/ca9fa9751b.js" crossorigin="anonymous"></script>

</head>

<body>

  <?php require("model/adminCitas/adminCitasEstado.php"); ?>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="inicio_admin.php">Regresar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="admin_citasg.php">Buscador de Citas </a>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="admin_citas.php">Revisar Citas Por Confirmar (<?php echo $conta ?>) </a>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="admin_citaspos.php">Revisar Citas Pospuestas (<?php echo $conta3 ?>) </a>
        </li>

        </li>

      </ul>
    </div>



  </nav>

  <div class="col-4 p-4" id="datos">
    <?php
    include("controller/session_a.php");
    include('controller/admin_citas_control.php');
    ?>

    <table class="table">
      <thead>
        <tr>
          <th scope="col" class="bg-info">Empleado</th>
          <th scope="col" class="bg-info">DNI</th>
          <th scope="col" class="bg-info">Motivo</th>
          <th scope="col" class="bg-info">Fecha</th>
          <th scope="col" class="bg-info">Hora</th>
          <th scope="col" class="bg-info">Estado</th>
          <th scope="col" class="bg-info">Desconfirmar o Eliminar</th>
          <th scope="col" class="bg-info">Posponer</th>
        </tr>
      </thead>
      <tbody>

        <?php require("model/adminCitas/adminCitasConsulta.php"); ?>

      </tbody>
    </table>
  </div>

</body>

</html>