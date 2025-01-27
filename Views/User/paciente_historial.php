<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test 2.0</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/ca9fa9751b.js" crossorigin="anonymous"></script>



</head>

<body>

    <?php
    include("../../conexion.php");
    include("../../controller/session_a.php");

    ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="admin_page.php">Volver a la página principal</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>


        </div>



    </nav>




    <div class="container mt-5">

        <div class="col-12">

            <div class="mb-3">
                <label for="form-label">Búsqueda por fecha o Cédula del paciente</label>
                <input onkeyup="buscar_ahora($('#buscar').val());" type="text" class="form-control" id="buscar" name="buscar">

            </div>

            <div class="card col-12 mt-5">
                <div class="card-body">
                    <div id="datos_buscador" class="container pl-5 pr-5"></div>
                </div>
            </div>

        </div>


    </div>

    <script type="text/javascript">
        function buscar_ahora(buscar) {
            var parametros = {
                "buscar": buscar
            };
            $.ajax({
                data: parametros,
                type: 'POST',
                url: 'controller/paciente_historialcont.php',
                success: function(data) {
                    document.getElementById("datos_buscador").innerHTML = data;
                }
            });
        }
    </script>



</body>

</html>