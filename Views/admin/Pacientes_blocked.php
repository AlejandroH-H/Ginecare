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
    function desbloquear() {
      var respuesta = confirm("¿Está seguro de que desea desbloquear a éste paciente?")
      return respuesta
    }
  </script>

  <?php 
  include("../../controller/session_a.php");
  ?>

  <?php require("../../model/adminCitas/adminCitasEstado.php"); ?>


  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="admin_page.php">Regresar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="look.php">Buscador de Pacientes</a>
        </li>

      </ul>
    </div>
  </nav>

  <div class="col-4 p-4 ">
      <table class="table margin-center">
        <thead>
          <tr>
            <th scope="col" class="bg-danger .bg-gradient">ID</th>
            <th scope="col" class="bg-danger .bg-gradient">NOMBRES</th>
            <th scope="col" class="bg-danger .bg-gradient">APELLIDOS</th>
            <th scope="col" class="bg-danger .bg-gradient">DNI</th>
            <th scope="col" class="bg-danger .bg-gradient">Desbloquear al Paciente</th>
            <th scope="col" class="bg-danger .bg-gradient"></th>
          </tr>
        </thead>
        <tbody>

          <?php require("../../model/adminCitas/adminPageDesbloquear.php"); ?>

        </tbody>
      </table>
    </div>

  </div>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdeliver.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>