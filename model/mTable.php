<?php
include('../../conexion.php');

$stmt = $pdo->query('SELECT h.id, e.id as userid, e.nombre as paciente, e.apellido as paciente1, e.dni, a.nombre as doctor, h.fecha,
                 h.motivo, h.estado, h.realizada FROM historial_citas h JOIN empleados e ON (h.empleado_id=e.id)
                JOIN admin a ON (h.admin_id=a.id) WHERE h.modificada = 0');

$citas = $stmt->fetchAll();
foreach ($citas as $cita) {
  echo "<tr>";
  echo "<td class=columnas>" . htmlspecialchars($cita['paciente']) . " " . htmlspecialchars($cita['paciente1']) . "</td>";

  echo "<td class=columnas>" . htmlspecialchars($cita['dni']) . "</td>";

  echo "<td class=columnas>" . htmlspecialchars($cita['doctor']) . "</td>";

  echo "<td class=columnas>" . htmlspecialchars($cita['fecha']) . "</td>";

  echo "<td class=columnas>" . htmlspecialchars($cita['motivo']) . "</td>";

  echo "<td class=columnas>" . htmlspecialchars($cita['estado']) . "</td>";

  echo "<td class=columnas>" . ($cita['realizada'] ? 'Sí' : 'No') . "</td>";

  echo "<td class=columnas>";
  echo "<form action='' method='post' style='display:inline;'>";
  include('actualizar_hcitas.php');
  echo "<input type='hidden' name='id' value='" . htmlspecialchars($cita['id']) . "'>";
  echo "<input type='hidden' name='userid' value='" . htmlspecialchars($cita['userid']) . "'>";


  echo "<select name='realizada'>";
  echo "<option value='1'" . ($cita['realizada'] ? ' selected' : '') . ">Sí</option>";
  echo "<option value='0'" . (!$cita['realizada'] ? ' selected' : '') . ">No</option>";
  echo "</select>";

  echo "<button type='submit' class='btn btn-primary'>Actualizar</button>";
  echo "</form>";
  echo "</td>";
  echo "</tr>";
}
