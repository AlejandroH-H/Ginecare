<!DOCTYPE html>
<html lang="en">
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
include("conexion.php");
include("controller/session_a.php");

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="admin_page.php">Volver a la página principal</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" 
aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>


</div>



</nav>


<div class="container-fluid row">
    <form class="col-4 p-4" method="post">
        <h5 class="text-center alert alert-secondary">Datos del paciente a buscar</h5>
       
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nombre del paciente</label>
    <input placeholder="Nombre" onkeyup="buscar_ahora($('#buscar').val(), $('#buscar1').val(), $('#buscar2').val());"   type="text" class="form-control bg-secondary .bg-gradient text-white" id="buscar" name="buscar">

  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Apellido del paciente</label>
    <input placeholder="Apellido" onkeyup="buscar_ahora($('#buscar').val(), $('#buscar1').val(), $('#buscar2').val());"   type="text" class="form-control bg-secondary .bg-gradient text-white" id="buscar1" name="buscar1">

  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">DNI del paciente</label>
    <input placeholder="DNI" onkeyup="buscar_ahora($('#buscar').val(), $('#buscar1').val(), $('#buscar2').val());"   type="text" class="form-control bg-secondary .bg-gradient text-white" id="buscar2" name="buscar2">

  </div>

  
</form>



<div id="datos_buscador" class="col-8 p-4"></div>

    <div class="card col-12 mt-5">
        <div class="card-body">
            <div id="datos_buscador2" class="container pl-5 pr-5"></div>
        </div>
    </div>



<script type="text/javascript">

    function buscar_ahora(buscar, buscar1, buscar2){
        var parametros ={"buscar":buscar,
                        "buscar1":buscar1,
                        "buscar2":buscar2};
        $.ajax({
            data:parametros,
            type: 'POST',
            url: 'controller/control_look.php',
            success: function(data){
                document.getElementById("datos_buscador").innerHTML = data;
            }
        });
    }



</script>
    
</body>
</html>