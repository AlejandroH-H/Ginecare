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
    include("../../conexion.php");
    include("../../controller/user_conlookcon.php");
    ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="inicio.php">Regresar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

        <div class="collapse navbar-collapse" id="navbarNav">


            <ul class="navbar-nav">

                <li class="nav-item active">
                    <a class="nav-link" href="user_citashistorial.php">Citas Realizadas</a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="user_citashistorial0.php">Registro No Realizadas</a>
                </li>

            </ul>



        </div>



    </nav>

    <h2>Búsqueda por Fecha</h2>

    <form action="user_conlook.php" method="post">
        <label for="campo"></label>
        <input type="text" name="buscar">
        <input type="submit" value="Buscar">
    </form>

    <div class="col-4 p-4" id="datos">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="bg-danger .bg-gradient">NOMBRE</th>
                    <th scope="col" class="bg-danger .bg-gradient">APELLIDO</th>
                    <th scope="col" class="bg-danger .bg-gradient">DNI</th>
                    <th scope="col" class="bg-danger .bg-gradient">FECHA DE LA CITA</th>
                    <th scope="col" class="bg-danger .bg-gradient">MOTIVO</th>
                    <th scope="col" class="bg-danger .bg-gradient">ESTADO</th>
                    <th scope="col" class="bg-danger .bg-gradient">OBSERVACION</th>
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
                        <td class="bg-secondary .bg-gradient text-black"><?php echo $datos['motivo'] ?></td>
                        <td class="bg-secondary .bg-gradient text-black"><?php echo $datos['estado'] ?></td>
                        <td class="bg-secondary .bg-gradient text-black"><?php echo $datos['observacion'] ?></td>


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