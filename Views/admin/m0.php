<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conciliar Citas</title>
    <link rel="stylesheet" href="../../assets/css/admin.css">
  <link rel="stylesheet" href="../../assets/css/decoration.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ca9fa9751b.js" crossorigin="anonymous"></script>

</head>

<body>
    <?php include("../../controller/session_a.php"); ?>
    <?php require("../../model/m1Consulta.php"); ?>

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
                    <a class="linkCitasPend" href="m.php">Conciliar Citas</a>
                </li>

                <li class="nav-item active">
                    <a class="linkCitasPend" href="m1.php">Citas Realizadas (<?php echo $conta1 ?>)</a>
                </li>

                <li class="nav-item active">
                    <a class="linkSalir" href="concillook.php">Buscar cita conciliada</a>
                </li>


            </ul>
        </div>
        <a class="navbar-brand linkEdit" href="../../controller/salir.php"><img src="../../assets/img/box-arrow-right.svg"></a>
    </nav>

    <div id="datos">
        <h1>Citas No Realizadas</h1>
        <table class="tabla">
            <thead>
                <tr>
                    <th class="columnas columTitulo">Paciente</th>
                    <th class="columnas columTitulo">DNI</th>
                    <th class="columnas columTitulo">Doctor</th>
                    <th class="columnas columTitulo">Fecha</th>
                    <th class="columnas columTitulo">Motivo</th>
                    <th class="columnas columTitulo">Estado</th>
                    <th class="columnas columTitulo">Realizada</th>
                    <th class="columnas columTitulo">Observación</th>
                </tr>
            </thead>

            <tbody>
                <?php require("../../model/m0Tabla.php"); ?>
            </tbody>
        </table>
    </div>

</body>

</html>