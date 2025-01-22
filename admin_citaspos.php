<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ca9fa9751b.js" crossorigin="anonymous"></script>

</head>
<body>


<?php
        include("conexion.php");


        $stmt = $pdo->prepare("SELECT * FROM citas c WHERE c.estado = 'por confirmar' ");
        $stmt->execute();
        $conta = $stmt->rowCount();

        $stmt = $pdo->prepare("SELECT * FROM citas c WHERE c.estado = 'confirmada'");
        $stmt->execute();
        $conta2 = $stmt->rowCount();

        $stmt = $pdo->prepare("SELECT * FROM citas c WHERE c.estado = 'pospuesta'");
        $stmt->execute();
        $conta3 = $stmt->rowCount();
        ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="inicio_admin.php">Regresar</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" 
aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

<div class="collapse navbar-collapse" id="navbarNav" >
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="admin_citasg.php">Buscador de Citas  </a>
    </li>

    <li class="nav-item active">
      <a class="nav-link" href="admin_citas.php">Revisar Citas Por Confirmar (<?php echo $conta ?>) </a>
    </li>

    <li class="nav-item active">
      <a class="nav-link" href="admin_citasaprov.php">Revisar Citas Confirmadas (<?php echo $conta2 ?>) </a>
    </li>

    </li>

  </ul>
</div>



</nav> 

<div class="col-4 p-4" id="datos" >
<?php
include("controller/session_a.php");
include('controller/admin_citas_control.php');
?>

        <table class="table">
            <thead>
                <tr>
                <th scope="col" class="bg-info">Empleado</th>
                <th scope="col" class="bg-info">DNI</th>
                <th scope="col" class="bg-info">Motivo</th>
                <th scope="col" class="bg-info">Fecha</th>
                <th scope="col" class="bg-info">Hora</th>
                <th scope="col" class="bg-info">Estado</th>
                <th scope="col" class="bg-info">Confirmar o Eliminar</th>
                <th scope="col" class="bg-info">Posponer</th>
                </tr>
            </thead>
            <tbody>

            <?php 
                
                include("conexion.php");
                 $stmt = $pdo->prepare("SELECT c.id, e.nombre, e.apellido, e.dni, DATE(c.fecha) as fecha, TIME(c.fecha) as hora, c.motivo, c.estado 
                 FROM citas c  JOIN empleados e  on (c.empleado_id=e.id) WHERE c.estado = 'pospuesta'");
                $stmt->execute();
                $citas = $stmt->fetchAll();

                foreach($citas as $cita):
                    ?>
                    <tr>
                        <td><?php echo $cita['nombre'] ?> - <?php echo $cita['apellido'] ?></td>
                        <td><?php echo $cita['dni'] ?></td>
                        <td><?php echo $cita['motivo'] ?></td>
                        <td><?php echo $cita['fecha'] ?></td>
                        <td><?php echo $cita['hora'] ?></td>
                        <td><?php echo $cita['estado'] ?></td>
                        <td>
                            <form action="" method="post" style="display:inline;">
                            
                            
                            <input type="hidden" name="id" value="<?= $cita['id'] ?>">
                            <input type="hidden" name="fecha" value="<?= $cita['fecha'] ?>">
                            <input type="hidden" name="hora" value="<?= $cita['hora'] ?>">
                            <select name="estado">
                                <option value="confirmada">Confirmar</option>
                                <option value="eliminada">Eliminar</option>
                            </select>
                            <button type="submit" class="btn btn-primary" name="registro" value="ok">Actualizar</button>
                            </form>
                        </td>
                        
                        <td><a href="admin_citas1.php?id=<?= $cita['id'] //mandamos el id ?>" class="btn btn-small btn-secondary"> <i class="fa-regular fa-clipboard"></i></a> 
                        </td>
                    </tr>
                    <?php
                endforeach;
                
                
                
                /*$consulta = "SELECT * FROM empleados WHERE id!=1";
                $resultado = mysqli_query($conn, $consulta);*/
                
                    
                
                ?>
            
    
            </tbody>
        </table>
    </div>
    
</body>
</html>