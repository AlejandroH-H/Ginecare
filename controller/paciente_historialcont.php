<?php
include("../conexion.php");

$buscar = $_POST['buscar'];

if(empty($_POST['buscar'])){
    
    $stmt = $pdo->prepare("SELECT e.nombre, e.apellido, e.dni, h.fecha, h.descripcion
FROM historiales h JOIN empleados e on (h.empleado_id=e.id)");

$stmt->bindParam(':id', $id);
$stmt->execute();

$resultado = $stmt->fetchAll();

$num = count($resultado);
} else{
    $stmt = $pdo->prepare("SELECT e.nombre, e.apellido, e.dni, h.fecha, h.descripcion
    FROM historiales h JOIN empleados e on (h.empleado_id=e.id) WHERE e.dni LIKE :buscar OR h.fecha LIKE :buscar");


$buscar_param= '%' . $buscar . '%';
$stmt->bindParam(':buscar', $buscar_param, PDO::PARAM_STR);
$stmt->execute();

$resultado = $stmt->fetchAll();

$num = count($resultado);
}



?>

<h5 class="card-tittle">Resultados encontrados: <?php echo $num;?> </h5>
<script src="https://kit.fontawesome.com/ca9fa9751b.js" crossorigin="anonymous"></script>
<?php foreach ($resultado as $result):
     ?>

    <tr>
        <td>
        <p class="card-text"><?php echo $result['nombre'] ?> - <?php echo $result['apellido'] ?> - <?php echo $result['dni'] ?>

        </td>
        <td>
        <p class="card-text"><?php echo $result['fecha'] ?> - <?php echo $result['descripcion'] ?>
        </td>
        <td>

        </td>
    </tr>

</p>

<?php 
endforeach?>