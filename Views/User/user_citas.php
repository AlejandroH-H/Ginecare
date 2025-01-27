<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ca9fa9751b.js" crossorigin="anonymous"></script>

</head>

<body>
    <?php require("../../model/userCitasConsulta.php");?>

    <div class="col-4 p-4" id="datos">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="bg-info">NOMBRE</th>
                    <th scope="col" class="bg-info">APELLIDO</th>
                    <th scope="col" class="bg-info">DNI</th>
                    <th scope="col" class="bg-info">FECHA</th>
                    <th scope="col" class="bg-info">HORA</th>
                    <th scope="col" class="bg-info">MOTIVO</th>
                    <th scope="col" class="bg-info">ESTADO</th>
                    <th scope="col" class="bg-info"></th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($resultado as $datos):
                ?>
                    <tr>
                        <td><?php echo $datos['nombre'] ?></td>
                        <td><?php echo $datos['apellido'] ?></td>
                        <td><?php echo $datos['dni'] ?></td>
                        <td><?php echo $datos['fecha'] ?></td>
                        <td><?php echo $datos['hora'] ?></td>
                        <td><?php echo $datos['motivo'] ?></td>
                        <td><?php echo $datos['estado'] ?></td>

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