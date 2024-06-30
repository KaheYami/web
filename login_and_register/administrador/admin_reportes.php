<?php
session_start();

$pass = ""; 
$username_db = "gio"; 
$DB = "eloboost"; 

$conn = new mysqli('localhost', $username_db, $pass, $DB);

if ($conn->connect_error) {
    die(json_encode(['error' => "La conexión falló: " . $conn->connect_error]));
}

function getTopBoostersData() {
    global $conn;
    $query = "SELECT b.Nombre_booster, COUNT(*) AS Pedidos_completados
              FROM asignacion a
              INNER JOIN booster b ON a.ID_booster = b.ID_booster
              INNER JOIN pedidos p ON a.ID_pedido = p.ID_pedido  
              WHERE a.ID_pedido IS NOT NULL AND p.Estado_del_pedido = 1
              GROUP BY a.ID_booster, b.Nombre_booster
              ORDER BY Pedidos_completados DESC
              LIMIT 5";
    $result = $conn->query($query);
    if (!$result) {
        return ['error' => $conn->error];
    }
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = [$row['Nombre_booster'], (int)$row['Pedidos_completados']];
    }
    return $data;
}

function getVentasData() {
    global $conn;
    $query = "SELECT DATE(Fecha_pedido) AS Fecha, SUM(Monto) AS Monto
              FROM pedidos
              WHERE Estado = 'Completado'
              GROUP BY Fecha
              ORDER BY Fecha";
    $result = $conn->query($query);
    if (!$result) {
        return ['error' => $conn->error];
    }
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = [$row['Fecha'], (float)$row['Monto']];
    }
    return $data;
}

function getVentasTemporalesData($fechaInicio, $fechaFin) {
    global $conn;
    $query = "SELECT DATE(Fecha_pedido) AS Fecha, SUM(Monto) AS Monto
              FROM pedidos
              WHERE Estado = 'Completado'
                AND Fecha_pedido BETWEEN '$fechaInicio' AND '$fechaFin'
              GROUP BY Fecha
              ORDER BY Fecha";
    $result = $conn->query($query);
    if (!$result) {
        return ['error' => $conn->error];
    }
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = [$row['Fecha'], (float)$row['Monto']];
    }
    return $data;
}

function getTiempoMedioEntrega() {
    global $conn;
    $query = "SELECT AVG(DATEDIFF(Fecha_entrega, Fecha_pedido)) AS tiempo_medio_entrega
              FROM pedidos
              WHERE Estado = 'Completado'";
    $result = $conn->query($query);
    if (!$result) {
        return ['error' => $conn->error];
    }
    $row = $result->fetch_assoc();
    return $row['tiempo_medio_entrega'];
}

function getPedidosPorBoosterData($rangoBooster) {
    global $conn;
    $query = "SELECT b.Nombre_booster, COUNT(a.ID_pedido) AS Pedidos
              FROM asignacion a
              INNER JOIN boosters b ON a.ID_booster = b.ID_booster
              WHERE b.LV_skill >= $rangoBooster
              GROUP BY b.ID_booster, b.Nombre_booster
              ORDER BY Pedidos DESC";
    $result = $conn->query($query);
    if (!$result) {
        return ['error' => $conn->error];
    }
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = [$row['Nombre_booster'], (int)$row['Pedidos']];
    }
    return $data;
}

function getScatterData() {
    global $conn;
    $query = "SELECT Rango_anterior, Rango_actual FROM jugadores ORDER BY Rango_anterior";
    $result = $conn->query($query);
    if (!$result) {
        return ['error' => $conn->error];
    }
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = [(int)$row['Rango_anterior'], (int)$row['Rango_actual']];
    }
    return $data;
}

// Manejo de solicitudes AJAX
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    header('Content-Type: application/json');
    switch ($action) {
        case 'getTopBoosters':
            echo json_encode(getTopBoostersData());
            break;
        case 'getVentas':
            echo json_encode(getVentasData());
            break;
        case 'getVentasTemporales':
            $fechaInicio = $_GET['fechaInicio'] ?? '2024-01-01';
            $fechaFin = $_GET['fechaFin'] ?? '2024-12-31';
            echo json_encode(getVentasTemporalesData($fechaInicio, $fechaFin));
            break;
        case 'getTiempoMedioEntrega':
            echo json_encode(getTiempoMedioEntrega());
            break;
        case 'getPedidosPorBooster':
            $rangoBooster = $_GET['rangoBooster'] ?? 5;
            echo json_encode(getPedidosPorBoosterData($rangoBooster));
            break;
        case 'getScatterData':
            echo json_encode(getScatterData());
            break;
        default:
            echo json_encode(['error' => 'Acción no válida']);
    }
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Panel de Administrador - Reportes</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <script src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
   <div class="container">
      <h1>Reportes Administrativos</h1>
      <div class="row mb-4">
         <div class="col-md-4">
            <label for="categoria">Categoría:</label>
            <select class="form-control" id="categoria">
               <option value="">Todas</option>
            </select>
         </div>
         <div class="col-md-4">
            <label for="fecha_inicio">Fecha Inicio:</label>
            <input type="date" class="form-control" id="fecha_inicio">
         </div>
         <div class="col-md-4">
            <label for="fecha_fin">Fecha Fin:</label>
            <input type="date" class="form-control" id="fecha_fin">
         </div>
      </div>
      <div class="row">
         <div class="col-md-6">
            <div id="top_boosters_chart" style="height: 400px;"></div>
         </div>
         <div class="col-md-6">
            <div id="ventas_chart" style="height: 400px;"></div>
         </div>
      </div>
      <div class="row mt-4">
         <div class="col-md-6">
            <div id="ventas_temporales_chart" style="height: 400px;"></div>
         </div>
         <div class="col-md-6">
            <div id="tiempo_entrega_gauge" style="height: 400px;"></div>
         </div>
      </div>
      <div class="row mt-4">
         <div class="col-md-6">
            <div id="pedidos_booster_chart" style="height: 400px;"></div>
         </div>
         <div class="col-md-6">
            <div id="scatter_chart" style="height: 400px;"></div>
         </div>
      </div>
   </div>
   <script>
      google.charts.load('current', {'packages':['corechart', 'controls', 'gauge']});
      google.charts.setOnLoadCallback(drawCharts);

      function drawCharts() {
         drawTopBoostersChart();
         drawVentasChart();
         drawVentasTemporalesChart();
         drawTiempoEntregaGauge();
         drawPedidosBoosterChart();
         drawScatterChart();
      }

      function drawTopBoostersChart() {
         fetch('data_handler.php?action=getTopBoosters')
            .then(response => response.json())
            .then(data => {
               console.log('Top Boosters Data:', data);
               var dataTable = new google.visualization.DataTable();
               dataTable.addColumn('string', 'Booster');
               dataTable.addColumn('number', 'Pedidos Completados');
               data.forEach(item => dataTable.addRow([item[0], item[1]]));

               var options = {
                  title: 'Top Boosters (Pedidos Completados)',
                  bars: 'horizontal',
                  hAxis: { minValue: 0 }
               };

               var chart = new google.visualization.BarChart(document.getElementById('top_boosters_chart'));
               chart.draw(dataTable, options);
            })
            .catch(error => console.error('Error fetching Top Boosters Data:', error));
      }

      function drawVentasChart() {
         fetch('data_handler.php?action=getVentas')
            .then(response => response.json())
            .then(data => {
               console.log('Ventas Data:', data);
               var dataTable = new google.visualization.DataTable();
               dataTable.addColumn('date', 'Fecha');
               dataTable.addColumn('number', 'Monto');
               data.forEach(item => dataTable.addRow([new Date(item[0]), item[1]]));

               var options = {
                  title: 'Ventas a lo largo del Tiempo',
                  legend: { position: 'none' },
                  hAxis: { format: 'MMM dd, yyyy' }
               };

               var chart = new google.visualization.LineChart(document.getElementById('ventas_chart'));
               chart.draw(dataTable, options);
            })
            .catch(error => console.error('Error fetching Ventas Data:', error));
      }

      function drawVentasTemporalesChart() {
         const fechaInicio = document.getElementById('fecha_inicio').value || '2024-01-01';
         const fechaFin = document.getElementById('fecha_fin').value || '2024-12-31';

         fetch(`data_handler.php?action=getVentasTemporales&fechaInicio=${fechaInicio}&fechaFin=${fechaFin}`)
            .then(response => response.json())
            .then(data => {
               console.log('Ventas Temporales Data:', data);
               var dataTable = new google.visualization.DataTable();
               dataTable.addColumn('date', 'Fecha');
               dataTable.addColumn('number', 'Monto');
               data.forEach(item => dataTable.addRow([new Date(item[0]), item[1]]));

               var options = {
                  title: 'Ventas Temporales',
                  legend: { position: 'none' },
                  hAxis: { format: 'MMM dd, yyyy' }
               };

               var chart = new google.visualization.LineChart(document.getElementById('ventas_temporales_chart'));
               chart.draw(dataTable, options);
            })
            .catch(error => console.error('Error fetching Ventas Temporales Data:', error));
      }

      function drawTiempoEntregaGauge() {
         fetch('data_handler.php?action=getTiempoMedioEntrega')
            .then(response => response.json())
            .then(data => {
               console.log('Tiempo Entrega Data:', data);
               var dataTable = google.visualization.arrayToDataTable([
                  ['Label', 'Value'],
                  ['Tiempo Medio de Entrega', data]
               ]);

               var options = {
                  redFrom: 5, redTo: 7,
                  yellowFrom: 4, yellowTo: 5,
                  minorTicks: 5
               };

               var chart = new google.visualization.Gauge(document.getElementById('tiempo_entrega_gauge'));
               chart.draw(dataTable, options);
            })
            .catch(error => console.error('Error fetching Tiempo Entrega Data:', error));
      }

      function drawPedidosBoosterChart() {
         const rangoBooster = 5;

         fetch(`data_handler.php?action=getPedidosPorBooster&rangoBooster=${rangoBooster}`)
            .then(response => response.json())
            .then(data => {
               console.log('Pedidos Booster Data:', data);
               var dataTable = new google.visualization.DataTable();
               dataTable.addColumn('string', 'Booster');
               dataTable.addColumn('number', 'Pedidos');
               data.forEach(item => dataTable.addRow([item[0], item[1]]));

               var options = {
                  title: `Pedidos por Booster (Filtro LV_skill >= ${rangoBooster})`,
                  bars: 'horizontal',
                  hAxis: { minValue: 0 }
               };

               var chart = new google.visualization.BarChart(document.getElementById('pedidos_booster_chart'));
               chart.draw(dataTable, options);
            })
            .catch(error => console.error('Error fetching Pedidos Booster Data:', error));
      }

      function drawScatterChart() {
         fetch('data_handler.php?action=getScatterData')
            .then(response => response.json())
            .then(data => {
               console.log('Scatter Data:', data);
               var dataTable = new google.visualization.DataTable();
               dataTable.addColumn('number', 'Rango Anterior');
               dataTable.addColumn('number', 'Rango Actual');
               data.forEach(item => dataTable.addRow([item[0], item[1]]));

               var options = {
                  title: 'Gráfico de Dispersión de Rango con Curva de Progreso de Jugadores',
                  hAxis: { title: 'Rango Anterior' },
                  vAxis: { title: 'Rango Actual' },
                  legend: 'none'
               };

               var chart = new google.visualization.ScatterChart(document.getElementById('scatter_chart'));
               chart.draw(dataTable, options);
            })
            .catch(error => console.error('Error fetching Scatter Data:', error));
      }
   </script>
</body>
</html>
