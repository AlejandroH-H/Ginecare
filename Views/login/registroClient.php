<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/Registrostyle.css">
    <link rel="stylesheet" href="../../assets/css/HeaderStyles.css">
    <?php require "../partials/linksFooter.php"; ?>
    <title>Registro</title>
</head>

<body>
<?php require "../../Views/partials/header.php";?>
    <div class="padre">
        <div class="containerr">
            <form action="" method="post" class="formulario">
                <h2 class="titulo">Registrate</h2>
                <?php
                include("../../controller/registro.php");
                ?>
                <div class="input-field">
                    <input type="text" name="nombre" required>
                    <label for="">Nombres</label>
                </div>

                <div class="input-field">
                    <input type="text" name="apellido" required>
                    <label for="">Apellidos</label>
                </div>

                <div class="input-field">
                    <input type="text" name="usuario" required minlength="5" maxlength="20">
                    <label for="">Nombre de usuario</label>
                </div>

                <div class="input-field">
                    <input type="text" name="dni" required minlength="7" maxlength="8">
                    <label for="">DNI</label>
                </div>

                <div class="input-field">
                    <input type="text" name="password" required minlength="6" maxlength="20">
                    <label for="">Contraseña</label>
                </div>
                <input type="submit" class="botton" value="Registrar" name="registro">
                <div class="inicioDeSesion">
                    <p>Ya tiene una Cuenta. <a href="login.php">Inicia Sesión!</a></p>
                </div>
            </form>
        </div>
    </div>
    <footer>
        <?php require "../partials/footer.php"; ?>
    </footer>
</body>

</html>