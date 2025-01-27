<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agendar cita</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/ca9fa9751b.js" crossorigin="anonymous"></script>

</head>

<body>



  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="inicio.php">Inicio</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

    <div class="collapse navbar-collapse" id="navbarNav">


      <ul class="navbar-nav">

        <li class="nav-item active">
          <a class="nav-link" href="user_citas.php">Revisar Citas Pendientes</a>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="user_citashistorial.php">Registro de Citas</a>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="user_historial.php">Revisar historial medico </a>
        </li>

      </ul>



    </div>



  </nav>




  <div class="container-fluid row">

    <form class="col-4 p-4" action="" method="post">
      <h5 class="text-center alert alert-secondary">Agendar Cita</h5>
      <?php
      include("../../controller/citas_control.php");
      ?>

      <div class="mb-3">
        <label for="fecha" class="form-label">Fecha</label>
        <input type="date" class="form-control" id="fecha" name="fecha" required>
      </div>

      <br>
      <div class="mb-3">
        <label for="hora" class="form-label">Hora</label>
        <select name="hora" class="form-control" id="hora" required>
          <option value="09:00">09:00(Mañana)</option>
          <option value="15:00">15:00(Tarde)</option>
        </select>
      </div>

      <br>
      <div class="mb-3">
        <label for="motivo" class="form-label">Motivo:</label>
        <input type="text" class="form-control" id="motivo" name="motivo" required>
      </div>

      <br>
      <button type="submit" name="registro" value="ok">Agendar Cita</button>
    </form>
  </div>

  <?php
  include("../../controller/calendario.php")
  ?>

</body>

</html>