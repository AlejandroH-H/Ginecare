<?php
include('../../conexion.php');

$stmt = $pdo->query('SELECT h.id, e.nombre as paciente, a.nombre as doctor, h.fecha,
                 h.motivo, h.estado, h.realizada FROM historial_citas h JOIN empleados e ON (h.empleado_id=e.id)
                JOIN admin a ON (h.admin_id=a.id) WHERE h.modificada = 0');

$citas = $stmt->fetchAll();
foreach ($citas as $cita) {
  echo "<tr>";
  echo "<td>" . htmlspecialchars($cita['paciente']) . "</td>";

  echo "<td>" . htmlspecialchars($cita['doctor']) . "</td>";

  echo "<td>" . htmlspecialchars($cita['fecha']) . "</td>";

  echo "<td>" . htmlspecialchars($cita['motivo']) . "</td>";

  echo "<td>" . htmlspecialchars($cita['estado']) . "</td>";

  echo "<td>" . ($cita['realizada'] ? 'Sí' : 'No') . "</td>";

  echo "<td>";
  echo "<form action='model/actualizar_hcitas.php' method='post' style='display:inline;'>";
  echo "<input type='hidden' name='id' value='" . htmlspecialchars($cita['id']) . "'>";

  echo "<select name='realizada'>";
  echo "<option value='1'" . ($cita['realizada'] ? ' selected' : '') . ">Sí</option>";
  echo "<option value='0'" . (!$cita['realizada'] ? ' selected' : '') . ">No</option>";
  echo "</select>";

  echo "<button type='submit' class='btn btn-primary'>Actualizar</button>";
  echo "</form>";
  echo "</td>";
  echo "</tr>";
}
