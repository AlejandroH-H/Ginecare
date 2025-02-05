<?php
include('../../conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $userid = $_POST['userid'];
    $realizada = $_POST['realizada'];

    $stmt = $pdo->prepare('UPDATE historial_citas SET realizada = :realizada, modificada = 1 WHERE id = :id');
    $stmt->bindParam(':realizada', $realizada);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        if ($realizada == 0) {
            echo "<script type= 'text/javascript'>
                var result = confirm('¿Desea hacerle una observacion a la cita sin realizar?');
                if(result){
                    window.location.href='../admin/observacion.php?h=$id&userid=$userid';
                } else{window.location.href='../admin/m0.php';}
                </script>";

            //header("location: observacion.php?h=$id");
        } else {
            echo '<div class="alert alert-success">¡Estado de la cita actualizado!</div>';
            $stmt = $pdo->prepare('SELECT e.id FROM historial_citas h JOIN empleados e ON (h.empleado_id=e.id)
            WHERE h.id = :id');
            $stmt->bindParam(':id', $id);
            if ($stmt->execute()) {
                $userID = $stmt->fetchColumn();
                $d = date('d');
                $m = date('m');
                $y = date('Y');
                $h = date('h', strtotime('-5 hours'));
                $i = date('i');
                $fechaActual = $y . '-' . $m . '-' . $d . ' ' . $h . ':' . $i;
                $descripcion = 'Diagnostico por definir';

                $stmt = $pdo->prepare('INSERT INTO historiales (empleado_id, fecha, descripcion)
                VALUES (:empleado_id, :fecha, :descripcion)');
                $stmt->bindParam(':empleado_id', $userID);
                $stmt->bindParam(':fecha', $fechaActual);
                $stmt->bindParam(':descripcion', $descripcion);
                if ($stmt->execute()) {
                    echo "<script type= 'text/javascript'>
                var result = confirm('Se ha generado un historial al paciente, puede editarlo cuando desee');
                
                </script>";
                }


                //header("location: gh1.php?id=$userID");
            } else {
                echo '<div class="alert alert-warning">¡Error al actualizar!</div>';
            }
        }
    } else {
        echo '<div class="alert alert-warning">¡Error al actualizar!</div>';
    }
}
