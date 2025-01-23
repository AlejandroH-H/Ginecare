<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Ingreso</title>
</head>
<body>
    <div class="container">
        <form action="" method="post" class="formulario">
            <h2 class="titulo">REGISTRO</h2>
            <?php
            include("controller/registro.php");
            ?>
            <div class="padre">
                <div class="nombre">
                    <label for="">Nombres</label>
                    <input type="text" name="nombre">
                </div>

                <div class="apellido">
                    <label for="">Apellidos</label>
                    <input type="text" name="apellido">
                </div>

                <div class="username">
                    <label for="">Nombre de Usuario</label>
                    <input type="text" name="usuario">
                </div>

                <div class="dni"  >
                    <label for="">DNI</label>
                    <input type="text" name="dni" required minlength="7"  maxlength="8">
                </div>

                <div class="password"  >
                    <label for="">Contraseña</label>
                    <input type="text" name="password" required minlength="6"  maxlength="20">
                </div>

                <div class="cuenta">
                    <input type="submit" class="botton" value="Registrar" name="registro">
                    <a href="login.php">Ya tiene una cuenta?</a>
                </div>
            </div>
        </form> 
    </div>
</body>
</html>