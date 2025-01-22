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

<?php
        include("controller/session_l.php");
        
        ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="inicio.php">Regresar</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" 
aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

<div class="collapse navbar-collapse" id="navbarNav" >
  <ul class="navbar-nav">
    

    <li class="nav-item active">
      <a class="nav-link" href="user_citashistorial0.php">Citas No Realizadas  </a>
    </li>

    <li class="nav-item active">
      <a class="nav-link" href="user_conlook.php">Buscar cita  </a>
    </li>

</div>



</nav>


    <div class="container">
        <h1>Citas Realizadas</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Paciente</th>
                    <th>DNI</th>
                    <th>Doctor</th>
                    <th>Fecha</th>
                    <th>Motivo</th>
                    <th>Estado</th>
                    <th>Realizada</th>
                </tr>
            </thead>

            <tbody>
                <?php
                include('conexion.php');

                $stmt = $pdo->prepare('SELECT e.nombre as paciente, e.apellido, e.dni, a.nombre as doctor, h.fecha,
                 h.motivo, h.estado, h.realizada FROM historial_citas h JOIN empleados e ON (h.empleado_id=e.id)
                JOIN admin a ON (h.admin_id=a.id) WHERE e.dni = :dni AND h.realizada = 1');
                $stmt->bindParam('dni', $dni);
                 $stmt->execute();
                 

                $citas = $stmt->fetchAll();
                foreach($citas as $cita){
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($cita['paciente']) .  htmlspecialchars($cita['apellido']) . "</td>";

                    echo "<td>" . htmlspecialchars($cita['dni']) . "</td>";

                    echo "<td>" . htmlspecialchars($cita['doctor']) . "</td>";

                    echo "<td>" . htmlspecialchars($cita['fecha']) . "</td>";

                    echo "<td>" . htmlspecialchars($cita['motivo']) . "</td>";

                    echo "<td>" . htmlspecialchars($cita['estado']) . "</td>";

                    echo "<td>" . ($cita['realizada'] ? 'Sí' : 'No') . "</td>";

                    echo "</tr>";
                }
                
                ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>