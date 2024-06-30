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
              INNER JOIN boosters b ON a.ID_booster = b.ID_booster
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
