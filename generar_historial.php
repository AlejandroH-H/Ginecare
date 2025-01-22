<!DOCTYPE html>
<html lang="en">
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
                    <th scope="col" class="bg-info">Empleado</th>
                    <th scope="col" class="bg-info">DNI</th>
                    <th scope="col" class="bg-info" >Generar Historial</th>
                </tr>
            </thead>
            <tbody>
            <?php
            include("conexion.php");

            $stmt = $pdo->prepare('SELECT e.id, e.nombre, e.apellido, e.dni FROM empleados e WHERE e.id!=1 ');
            $stmt->execute();
            $citas = $stmt->fetchAll();
            foreach($citas as $cita):
                ?>
                <tr>
                    <td><?php echo $cita['nombre'] ?> - <?php echo $cita['apellido'] ?></td>
                    <td><?php echo $cita['dni'] ?></td>
                    <td><a href="gh1.php?id=<?= $cita['id'] //mandamos el id ?>" class="btn btn-small btn-secondary"> <i class="fa-regular fa-clipboard"></i></a> 
                    </td>
                    
                        <form action="" method="post" style="display:inline;">
                        
                        
                        <input type="hidden" name="cita_id" value="<?= $cita['id'] ?>">
                        
                        </form>
                    
                    
                    
                </tr>
                <?php
            endforeach;
            ?>

            </tbody>
        </table>
    </div>
    
</body>
</html>