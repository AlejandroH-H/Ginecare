<?php
include("../conexion.php");



$buscar = trim($_POST['buscar']) ;
$buscar1 = trim($_POST['buscar1']) ;
$buscar2 = trim($_POST['buscar2']) ;
$buscar3 = trim($_POST['buscar3']) ;
$buscar4 = trim($_POST['buscar4']) ;

// esta otra forma funciona tambien
//$buscar = isset($_POST['buscar']) ? $conn->real_escape_string($_POST['buscar']) : null;


$stmt = $pdo->prepare("SELECT c.id, e.nombre, e.apellido, e.dni, DATE(c.fecha) as fecha, TIME(c.fecha) as hora, c.motivo, c.estado 
FROM citas c JOIN empleados e ON (c.empleado_id=e.id) WHERE (e.nombre LIKE :buscar AND e.apellido LIKE :buscar1) 
AND (e.dni LIKE :buscar2 AND c.fecha LIKE :buscar3) AND c.estado LIKE :buscar4");
   


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
                <th scope="col" class="bg-danger .bg-gradient">Acciones</th>
                <th scope="col" class="bg-danger .bg-gradient">Posponer</th>
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
                        <td><?php echo $buscar2 ?></td>
                        <td>
                            <form action="" method="post" style="display:inline;">
                            
                            
                            <input type="hidden" name="id" value="<?= $cita['id'] ?>">
                            <input type="hidden" name="fecha" value="<?= $cita['fecha'] ?>">
                            <input type="hidden" name="hora" value="<?= $cita['hora'] ?>">
                            <?php
                            if($cita['estado']=='confirmada'){?>
                            <select name="estado">
                                <option value="por confirmar">Desconfirmar</option>
                                <option value="eliminada">Eliminar</option>
                            </select>

                            <?php }  elseif ($cita['estado']=='por confirmar'){?>
                                <select name="estado">
                                <option value="confirmada">Confirmar</option>
                                <option value="eliminada">Eliminar</option>
                            </select>

                            <?php } else{ ?>
                                <select name="estado">
                                <option value="confirmada">Confirmar</option>
                                <option value="eliminada">Eliminar</option>
                            </select>

                            <?php } ?> 
                             
                            
                            <button type="submit" class="btn btn-primary" name="registro" value="ok">Actualizar</button>
                            </form>
                        </td>
                        
                        <td><a href="admin_citas1.php?id=<?= $cita['id'] //mandamos el id ?>" class="btn btn-small btn-secondary"> <i class="fa-regular fa-clipboard"></i></a> 
                        </td>
                    </tr>

<?php }
endforeach?>
</tbody>
        </table>
    </div>