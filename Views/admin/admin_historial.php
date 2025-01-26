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
    include("../../controller/session_a.php");
    include("../../controller/hlook_control.php");


    ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="admin_page.php">Volver a la página principal</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
        </button>
    </nav>

    <h2>Búsqueda por Fecha</h2>

    <form action="admin_historial.php?id=<?= $id ?>" method="post">
        <label for="campo"></label>
        <input type="text" name="buscar">
        <input type="submit" value="Buscar">
    </form>

    <br>

    <div class="col-4 p-4" id="datos">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="bg-danger .bg-gradient">NOMBRE</th>
                    <th scope="col" class="bg-danger .bg-gradient">APELLIDO</th>
                    <th scope="col" class="bg-danger .bg-gradient">DNI</th>
                    <th scope="col" class="bg-danger .bg-gradient">FECHA DEL HISTORIAL</th>
                    <th scope="col" class="bg-danger .bg-gradient">DIAGNOSTICO</th>
                    <th scope="col" class="bg-danger .bg-gradient">Editar Diagnostico</th>
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
                        <td class="bg-secondary .bg-gradient text-black">
                            <a href="modificar_historial.php?id=<?= $id //mandamos el id 
                                                                ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>

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