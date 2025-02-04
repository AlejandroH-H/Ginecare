<?php

include("../../conexion.php");
$stmt = $pdo->prepare("SELECT c.id, e.nombre, e.apellido, e.dni, DATE(c.fecha) as fecha, TIME(c.fecha) as hora, c.motivo, c.estado 
         FROM citas c  JOIN empleados e  on (c.empleado_id=e.id) WHERE c.estado = 'pospuesta'");
$stmt->execute();
$citas = $stmt->fetchAll();

foreach ($citas as $cita):
?>
  <tr>
    <td class="columnas"><?php echo $cita['nombre'] ?> - <?php echo $cita['apellido'] ?></td>
    <td class="columnas"><?php echo $cita['dni'] ?></td>
    <td class="columnas"><?php echo $cita['motivo'] ?></td>
    <td class="columnas"><?php echo $cita['fecha'] ?></td>
    <td class="columnas"><?php echo $cita['hora'] ?></td>
    <td class="columnas"><?php echo $cita['estado'] ?></td>
    <td class="columnas">
      <form action="" method="post" style="display:inline;">


        <input type="hidden" name="id" value="<?= $cita['id'] ?>">
        <input type="hidden" name="fecha" value="<?= $cita['fecha'] ?>">
        <input type="hidden" name="hora" value="<?= $cita['hora'] ?>">
        <select name="estado">
          <option value="confirmada">Confirmar</option>
          <option value="eliminada">Eliminar</option>
        </select>
        <button type="submit" class="btn btn-primary" name="registro" value="ok">Actualizar</button>
      </form>
    </td>

    <td class="columnas"><a href=admin_citas1.php?id=<?= $cita['id'] //mandamos el id 
                                      ?> class="btn btn-small btn-secondary"> <i class="fa-regular fa-clipboard"></i></a>
    </td>
  </tr>
<?php
endforeach;
?>