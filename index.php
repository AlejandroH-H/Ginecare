<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link rel="shortcut icon" href="assets/img/logo.jpg" type="image/x-icon">
  <link rel="stylesheet" href="assets/css/FooterStyles.css">
  <link rel="stylesheet" href="assets/css/IndexStyle.css">
  <link rel="stylesheet" href="assets/css/HeaderStyles.css">
  <title>Ginecore</title>
</head>
<body>
<?php require "Views/partials/indexHeader.php";?>
<main class="centro">
  <div class="info info--informacion ">
  <h1>bienvenido!</h1>
  </div>

  <div class="info info--equipo">
  <h1>quienes somos?</h1>
  <p>
    Ginecore es una pagina que permite a los pacientes registrados asignar citas con un doctor, visualizar su historial de citas
    y comunicarse con el doctor atravez de un chat en tiempo real.
  </p>
  </div>
  
  <div class="info info--RegistroLogin">

    <div class="botonlink">
      <h1>Registro</h1>
      <p>si necesitas agendar citas con nosotros registrese aqui </p>
    <a class="botone" href="Views/login/registroClient.php">Registrate</a>
    </div>

    <div class="botonlink">
        <h1>inicio de sesion</h1>
        <p>si ya tienes cuenta? inicie sesion aqui!</p>
    <a class="botone" href="Views/login/login.php">inicia sesion</a>
    </div>

  </div>

</main>
<?php require("./Views/partials/footerindex.php");?>
</body>
</html>