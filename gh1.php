<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ca9fa9751b.js" crossorigin="anonymous"></script>

</head>

<body>
    <?php require("model/gh1Consulta.php");?>

    <?php
    include("controller/session_a.php");
    ?>

    <form class="col-6 p-4 m-auto" method="post">
        <h5 class="text-center alert alert-secondary">Generar Historial al Paciente</h5>
        <input type="hidden" name="id" value="<?= $_GET['id'] /*esto se hace para realizar 
        la consulta de modificar en el controlador,
        porque sin el id, no se puede hacer el comando UPDATE*/ ?>">
        <?php
        include("controller/ghistorial_control.php");

        if ($cita) { ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="bg-info">Empleado</th>
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
                    <textarea name="descripcion" placeholder="Escriba el historial aquí..." id="" cols="30" rows="10" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary" name="registro" value="ok">Guardar</button>
            </form>
            </td>

            </tr>

    </form>
</body>

</html>