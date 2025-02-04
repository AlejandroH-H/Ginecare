<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acciones</title>
    <link rel="stylesheet" href="../../assets/css/admin4.css">
    <link rel="stylesheet" href="../../assets/css/decoration.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ca9fa9751b.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php require("../../model/modificarHistory.php"); ?>
    <?php
    include("../../controller/session_a.php");
    ?>

<nav class="navbar navbar-expand-lg navbar-dark text-light bg-dark px-2">
        <a class="linkHistorial" href="admin_historial.php?id=<?= $_GET['id']?>">Regresar</a>
        <!-- Esto es un boton de más contenido para cuando la pantalla sea más pequeña -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Lista de Botones -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav pum">

                <li class="nav-item active">
                    <a class="linkSalir" href="admin_page.php">Pagina principal</a>
                </li>

                <li class="nav-item active">
                    <a class="linkSalir" href="gh1.php?id=<?= $_GET['id']?>">Generar historial nuevo</a>
                </li>

            </ul>
        </div>
        <a class="navbar-brand linkEdit" href="../../controller/salir.php"><img src="../../assets/img/box-arrow-right.svg"></a>
    </nav>

    <form class="col-6 p-4 m-auto" method="post">
        <h5 class="text-center alert alert-secondary">Editar Historial del Paciente</h5>
        <input type="hidden" name="id" value="<?= $id1 /*esto se hace para realizar 
        la consulta de modificar en el controlador,
        porque sin el id, no se puede hacer el comando UPDATE*/ ?>">
        <?php
        include("../../controller/ghistorialu_control.php");

        if ($cita) { ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="columnasg columTitulog">Paciente</th>
                        <th scope="col" class="columnasg columTitulog">DNI</th>
                    </tr>
                </thead>
                <tbody>


                    <tr>
                        <td class="columnasg columTitulog1"><?php echo $cita['nombre'] ?> - <?php echo $cita['apellido']?></td>
                        <td class="columnasg columTitulog1"><?php echo $cita['dni'] ?></td>
                        <td>
                </tbody>
            </table>

        <?php }
        ?>
        <div class="container-fluid row">
            <form class="col-4 p-4" method="post">

                <div class="mb-3" id="text">
                    <textarea name="descripcion" placeholder="<?php echo $cita['descripcion'] ?>" id="" cols="30" rows="10" required></textarea>
                </div>

                <button type="submit" class="linkSalir" name="registro" value="ok">Guardar</button>
            </form>
            </td>

            </tr>

    </form>
</body>

</html>