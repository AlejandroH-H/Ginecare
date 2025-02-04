<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acciones</title>
    <link rel="stylesheet" href="../../assets/css/decoration.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ca9fa9751b.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php 
    require("../../model/adminCitas/adminCitasID.php");
    ?>
    <?php
    include("../../controller/session_a.php");
    ?>
      <?php require("../../model/adminCitas/adminCitasEstado.php"); ?>

<nav class="navbar navbar-expand-lg navbar-dark text-light bg-dark px-2 d-flex justify-content-between pum">
    <a class="linkHistorial" href="inicio_admin.php">Regresar</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">

      <ul class="navbar-nav">

        <li class="nav-item active">
          <a class="linkCitasPend" href="admin_citas.php">Citas por Confirmar (<?php echo $conta?>)</a>
        </li>

        <li class="nav-item active">
          <a class="linkCitasPend" href="admin_citasaprov.php">Citas Confirmadas (<?php echo$conta2?>)</a>
        </li>

        <li class="nav-item active">
          <a class="linkCitasPend" href="admin_citaspos.php">Citas Pospuestas (<?php echo $conta3?>)</a>
        </li>

      </ul>

    </div>
    <a class="linkEdit" href="../login/login.php">Salir</a>
  </nav>
   

    <h5 class="text-center alert alert-secondary">Posponer Cita</h5>

<div class="megaMove">
<div class="move">

  <form class="col-4 p-4" action="" method="post">
    <?php
    include("../../controller/admin_citas_control.php");
    ?>
 <input type="hidden" name="id" value="<?= $_GET['id'] /*esto se hace para realizar la consulta de modificar en el controlador,
        porque sin el id, no se puede hacer el comando UPDATE*/ ?>">

        <?php if ($cita) { ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="columnas columTitulo">Paciente</th>
                        <th scope="col" class="columnas columTitulo">DNI</th>
                        <th scope="col" class="columnas columTitulo">Motivo</th>
                    </tr>
                </thead>
                <tbody>


                    <tr>
                        <td class="columnas "><?php echo $cita['nombre'] ?> - <?php echo $cita['apellido'] ?></td>
                        <td class="columnas"><?php echo $cita['dni'] ?></td>
                        <td class="columnas "><?php echo $cita['motivo'] ?></td>
                        <td>
                </tbody>
            </table>

        <?php }
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

    <select name="estado">
        <option value="pospuesta">Pospuesta</option>
     </select>
           
    <br>
    <button class="linkHistorial" type="submit" name="registro" value="ok">Agendar Cita</button>
  </form>
</div>
</div>



    <?php include('../../controller/calendariopost.php'); ?>
</body>

</html>