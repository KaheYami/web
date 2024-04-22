<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Selección de Liga</title>
<link rel="stylesheet" href="style_service.css">

</head>
<body>

<div class="container">
  <div class="panel">
    <div class="section">
      <h2>Liga Actual</h2>
      <div class="buttons" id="ligaActual">
        <button class="button" onclick="seleccionarLiga('ligaActual', this)">Hierro</button>
        <button class="button" onclick="seleccionarLiga('ligaActual', this)">Bronce</button>
        <button class="button" onclick="seleccionarLiga('ligaActual', this)">Plata</button>
        <button class="button" onclick="seleccionarLiga('ligaActual', this)">Oro</button>
        <button class="button" onclick="seleccionarLiga('ligaActual', this)">Platino</button>
        <button class="button" onclick="seleccionarLiga('ligaActual', this)">Esmeralda</button>
        <button class="button" onclick="seleccionarLiga('ligaActual', this)">Diamante</button>
      </div>
    </div>
    
    <div class="section">
      <h2>Liga Deseada</h2>
      <div class="buttons" id="ligaDeseada">
        <button class="button" onclick="seleccionarLiga('ligaDeseada', this)">Hierro</button>
        <button class="button" onclick="seleccionarLiga('ligaDeseada', this)">Bronce</button>
        <button class="button" onclick="seleccionarLiga('ligaDeseada', this)">Plata</button>
        <button class="button" onclick="seleccionarLiga('ligaDeseada', this)">Oro</button>
        <button class="button" onclick="seleccionarLiga('ligaDeseada', this)">Platino</button>
        <button class="button" onclick="seleccionarLiga('ligaDeseada', this)">Esmeralda</button>
        <button class="button" onclick="seleccionarLiga('ligaDeseada', this)">Diamante</button>
      </div>
    </div>
  </div>

  <div class="panel" id="panelSeleccion">
    <h2>Ligas Seleccionadas</h2>
    <div id="ligasSeleccionadas"></div>
    <div id="precioBloque"></div>
  </div>

</div>

<script>
  var seleccionActual = null;
  var seleccionDeseada = null;

  function seleccionarLiga(tipoLiga, boton) {
    if (tipoLiga === 'ligaActual') {
      if (seleccionActual) {
        seleccionActual.classList.remove('selected');
      }
      seleccionActual = boton;
      desactivarBoton(boton, 'ligaDeseada');
    } else {
      if (seleccionDeseada) {
        seleccionDeseada.classList.remove('selected');
      }
      seleccionDeseada = boton;
      desactivarBoton(boton, 'ligaActual');
    }

    boton.classList.add('selected');

    mostrarLigasSeleccionadas();
    mostrarPrecioTransaccion();
  }

  function desactivarBoton(boton, tipoLiga) {
    var botones = document.getElementById(tipoLiga).getElementsByClassName('button');
    for (var i = 0; i < botones.length; i++) {
      if (botones[i] !== boton) {
        botones[i].disabled = false;
        botones[i].classList.remove('disabled');
      }
    }
  }

  function mostrarLigasSeleccionadas() {
    var ligaActualSeleccionada = seleccionActual ? seleccionActual.innerText : 'Ninguna';
    var ligaDeseadaSeleccionada = seleccionDeseada ? seleccionDeseada.innerText : 'Ninguna';

    var ligasSeleccionadasHTML = '<p>Liga Actual: ' + ligaActualSeleccionada + '</p>' +
                                 '<p>Liga Deseada: ' + ligaDeseadaSeleccionada + '</p>';

    document.getElementById('ligasSeleccionadas').innerHTML = ligasSeleccionadasHTML;
  }

  function mostrarPrecioTransaccion() {
    var precio = calcularPrecioTransaccion();
    var precioHTML = '<h2>Precio de la Transacción</h2>' +
                    '<p>' + precio + '</p>' +
                    '<button class="button" onclick="pagar()">Pagar</button>';

    document.getElementById('precioBloque').innerHTML = precioHTML;
  }

  function calcularPrecioTransaccion() {
    var ligaActual = seleccionActual ? seleccionActual.innerText : null;
    var ligaDeseada = seleccionDeseada ? seleccionDeseada.innerText : null;
    var precioBase = 20;
    var precioBase1 = 40;

    if (!ligaActual || !ligaDeseada) {
      return 'Seleccione ambas ligas';
    }

    var diferencia = obtenerDiferenciaLigas(ligaActual, ligaDeseada);
    var costo = 0;

    if (diferencia > 0) {
      costo = precioBase * diferencia;
    } else if (diferencia < 0) {
      costo = precioBase1 * Math.abs(diferencia);
    }

    return '$' + costo;
  }

  function obtenerDiferenciaLigas(ligaActual, ligaDeseada) {
    var ligas = ['Hierro', 'Bronce', 'Plata', 'Oro', 'Platino', 'Esmeralda', 'Diamante'];
    var indiceActual = ligas.indexOf(ligaActual);
    var indiceDeseada = ligas.indexOf(ligaDeseada);

    return indiceDeseada - indiceActual;
  }

  function pagar() {
    alert('Pago realizado con éxito');
  }
</script>

</body>
</html>


<?php
session_start();

// Conexión a la base de datos
$servername = "localhost"; // Cambia esto por tu servidor de base de datos
$pass = ""; // Tu contraseña de base de datos
$username = "edgar"; // Tu nombre de usuario de base de datos
$DB = "wenssen"; // Tu nombre de base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}

// Obtener los datos del formulario
$ligaInicial = $_POST['ligaInicial'];
$ligaFinal = $_POST['ligaFinal'];
$precioTransaccion = $_POST['precioTransaccion'];
$idUsuario = $_SESSION['user_id']; // Aquí deberías tener la lógica para obtener el ID del usuario que está realizando el pedido
$fechaPedido = time(); // Fecha actual en formato UNIX timestamp
$estadoPedido = false; // Estado inicial del pedido

// Consulta SQL para insertar los datos en la tabla pedidos
$sql = "INSERT INTO pedidos (ID_usuario, Fecha_pedido, Nivel_inicial, Nivel_deseado, Estado_del_pedido, Transaccion)
VALUES ('$idUsuario', '$fechaPedido', '$ligaInicial', '$ligaFinal', '$estadoPedido', '$precioTransaccion')";

if ($conn->query($sql) === TRUE) {
  echo "Pedido realizado con éxito";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar conexión
$conn->close();
?>
