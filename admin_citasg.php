<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test 2.0</title>

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
include("conexion.php");
include("controller/session_a.php");

include('controller/admin_citas_control.php');
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="admin_page.php">Volver a la página principal</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" 
aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>


</div>



</nav>

<div class="container mt-5">

    <div class="col-10">

    <div class="mb-3" >
        <label for="form-label">
        <h5 class="text-center alert alert-secondary">Datos de la cita a buscar</h5></label>
        <br> <br>
        
        <label for="form-label">
        <p class="text-center alert alert-secondary">Nombre del Paciente</p></label>
        <input  onkeyup="buscar_ahora($('#buscar').val(), $('#buscar1').val(), $('#buscar2').val(), $('#buscar3').val(), $('#buscar4').val());"   type="text" class="form-control bg-secondary .bg-gradient text-white" id="buscar" name="buscar">
       

        <label for="form-label">
        <p class="text-center alert alert-secondary">Apellido</p></label>
        <input  onkeyup="buscar_ahora($('#buscar').val(), $('#buscar1').val(), $('#buscar2').val(), $('#buscar3').val(), $('#buscar4').val() );"   type="text" class="form-control bg-secondary .bg-gradient text-white" id="buscar1" name="buscar1">
        
        <label for="form-label">
        <p class="text-center alert alert-secondary">DNI</p></label>
        <input  onkeyup="buscar_ahora($('#buscar').val(), $('#buscar1').val(), $('#buscar2').val(), $('#buscar3').val(), $('#buscar4').val() );"   type="text" class="form-control bg-secondary .bg-gradient text-white" id="buscar2" name="buscar2">

        <label for="form-label">
        <p class="text-center alert alert-secondary">Fecha de la cita</p></label>
        <input  onkeyup="buscar_ahora($('#buscar').val(), $('#buscar1').val(), $('#buscar2').val(), $('#buscar3').val(), $('#buscar4').val() );"   type="text" class="form-control bg-secondary .bg-gradient text-white" id="buscar3" name="buscar3">

        <label for="form-label">
        <p class="text-center alert alert-secondary">Estado de la Cita</p></label>
        <input  onkeyup="buscar_ahora($('#buscar').val(), $('#buscar1').val(), $('#buscar2').val(), $('#buscar3').val(), $('#buscar4').val() );"   type="text" class="form-control bg-secondary .bg-gradient text-white" id="buscar4" name="buscar4">

        
    </div>
    

    <div class="card col-12 mt-5">
        <div class="card-body">
            <div id="datos_buscador" class="container pl-5 pr-5"></div>
        </div>
    </div>

    </div>


</div>

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
            url: 'controller/cl.php',
            success: function(data){
                document.getElementById("datos_buscador").innerHTML = data;
            }
        });
    }




</script>
    
</body>
</html>