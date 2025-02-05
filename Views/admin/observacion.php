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
    <?php require("../../model/observacionConsulta.php"); ?>
    <?php
    include("../../controller/session_a.php");
    ?>

    <nav class="navbar navbar-expand-lg navbar-dark text-light bg-dark px-2 d-flex justify-content-between">
        <a class="linkCitasPend" href="m0.php">Volver</a>

        <h3>Observaciones</h3>

        <form action="admin_historial.php?id=<?= $id ?>" method="post">
            <label for="campo"></label>
            <input type="text" name="buscar" placeholder="Año-Mes-Día">
            <input type="submit" value="Buscar">
        </form>

        <a class="linkEdit" href="../login/login.php">Salir</a>
    </nav>

    <form class="col-6 p-4 m-auto" method="post">
        <input type="hidden" name="h" value="<?= $_GET['h'] ?>">
        <?php
        include("../../controller/observacioncontrol.php");

        if ($cita) { ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="bg-info">Paciente</th>
                        <th scope="col" class="bg-info">DNI</th>
                    </tr>
                </thead>
                <tbody>


                    <tr>
                        <td><?php echo $cita['nombre'] ?> - <?php echo $cita['apellido'] ?></td>
                        <td><?php echo $cita['dni'] ?></td>
                        <td>
                </tbody>
            </table>

        <?php }
        ?>
        <div class="container-fluid row">
            <form class="col-4 p-4" method="post">

                <div class="mb-3">
                    <textarea name="descripcion" placeholder="Escriba la observacion aquí..." id="" cols="30" rows="10" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary" name="registro" value="ok">Guardar</button>
            </form>
            </td>

            </tr>

    </form>
</body>

</html>