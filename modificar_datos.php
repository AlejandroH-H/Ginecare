<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modificar Datos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <?php require("model/gh1Consulta.php"); ?>
  <form class="col-6 p-4 m-auto" method="post">
    <h5 class="text-center alert alert-secondary">Modificar Datos</h5>
    <input type="hidden" name="id" value="<?= $_GET['id'] /*esto se hace para realizar 
        la consulta de modificar en el controlador,
        porque sin el id, no se puede hacer el comando UPDATE*/ ?>">
    <?php
    include("controller/modificar_datos_control.php");

    if ($resultado) { ?>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nombre de la Persona</label>
        <input type="text" class="form-control" name="nombre" value="<?php echo $resultado['nombre'] ?>">
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Apellido de la Persona</label>
        <input type="text" class="form-control" name="apellido" value="<?php echo $resultado['apellido'] ?>">
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">DNI de la Persona</label>
        <input type="text" class="form-control" name="dni" value="<?php echo $resultado['dni'] ?>">
      </div>



    <?php }
    ?>

    <button type="submit" class="btn btn-primary" name="btnmodificar" value="ok">Modificar</button>
  </form>
</body>

</html>