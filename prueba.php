<?php
 $d = date('d');
 $m = date('m');
 $y = date('Y');
 $h = date('h', strtotime('-5 hours'));  
 $i = date('i');  
 $fecha = $y . '-' . $m . '-' . $d . ' ' . $h . ':' . $i;

echo $fecha;

?>