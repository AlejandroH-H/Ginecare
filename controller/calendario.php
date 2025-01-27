<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario de Citas</title>

    <style>
        .disponible{
            background-color: green;
            color: white;
        }
        .ocupado{
            background-color: red;
            color: white;
        }
        .no-disponible{
            background-color: gray;
            color: white;
        }
        .calendario{
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 10px;
        }
        .dia{
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }
        .horario{
            margin: 5px 0;
        }
    </style>

</head>
<body>
    <div class="container">
    
        <?php
include("../../conexion.php");
date_default_timezone_set('America/Caracas');

$mesn = isset($_GET['mesn']) ? $_GET['mesn'] : date('m');
$yearn = isset($_GET['yearn']) ? $_GET['yearn'] : date('Y');


$mes = date('m');
$year = date('Y');
$mesMax = date('m', strtotime('+3 months'));
$yearMax = date('Y', strtotime('+3 months'));

$fechaActual = date('Y-m-d');

$primerDia = "$yearn-$mesn-01";
$test1 = date('F', strtotime($primerDia));

switch ($test1) {
    case "January":
        $test1 = "Enero";
    break;
    case "February":
        $test1 = "Febrero";
      break;
    case "March":
        $test1 = "Marzo";
      break;
    case "April":
        $test1 = "Abril";
     break;
     case "May":
        $test1 = "Mayo";
     break;
     case "June":
        $test1 = "Junio";
        break;
     case "July":
         $test1 = "Julio";
         break;
    case "August":
         $test1 = "Agosto";
        break;
     case "September":
         $test1 = "Septiembre";
         break;
     case "November":
        $test1 = "Noviembre";
        break;        
    default:
    $test1 = "Diciembre";
  }

$ultimoDia = date("Y-m-t", strtotime($primerDia));

$stmt = $pdo->prepare('SELECT DISTINCT DATE(fecha) as fecha, TIME(fecha) as hora FROM citas 
WHERE fecha BETWEEN :primerDia AND :ultimoDia');

$stmt->bindParam(':primerDia', $primerDia);
$stmt->bindParam(':ultimoDia', $ultimoDia);
$stmt->execute();
$citas = $stmt->fetchAll(PDO::FETCH_ASSOC);



$citasPorFecha = [];
foreach($citas as $cita){
    $fecha = $cita['fecha'];
    $hora = $cita['hora'];

    if(!isset($citasPorFecha[$fecha])){
        $citasPorFecha[$fecha] = ['mañana' => false, 'tarde' => false];
    }
    if($hora == '09:00:00'){
        $citasPorFecha[$fecha]['mañana']= true;
    } elseif($hora == '15:00:00'){
        $citasPorFecha[$fecha]['tarde']= true;
    }
    
}

echo "<h1>CALENDARIO DE CITAS $test1</h1>";
       echo "<div id='calendario' class='calendario'>";

$diasEnMes = date('t', strtotime($primerDia));
for($dia = 1; $dia <= $diasEnMes; $dia++){
    $fecha = "$yearn-$mesn-" . str_pad($dia, 2, '0', STR_PAD_LEFT);
    
    $test = date('l', strtotime($fecha));

    switch ($test) {
        case "Sunday":
            $test = "Domingo";
        break;
        case "Monday":
            $test = "Lunes";
          break;
        case "Tuesday":
            $test = "Martes";
          break;
        case "Wednesday":
            $test = "Miercoles";
         break;
         case "Thursday":
            $test = "Jueves";
         break;
         case "Friday":
            $test = "Viernes";
            break;
        default:
        $test = "Sabado";
      }

    $estado = 'disponible';
    if($fecha<=$fechaActual OR $test == "Domingo" ){
        $estado = 'no-disponible';
    } elseif(isset($citasPorFecha[$fecha])){
        $estadoMañana = isset($citasPorFecha[$fecha]) && $citasPorFecha[$fecha]['mañana'] ? 'ocupado' : 'disponible';
        $estadoTarde = isset($citasPorFecha[$fecha]) && $citasPorFecha[$fecha]['tarde'] ? 'ocupado' : 'disponible';
    
    } else{
        $estadoMañana = 'disponible';
        $estadoTarde = 'disponible';
    }
    
    echo "<div class='dia $estado'>";

    echo "<div>$dia $test</div>";

    if($estado !=='no-disponible'){
        echo "<div class='horario $estadoMañana'>Mañana</div>";

        echo "<div class='horario $estadoTarde'>Tarde</div>";

    }

   

    echo"</div>";
}
?>
        </div>
        <?php
        echo"<div class='mt-3'>";
        if ($yearn > $year OR ($yearn == $year AND $mesn>$mes)){
            $mesAnterior = $mesn - 1;
            $lastyear = $yearn;
            if($mesAnterior<1){
                $mesAnterior = 12;
                $lastyear--;
            }
            echo "<a href='citas.php?mesn=0$mesAnterior&yearn=$lastyear' class='btn btn-primary'>Mes Anterior</a>";
        }
        if($yearn < $yearMax OR ($yearn == $yearMax AND $mesn < $mesMax)){
            $mesSiguiente = $mesn + 1;
            $nextYear = $yearn;
            if ($mesSiguiente > 12){
                $mesSiguiente = 1;
                $nextYear++;
            }
            echo "<a href='citas.php?mesn=0$mesSiguiente&yearn=$nextYear' class='btn btn-primary'>Mes Siguiente</a>";

        }
        
        ?>
    </div>

    

    
</body>
</html>