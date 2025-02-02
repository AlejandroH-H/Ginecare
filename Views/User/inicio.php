<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="../../assets/css/ini.css">
    <link rel="stylesheet" href="../../assets/css/decoration.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ca9fa9751b.js" crossorigin="anonymous"></script>

</head>

<body>

    <?php include("../../controller/session_l.php");?>
    <?php include("../../model/inicioConsulta.php");?>

    <nav class="navbar navbar-expand-lg navbar-dark text-light bg-dark px-2">
        <h4>Bienvenido <?php echo $usuario; ?></h4>
        <a class="linkCitasPend" href="perfil.php">Perfil</a>
        <!-- Esto es un boton de más contenido para cuando la pantalla sea más pequeña -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Lista de Botones -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav pum">

                <li class="nav-item active">
                    <a class="linkCitasPend" href="user_citas.php">Citas Pendientes</a>
                </li>

                <li class="nav-item active">
                    <a class="linkCitasPend" href="user_citashistorial.php">Registro de Citas</a>
                </li>

                <li class="nav-item active">
                    <a class="linkCitasPend" href="user_historial.php">Revisar Historial Médico </a>
                </li>


                <li class="nav-item">
                    <a class="linkEdit" href="uchat.php" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i> Doctor Chat <?php if ($conta4 > 0) {
                                                                                                                                                    echo $conta4 . ' Mensajes nuevos';
                                                                                                                                                } ?></a>
                </li>
            </ul>
        </div>
        <a class="navbar-brand linkEdit" href="../../controller/salir.php"><img src="../../assets/img/box-arrow-right.svg"></a>
    </nav>
    
    <div id="datos">

        <table class="tabla">
            <thead>
                <tr>
                    <th scope="col" class="columnas columTitulo">NOMBRES</th>
                    <th scope="col" class="columnas columTitulo">APELLIDOS</th>
                    <th scope="col" class="columnas columTitulo">DNI</th>
                    <th scope="col" class="columnas columTitulo">AGENDAR CITA</th>
                </tr>
            </thead>
            <tbody>

                <?php require("../../model/inicioTabla.php");?>

            </tbody>
        </table>
    </div>




</body>

</html>