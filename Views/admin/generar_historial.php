<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar Historial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ca9fa9751b.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container col-8 p-8">
        <h1>Generar Historial</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="bg-info">Paciente</th>
                    <th scope="col" class="bg-info">DNI</th>
                    <th scope="col" class="bg-info">Generar Historial</th>
                </tr>
            </thead>
            <tbody>

                <?php require("model/historial.php"); ?>

            </tbody>
        </table>
    </div>

</body>

</html>