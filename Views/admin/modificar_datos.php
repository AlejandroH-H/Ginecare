<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modificar Datos</title>
  <link rel="stylesheet" href="../../assets/css/admin2.css">
  <link rel="stylesheet" href="../../assets/css/decoration.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <?php require("../../model/gh1Consulta.php"); ?>
  <?php require("../../model/adminCitas/adminCitasEstado.php"); ?>


  <nav class="navbar navbar-expand-lg navbar-dark text-light bg-dark px-2">
        <a class="linkHistorial" href="admin_page.php">Regresar</a>
        <!-- Esto es un boton de más contenido para cuando la pantalla sea más pequeña -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Lista de Botones -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav pum">

                <li class="nav-item active">
                    <a class="linkSalir" href="look.php">Buscador de Pacientes</a>
                </li>

                <li class="nav-item active">
                    <a class="linkSalir" href="Pacientes_blocked.php">Pacientes Bloqueados <?php if($ptr>0){echo "(".$ptr.")";}?> </a>
                </li>

            </ul>
        </div>
        <a class="navbar-brand linkEdit" href="../../controller/salir.php"><img src="../../assets/img/box-arrow-right.svg"></a>
    </nav>


  <form class="col-6 p-4 m-auto" method="post">
    <h5 class="text-center alert alert-secondary">Modificar Datos</h5>
    <input type="hidden" name="id" value="<?= $_GET['id'] /*esto se hace para realizar 
        la consulta de modificar en el controlador,
        porque sin el id, no se puede hacer el comando UPDATE*/ ?>">
    <?php
    include("../../controller/modificar_datos_control.php");

    if ($cita) { ?>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nombre de la Persona</label>
        <input type="text" class="form-control" name="nombre" value="<?php echo $cita['nombre'] ?>">
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Apellido de la Persona</label>
        <input type="text" class="form-control" name="apellido" value="<?php echo $cita['apellido'] ?>">
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">DNI de la Persona</label>
        <input type="text" class="form-control" name="dni" value="<?php echo $cita['dni'] ?>">
      </div>



    <?php }
    ?>

    <button type="submit" class="btn btn-primary" name="btnmodificar" value="ok">Modificar</button>
  </form>
</body>

</html>