<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marcar Citas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ca9fa9751b.js" crossorigin="anonymous"></script>

</head>

<body>

    <?php include("controller/session_a.php"); ?>
    <?php require("model/mConsulta.php"); ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="inicio_admin.php">Regresar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="m1.php">Citas Realizadas (<?php echo $conta ?>) </a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="m0.php">Citas Que No Se Cumplieron (<?php echo $conta2 ?>) </a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="concillook.php">Buscar cita</a>
                </li>

        </div>



    </nav>

    <div class="container">
        <h1>Conciliar Citas Realizadas</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Paciente</th>
                    <th>Doctor</th>
                    <th>Fecha</th>
                    <th>Motivo</th>
                    <th>Estado</th>
                    <th>Realizada</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?php require("model/mTable.php"); ?>
            </tbody>
        </table>
    </div>

</body>

</html>