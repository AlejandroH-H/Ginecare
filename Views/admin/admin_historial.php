<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historiales</title>
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <link rel="stylesheet" href="../../assets/css/decoration.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ca9fa9751b.js" crossorigin="anonymous"></script>

</head>

<body>
    <?php
    include("../../conexion.php");
    include("../../controller/session_a.php");
    include("../../controller/hlook_control.php");


    ?>

<nav class="navbar navbar-expand-lg navbar-dark text-light bg-dark px-2 d-flex justify-content-between">
        <a class="linkCitasPend" href="admin_page.php">Volver</a>

        <h3>Búsqueda por Fecha</h3>

        <form action="admin_historial.php?id=<?= $id ?>" method="post">
            <label for="campo"></label>
            <input type="text" name="buscar" placeholder="Año-Mes-Día">
            <input type="submit" value="Buscar">
        </form>

        <a class="linkEdit" href="../login/login.php">Salir</a>
    </nav>

    <div id="datos">

        <table class="tabla">
            <thead>
                <tr>
                    <th scope="col" class="columnas columTitulo">NOMBRE</th>
                    <th scope="col" class="columnas columTitulo">APELLIDO</th>
                    <th scope="col" class="columnas columTitulo">DNI</th>
                    <th scope="col" class="columnas columTitulo">FECHA DEL HISTORIAL</th>
                    <th scope="col" class="columnas columTitulo">DIAGNOSTICO</th>
                    <th scope="col" class="columnas columTitulo">Editar Diagnostico</th>
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
                        <td class="columnas"><?php echo $datos['descripcion'] ?></td>
                        <td class="columnas">
                            <a href="modificar_historial.php?id=<?= $id ?>&id1=<?= $datos['id'] ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>

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