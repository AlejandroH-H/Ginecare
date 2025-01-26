<?php
require_once("../conexion.php");

$stmt = $pdo->prepare('SELECT e.id, e.nombre, e.apellido, e.dni FROM empleados e WHERE e.id!=1 ');
$stmt->execute();
$citas = $stmt->fetchAll();
foreach ($citas as $cita):
?>
  <tr>
    <td><?php echo $cita['nombre'] ?> - <?php echo $cita['apellido'] ?></td>
    <td><?php echo $cita['dni'] ?></td>
    <td><a href="gh1.php?id=<?= $cita['id'] //mandamos el id 
                            ?>" class="btn btn-small btn-secondary"> <i class="fa-regular fa-clipboard"></i></a>
    </td>

    <form action="" method="post" style="display:inline;">


      <input type="hidden" name="cita_id" value="<?= $cita['id'] ?>">

    </form>



  </tr>
<?php
endforeach;
?>