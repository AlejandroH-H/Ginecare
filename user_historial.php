<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historiales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ca9fa9751b.js" crossorigin="anonymous"></script>

</head>

<body>
    <?php
    include("conexion.php");
    include("controller/user_historialcon.php");



    ?>

    <h2>Búsqueda por Fecha</h2>

    <form action="user_historial.php" method="post">
        <label for="campo"></label>
        <input type="text" name="buscar" placeholder="Año-Mes-Día">
        <input type="submit" value="Buscar">
    </form>

    <div class="col-4 p-4" id="datos">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="bg-danger .bg-gradient">NOMBRE</th>
                    <th scope="col" class="bg-danger .bg-gradient">APELLIDO</th>
                    <th scope="col" class="bg-danger .bg-gradient">DNI</th>
                    <th scope="col" class="bg-danger .bg-gradient">FECHA DEL HISTORIAL</th>
                    <th scope="col" class="bg-danger .bg-gradient">DESCRIPCION</th>
                    <th scope="col" class="bg-danger .bg-gradient"></th>
                </tr>
            </thead>
            <tbody>

                <?php


                foreach ($resultado as $datos):
                ?>
                    <tr>
                        <td class="bg-secondary .bg-gradient text-black"><?php echo $datos['nombre'] ?></td>
                        <td class="bg-secondary .bg-gradient text-black"><?php echo $datos['apellido'] ?></td>
                        <td class="bg-secondary .bg-gradient text-black"><?php echo $datos['dni'] ?></td>
                        <td class="bg-secondary .bg-gradient text-black"><?php echo $datos['fecha'] ?></td>
                        <td class="bg-secondary .bg-gradient text-black"><?php echo $datos['descripcion'] ?></td>

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