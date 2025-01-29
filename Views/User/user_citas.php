<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas</title>
    <link rel="stylesheet" href="../../assets/css/decoration.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ca9fa9751b.js" crossorigin="anonymous"></script>

</head>

<body>
    <?php require("../../model/userCitasConsulta.php");?>

    <?php require_once("../partials/headPages.php"); ?>

    <div id="datos">

        <table class="tabla">
            <thead>
                <tr>
                    <th scope="col" class="columnas columTitulo">NOMBRE</th>
                    <th scope="col" class="columnas columTitulo">APELLIDO</th>
                    <th scope="col" class="columnas columTitulo">DNI</th>
                    <th scope="col" class="columnas columTitulo">FECHA</th>
                    <th scope="col" class="columnas columTitulo">HORA</th>
                    <th scope="col" class="columnas columTitulo">MOTIVO</th>
                    <th scope="col" class="columnas columTitulo">ESTADO</th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($resultado as $datos):
                ?>
                    <tr>
                        <td class="columnas"><?php echo $datos['nombre'] ?></td>
                        <td class="columnas"><?php echo $datos['apellido'] ?></td>
                        <td class="columnas"><?php echo $datos['dni'] ?></td>
                        <td class="columnas"><?php echo $datos['fecha'] ?></td>
                        <td class="columnas"><?php echo $datos['hora'] ?></td>
                        <td class="columnas"><?php echo $datos['motivo'] ?></td>
                        <td class="columnas"><?php echo $datos['estado'] ?></td>

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