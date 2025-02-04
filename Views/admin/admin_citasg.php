<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test 2.0</title>
    <link rel="stylesheet" href="../../assets/css/decoration.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/ca9fa9751b.js" crossorigin="anonymous"></script>
    <style>
        .flex-container{
            display: flex;
            justify-content: space-between;
            gap: 10x;
        }

        .flex-item{
            flex: 1;
            margin: 5px;
        }
    </style>

</head>
<body>

<?php
include("../../conexion.php");
include("../../controller/session_a.php");

include('../../controller/admin_citas_control.php');
?>

<nav class="navbar navbar-expand-lg navbar-dark text-light bg-dark px-2 d-flex justify-content-between">
    <a class="linkCitasPend" href="admin_citas.php">Volver</a>
    <h3>Busqueda de citas</h3>

    <a class="linkEdit" href="../login/login.php">Salir</a>
    </nav>

    <div class="container-fluid row">
        <form class="col-4 p-4" method="post">
            <h5 class="text-center alert alert-secondary">Datos de la cita a buscar</h5>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre del paciente</label>
                <input onkeyup="buscar_ahora($('#buscar').val(), $('#buscar1').val(), $('#buscar2').val(), $('#buscar3').val(), $('#buscar4').val());" type="text" class="form-control bg-secondary .bg-gradient text-white" id="buscar" name="buscar">

            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Apellido del paciente</label>
                <input onkeyup="buscar_ahora($('#buscar').val(), $('#buscar1').val(), $('#buscar2').val(), $('#buscar3').val(), $('#buscar4').val() );" type="text" class="form-control bg-secondary .bg-gradient text-white" id="buscar1" name="buscar1">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">DNI del paciente</label>
                <input onkeyup="buscar_ahora($('#buscar').val(), $('#buscar1').val(), $('#buscar2').val(), $('#buscar3').val(), $('#buscar4').val() );" type="text" class="form-control bg-secondary .bg-gradient text-white" id="buscar2" name="buscar2">

            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fecha de la Cita</label>
                <input onkeyup="buscar_ahora($('#buscar').val(), $('#buscar1').val(), $('#buscar2').val(), $('#buscar3').val(), $('#buscar4').val() );" type="text" class="form-control bg-secondary .bg-gradient text-white" id="buscar3" name="buscar3">

            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Estado de la Cita</label>
                <input onkeyup="buscar_ahora($('#buscar').val(), $('#buscar1').val(), $('#buscar2').val(), $('#buscar3').val(), $('#buscar4').val() );" type="text" class="form-control bg-secondary .bg-gradient text-white" id="buscar4" name="buscar4">

            </div>


        </form>

        <div id="datos_buscador" class="col-8 p-4"></div>



<script type="text/javascript">

    function buscar_ahora(buscar, buscar1, buscar2, buscar3, buscar4){
        var parametros ={"buscar":buscar,
                        "buscar1":buscar1,
                        "buscar2":buscar2,
                        "buscar3":buscar3,
                        "buscar4":buscar4
                    };
        $.ajax({
            data:parametros,
            type: 'POST',
            url: '../../controller/cl.php',
            success: function(data){
                document.getElementById("datos_buscador").innerHTML = data;
            }
        });
    }




</script>
    
</body>
</html>