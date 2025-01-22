<?php
include("../conexion.php");



$buscar = trim($_POST['buscar']) ;
$buscar1 = trim($_POST['buscar1']) ;
$buscar2 = trim($_POST['buscar2']) ;
$buscar3 = trim($_POST['buscar3']) ;
$buscar4 = trim($_POST['buscar4']) ;

// esta otra forma funciona tambien
//$buscar = isset($_POST['buscar']) ? $conn->real_escape_string($_POST['buscar']) : null;


$stmt = $pdo->prepare("SELECT h.id, e.nombre, e.apellido, e.dni, DATE(h.fecha) as fecha, TIME(h.fecha) as hora, h.motivo, h.estado, h.observacion 
FROM historial_citas h JOIN empleados e ON (h.empleado_id=e.id) WHERE (e.nombre LIKE :buscar AND e.apellido LIKE :buscar1) 
AND (e.dni LIKE :buscar2 AND h.fecha LIKE :buscar3) AND h.estado LIKE :buscar4");
   


$buscar_param= '%' . $buscar . '%';
$buscar_param1= '%' . $buscar1 . '%';
$buscar_param2= '%' . $buscar2 . '%';
$buscar_param3= '%' . $buscar3 . '%';
$buscar_param4= '%' . $buscar4 . '%';

$stmt->bindParam(':buscar', $buscar_param, PDO::PARAM_STR);
$stmt->bindParam(':buscar1', $buscar_param1, PDO::PARAM_STR);
$stmt->bindParam(':buscar2', $buscar_param2, PDO::PARAM_STR);
$stmt->bindParam(':buscar3', $buscar_param3, PDO::PARAM_STR);
$stmt->bindParam(':buscar4', $buscar_param4, PDO::PARAM_STR);


$stmt->execute();

$citas = $stmt->fetchAll();

$num = count($citas);


?>

<h5 class="card-tittle">Resultados encontrados: <?php if($buscar=="" AND $buscar1=="" AND $buscar2=="" AND $buscar3=="" AND $buscar4==""){echo 0;}else{echo $num;}?> </h5>
<script src="https://kit.fontawesome.com/ca9fa9751b.js" crossorigin="anonymous"></script>
<div class="col-4 p-4 ">
        <table class="table margin-center">
            <thead> 
                <tr>
                <th scope="col" class="bg-danger .bg-gradient">Empleado</th>
                <th scope="col" class="bg-danger .bg-gradient">DNI</th>
                <th scope="col" class="bg-danger .bg-gradient">Motivo</th>
                <th scope="col" class="bg-danger .bg-gradient">Fecha</th>
                <th scope="col" class="bg-danger .bg-gradient">Hora</th>
                <th scope="col" class="bg-danger .bg-gradient">Estado</th>
                </tr>
            </thead>
            <tbody>
<?php foreach ($citas as $cita):
    if($buscar!="" OR $buscar1!="" OR $buscar2!="" OR $buscar3!="" OR $buscar4!=""){ ?>
<tr>
                        <td><?php echo $cita['nombre'] ?> - <?php echo $cita['apellido'] ?></td>
                        <td><?php echo $cita['dni'] ?></td>
                        <td><?php echo $cita['motivo'] ?></td>
                        <td><?php echo $cita['fecha'] ?></td>
                        <td><?php echo $cita['hora'] ?></td>
                        <td><?php echo $cita['estado'] ?></td>
                        <td><?php echo $cita['observacion'] ?></td>

                    </tr>

<?php }
endforeach?>
</tbody>
        </table>
    </div>