<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="ini.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ca9fa9751b.js" crossorigin="anonymous"></script>

</head>
<body>
<?php
include("conexion.php");
include("controller/session_l.php");

$leidoid = 1;
$rever = $sid;
$stmtl = $pdo->prepare("SELECT e.nombre, m.mensajitos, m.leido FROM messages m 
JOIN empleados e ON (m.receiver_id=e.id) WHERE (m.leido = 0 AND m.sender_id = :leidoid) AND m.receiver_id = :rever");
$stmtl->bindParam(':leidoid', $leidoid);
$stmtl->bindParam(':rever', $rever);
$stmtl->execute();
$conta4 = $stmtl->rowCount();


?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="controller/salir.php">Salir</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" 
aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

<div class="collapse navbar-collapse" id="navbarNav" >


  <ul class="navbar-nav">

  <li class="nav-item active">
      <a class="nav-link" href="user_citas.php">Revisar Citas Pendientes</a>
    </li>

    <li class="nav-item active">
      <a class="nav-link" href="user_citashistorial.php">Registro de Citas</a>
    </li>

    <li class="nav-item active">
      <a class="nav-link" href="user_historial.php">Revisar historial medico  </a>
    </li>



    <li class="nav-item">
    <a class="nav-link" href="uchat.php" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i>Doctor Chat <?php if($conta4>0){echo $conta4 . ' Mensajes nuevos';} ?></a>
    </li>
    </ul>

    

</div>



</nav>



<div class="col-4 p-4" id="datos" >

        <table class="table">
            <thead>
                <tr>
                <th scope="col" class="bg-info" >ID</th>
                <th scope="col" class="bg-info">NOMBRES</th>
                <th scope="col" class="bg-info">APELLIDOS</th>
                <th scope="col" class="bg-info">DNI</th>
                <th scope="col" class="bg-info">AGENDAR CITA</th>
                </tr>
            </thead>
            <tbody>

            <?php 
                
                if(isset($_SESSION['username'])){
                   $nombre =  $_SESSION['username'];
                   
                 $stmt = $pdo->prepare("SELECT * FROM empleados WHERE nombre = :nombre AND dni LIKE :dni");
                 $stmt->bindParam(':nombre', $nombre);
                 $stmt->bindParam(':dni', $dni);
                 $stmt->execute();
                //$stmt->execute(['nombre' => $_SESSION['username']]);
                $resultado = $stmt->fetchAll();

                foreach($resultado as $datos):
                    ?>
                    <tr>
                        
                        <td><?php echo $datos['id'] ?></td>
                        <td><?php echo $datos['nombre'] ?></td>
                        <td><?php echo $datos['apellido'] ?></td>
                        <td><?php echo $datos['dni'] ?></td>
                        
                        <td><a href="citas.php" class="btn btn-small btn-secondary"> <i class="fa-regular fa-clipboard"></i></a> 
                        </td>
                    </tr>
                    <?php
                endforeach;
                
                }
                
                /*$consulta = "SELECT * FROM empleados WHERE id!=1";
                $resultado = mysqli_query($conn, $consulta);*/
                
                    
                
                ?>
            
    
            </tbody>
        </table>
    </div>
    
    


</body>
</html>