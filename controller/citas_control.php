<?php
include("./conexion.php");
include("session_l.php");


if(!empty($_POST["registro"])){
    if(empty($_POST['fecha']) or empty($_POST['hora'])) {
        echo '<div class="alert alert-warning">¡Por favor, complete los campos requeridos!</div>';
} else{
    $fecha = trim($_POST['fecha']);
    $hora = trim($_POST['hora']);
    $motivo = trim($_POST['motivo']);

    $stmt = $pdo->prepare('SELECT * FROM citas c JOIN empleados e on (c.empleado_id=e.id) WHERE e.nombre = :nombre AND e.dni = :dni');
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':dni', $dni);
    $stmt->execute();
    $number = $stmt->rowCount();

    date_default_timezone_set('America/Caracas');
    
    $holiday = date('l', strtotime($fecha));

    if($number>=3){
        echo '<div class="alert alert-warning">¡Usted ya tiene 3 citas registradas!</div>';
    } else{
        $mes = date('m');
    $year = date('Y');
    $fechaActual = date('Y-m-d');

    if($fecha<=$fechaActual OR $holiday == "Sunday"){
        echo '<div class="alert alert-warning">¡Fecha inválida!</div>';
        
    } else{
        $stmt = $pdo->prepare('SELECT * FROM empleados WHERE nombre = :nombre AND dni = :dni');
    $stmt->bindParam(':nombre', $usuario);
    $stmt->bindParam(':dni', $dni);
    $stmt->execute();
    $result = $stmt->rowCount();
    if($result>0){
    $fecha_hora = $fecha . ' ' . $hora . ':00';
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM citas WHERE fecha = :fecha_hora');
    $stmt ->bindParam(':fecha_hora', $fecha_hora);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    if ($count == 0){
        $stmt = $pdo->prepare('INSERT INTO citas(empleado_id, admin_id, fecha, motivo)
        VALUES((SELECT id FROM empleados WHERE dni = :dni), 1, :fecha_hora, :motivo)');
        $stmt->bindParam(':dni', $dni);
        $stmt->bindParam(':fecha_hora', $fecha_hora);
        $stmt->bindParam(':motivo', $motivo);

        if($stmt->execute()){
            echo '<div class="alert alert-success">¡Cita agendada correctamente!</div>';
        } else{
            echo '<div class="alert alert-warning">Error al agendar la cita</div>';
        }
    } else {
        echo '<div class="alert alert-warning">¡Ese espacio está ocupado. Por favor elija otra hora!</div>';
    }
    } else{
        echo '<div class="alert alert-warning">¡Por favor, coloque sus datos correspondientes!</div>';

    }  
    }
    }

    

         

    
}





}

?>