<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Citas</title>
  <link rel="stylesheet" href="../../assets/css/admin.css">
  <link rel="stylesheet" href="../../assets/css/decoration.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/ca9fa9751b.js" crossorigin="anonymous"></script>

</head>

<body>

  <?php 
    require("../../model/adminCitas/adminCitasEstado.php");
  ?>

<nav class="navbar navbar-expand-lg navbar-dark text-light bg-dark px-2">
        <a class="linkHistorial" href="inicio_admin.php">Regresar</a>
        <!-- Esto es un boton de más contenido para cuando la pantalla sea más pequeña -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Lista de Botones -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav pum">


                <li class="nav-item active">
          <a class="linkSalir" href="admin_citasg.php">Buscador de Citas </a>
        </li>

        <li class="nav-item active">
          <a class="linkSalir" href="admin_citasaprov.php">Revisar Citas Confirmadas (<?php echo $conta2 ?>) </a>
        </li>

        <li class="nav-item active">
          <a class="linkSalir" href="admin_citaspos.php">Revisar Citas Pospuestas (<?php echo $conta3 ?>) </a>
        </li>



            </ul>
        </div>
        <a class="navbar-brand linkEdit" href="../../controller/salir.php"><img src="../../assets/img/box-arrow-right.svg"></a>
    </nav>

  
  <div  id="datos">
    <?php
    include("../../controller/session_a.php");
    include('../../controller/admin_citas_control.php');
    ?>

    <table class="tabla">
      <thead>
        <tr>
          <th scope="col" class="columnas columTitulo">Paciente</th>
          <th scope="col" class="columnas columTitulo">DNI</th>
          <th scope="col" class="columnas columTitulo">Motivo</th>
          <th scope="col" class="columnas columTitulo">Fecha</th>
          <th scope="col" class="columnas columTitulo">Hora</th>
          <th scope="col" class="columnas columTitulo">Estado</th>
          <th scope="col" class="columnas columTitulo">Aprobar o Eliminar</th>
          <th scope="col" class="columnas columTitulo">Posponer</th>
        </tr>
      </thead>
      <tbody>

        <?php
        include("../../model/adminCitas/adminCitasConsulta.php");
        ?>

      </tbody>
    </table>
  </div>

</body>

</html>