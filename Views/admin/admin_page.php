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
    <a class="navbar-brand" href="inicio_admin.php">Inicio</a>
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

  <div class="container-fluid row">
    <form class="col-4 p-4" method="post">
      <h5 class="text-center alert alert-secondary">Registro de Personas</h5>
      <?php
      include("../../controller/registro_user.php");
      ?>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nombre de la Persona</label>
        <input type="text" class="form-control" name="nombre">
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Apellido de la Persona</label>
        <input type="text" class="form-control" name="apellido">
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">DNI de la Persona</label>
        <input type="text" class="form-control" name="dni">
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nombre de Usuario</label>
        <input type="text" class="form-control" name="usuario" minlength="5" maxlength="20">
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Contraseña</label>
        <input type="text" class="form-control" name="password">
      </div>
      <a href='../../controller/salir.php'>Salir</a>
    </form>
    <div class="col-4 p-4 ">
      <table class="table margin-center">
        <thead>
          <tr>
            <th scope="col" class="bg-danger .bg-gradient">ID</th>
            <th scope="col" class="bg-danger .bg-gradient">NOMBRES</th>
            <th scope="col" class="bg-danger .bg-gradient">APELLIDOS</th>
            <th scope="col" class="bg-danger .bg-gradient">DNI</th>
            <th scope="col" class="bg-danger .bg-gradient">Editar Datos</th>
            <th scope="col" class="bg-danger .bg-gradient">Borrar Paciente</th>
            <th scope="col" class="bg-danger .bg-gradient">Historial Diagnostico</th>
            <th scope="col" class="bg-danger .bg-gradient">Generar Historial Diagnostico</th>
            <th scope="col" class="bg-danger .bg-gradient">Chat</th>
            <th scope="col" class="bg-danger .bg-gradient">Mensajes Nuevos</th>
            <th scope="col" class="bg-danger .bg-gradient"></th>
          </tr>
        </thead>
        <tbody>

          <?php require("../../model/adminCitas/adminPage.php"); ?>

        </tbody>
      </table>
    </div>

  </div>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdeliver.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>