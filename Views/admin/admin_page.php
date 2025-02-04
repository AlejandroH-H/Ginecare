<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link rel="stylesheet" href="../../assets/css/admin2.css">
  <link rel="stylesheet" href="../../assets/css/decoration.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/ca9fa9751b.js" crossorigin="anonymous"></script>
</head>

<body>

  <script>
    function eliminar() {
      var respuesta = confirm("¿Está seguro de que desea eliminar a éste paciente?")
      return respuesta
    }


    function bloquear() {
      var respuesta = confirm("¿Está seguro de que desea bloquear a éste paciente?")
      return respuesta
    }
  </script>

  <?php 
  include("../../controller/session_a.php");
  ?>

  <?php require("../../model/adminCitas/adminCitasEstado.php"); ?>

  <nav class="navbar navbar-expand-lg navbar-dark text-light bg-dark px-2">
        <a class="linkHistorial" href="inicio_admin.php">Regresar</a>
        <!-- Esto es un boton de más contenido para cuando la pantalla sea más pequeña -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Lista de Botones -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav pum">

                <li class="nav-item active">
                    <a class="linkSalir" href="look.php">Buscador de Pacientes</a>
                </li>

                <li class="nav-item active">
                    <a class="linkSalir" href="Pacientes_blocked.php">Pacientes Bloqueados <?php if($ptr>0){echo "(".$ptr.")";}?> </a>
                </li>

            </ul>
        </div>
        <a class="navbar-brand linkEdit" href="../../controller/salir.php"><img src="../../assets/img/box-arrow-right.svg"></a>
    </nav>



    </form>
    <div id="datos" style="color: black;" >
      <table class="tabla">
        <thead>
          <tr>
            <th scope="col" class="columnas columTitulo">ID</th>
            <th scope="col" class="columnas columTitulo">NOMBRES</th>
            <th scope="col" class="columnas columTitulo">APELLIDOS</th>
            <th scope="col" class="columnas columTitulo">DNI</th>
            <th scope="col" class="columnas columTitulo">Editar Datos</th>
            <th scope="col" class="columnas columTitulo">Borrar Paciente</th>
            <th scope="col" class="columnas columTitulo">Bloquear Paciente</th>
            <th scope="col" class="columnas columTitulo">Historial Diagnostico</th>
            <th scope="col" class="columnas columTitulo">Generar Historial Diagnostico</th>
            <th scope="col" class="columnas columTitulo">Chat</th>
            <th scope="col" class="columnas columTitulo">Mensajes Nuevos</th>
          </tr>
        </thead>
        <tbody>

          <?php require("../../model/adminCitas/adminPage.php"); ?>

        </tbody>
      </table>
    </div>

  </div>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdeliver.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>