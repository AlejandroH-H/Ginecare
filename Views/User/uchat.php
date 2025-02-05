<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="../../assets/css/decoration.css">
    <link rel="stylesheet" href="../../assets/css/chat.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ca9fa9751b.js" crossorigin="anonymous"></script>


    <?php
    include("../../controller/session_l.php");
    ?>


    <script>
        function enviarMensaje() {
            const mensaje = document.getElementById('mensaje').value;
            const receiver_id = 1;

            if (mensaje.length > 0) {
                fetch('../../model/uenviar_mensaje.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: `mensaje=${mensaje}&receiver_id=${receiver_id}`
                    })
                    .then(response => response.text())
                    .then(data => {
                        console.log('Mensaje enviado:', data); // Agregado para depuración
                        document.getElementById('mensajes').innerHTML += data;

                        document.getElementById('mensaje').value = '';
                    });
            }
        }

        function cargarMensajes() {
            const receiver_id = 1;

            fetch(`../../model/ucargar_mensajes.php?receiver_id=${receiver_id}`)
                .then(response => response.text()
            )
                .then(data => {
                    console.log('Mensajes cargados:', data); // Agregado para depuración
                    document.getElementById('mensajes').innerHTML = data;
                });
        }

        setInterval(cargarMensajes, 5000);
    </script>
</head>

<body onload="cargarMensajes()">

    <nav class="navbar navbar-expand-lg navbar-dark text-light bg-dark px-2 d-flex justify-content-between">
    <a class="linkCitasPend" href="inicio.php">Volver</a>

    <h3>Chat</h3>

    <a class="linkEdit" href="../login/login.php">Salir</a>
    </nav>
    
    <br>

    <div class="container">
        <h3>Escríbele a Tu Doctor!</h3>
        <div id="mensajes" class="border p-3" style="height: 300px; overflow-y: scroll;"></div>
        <div class="mt-3">
            <textarea id="mensaje" class="form-control" placeholder="Escribe tu mensaje..."></textarea>
            <button class="btn btn-primary mt-2" onclick="enviarMensaje()">Enviar</button>
        </div>
    </div>


</body>

</html>