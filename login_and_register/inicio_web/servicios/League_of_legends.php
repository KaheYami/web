<?php session_start(); ?>

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
                <button class="button" onclick="seleccionarLiga('ligaActual', this)">Hierro IV</button>
                <button class="button" onclick="seleccionarLiga('ligaActual', this)">Hierro III</button>
                <button class="button" onclick="seleccionarLiga('ligaActual', this)">Hierro II</button>
                <button class="button" onclick="seleccionarLiga('ligaActual', this)">Hierro I</button>
                <button class="button" onclick="seleccionarLiga('ligaActual', this)">Bronce IV</button>
                <button class="button" onclick="seleccionarLiga('ligaActual', this)">Bronce III</button>
                <button class="button" onclick="seleccionarLiga('ligaActual', this)">Bronce II</button>
                <button class="button" onclick="seleccionarLiga('ligaActual', this)">Bronce I</button>
                <button class="button" onclick="seleccionarLiga('ligaActual', this)">Plata IV</button>
                <button class="button" onclick="seleccionarLiga('ligaActual', this)">Plata III</button>
                <button class="button" onclick="seleccionarLiga('ligaActual', this)">Plata II</button>
                <button class="button" onclick="seleccionarLiga('ligaActual', this)">Plata I</button>
                <button class="button" onclick="seleccionarLiga('ligaActual', this)">Oro IV</button>
                <button class="button" onclick="seleccionarLiga('ligaActual', this)">Oro III</button>
                <button class="button" onclick="seleccionarLiga('ligaActual', this)">Oro II</button>
                <button class="button" onclick="seleccionarLiga('ligaActual', this)">Oro I</button>
                <button class="button" onclick="seleccionarLiga('ligaActual', this)">Platino IV</button>
                <button class="button" onclick="seleccionarLiga('ligaActual', this)">Platino III</button>
                <button class="button" onclick="seleccionarLiga('ligaActual', this)">Platino II</button>
                <button class="button" onclick="seleccionarLiga('ligaActual', this)">Platino I</button>
                <button class="button" onclick="seleccionarLiga('ligaActual', this)">Esmeralda IV</button>
                <button class="button" onclick="seleccionarLiga('ligaActual', this)">Esmeralda III</button>
                <button class="button" onclick="seleccionarLiga('ligaActual', this)">Esmeralda II</button>
                <button class="button" onclick="seleccionarLiga('ligaActual', this)">Esmeralda I</button>
                <button class="button" onclick="seleccionarLiga('ligaActual', this)">Diamante IV</button>
                <button class="button" onclick="seleccionarLiga('ligaActual', this)">Diamante III</button>
                <button class="button" onclick="seleccionarLiga('ligaActual', this)">Diamante II</button>
                <button class="button" onclick="seleccionarLiga('ligaActual', this)">Diamante I</button>
                <button class="button" onclick="seleccionarLiga('ligaActual', this)">Maestro</button>
                <button class="button" onclick="seleccionarLiga('ligaActual', this)">Gran Maestro</button>
                <button class="button" onclick="seleccionarLiga('ligaActual', this)">Challenger</button>
            </div>
        </div>

        <div class="section">
            <h2>Liga Deseada</h2>
            <div class="buttons" id="ligaDeseada">
                <button class="button" onclick="seleccionarLiga('ligaDeseada', this)">Hierro IV</button>
                <button class="button" onclick="seleccionarLiga('ligaDeseada', this)">Hierro III</button>
                <button class="button" onclick="seleccionarLiga('ligaDeseada', this)">Hierro II</button>
                <button class="button" onclick="seleccionarLiga('ligaDeseada', this)">Hierro I</button>
                <button class="button" onclick="seleccionarLiga('ligaDeseada', this)">Bronce IV</button>
                <button class="button" onclick="seleccionarLiga('ligaDeseada', this)">Bronce III</button>
                <button class="button" onclick="seleccionarLiga('ligaDeseada', this)">Bronce II</button>
                <button class="button" onclick="seleccionarLiga('ligaDeseada', this)">Bronce I</button>
                <button class="button" onclick="seleccionarLiga('ligaDeseada', this)">Plata IV</button>
                <button class="button" onclick="seleccionarLiga('ligaDeseada', this)">Plata III</button>
                <button class="button" onclick="seleccionarLiga('ligaDeseada', this)">Plata II</button>
                <button class="button" onclick="seleccionarLiga('ligaDeseada', this)">Plata I</button>
                <button class="button" onclick="seleccionarLiga('ligaDeseada', this)">Oro IV</button>
                <button class="button" onclick="seleccionarLiga('ligaDeseada', this)">Oro III</button>
                <button class="button" onclick="seleccionarLiga('ligaDeseada', this)">Oro II</button>
                <button class="button" onclick="seleccionarLiga('ligaDeseada', this)">Oro I</button>
                <button class="button" onclick="seleccionarLiga('ligaDeseada', this)">Platino IV</button>
                <button class="button" onclick="seleccionarLiga('ligaDeseada', this)">Platino III</button>
                <button class="button" onclick="seleccionarLiga('ligaDeseada', this)">Platino II</button>
                <button class="button" onclick="seleccionarLiga('ligaDeseada', this)">Platino I</button>
                <button class="button" onclick="seleccionarLiga('ligaDeseada', this)">Esmeralda IV</button>
                <button class="button" onclick="seleccionarLiga('ligaDeseada', this)">Esmeralda III</button>
                <button class="button" onclick="seleccionarLiga('ligaDeseada', this)">Esmeralda II</button>
                <button class="button" onclick="seleccionarLiga('ligaDeseada', this)">Esmeralda I</button>
                <button class="button" onclick="seleccionarLiga('ligaDeseada', this)">Diamante IV</button>
                <button class="button" onclick="seleccionarLiga('ligaDeseada', this)">Diamante III</button>
                <button class="button" onclick="seleccionarLiga('ligaDeseada', this)">Diamante II</button>
                <button class="button" onclick="seleccionarLiga('ligaDeseada', this)">Diamante I</button>
                <button class="button" onclick="seleccionarLiga('ligaDeseada', this)">Maestro</button>
                <button class="button" onclick="seleccionarLiga('ligaDeseada', this)">Gran Maestro</button>
                <button class="button" onclick="seleccionarLiga('ligaDeseada', this)">Challenger</button>
            </div>
        </div>
    </div>

    <div class="panel" id="panelSeleccion">
        <h2>Ligas Seleccionadas</h2>
        <div id="ligasSeleccionadas"></div>
        <div id="precioBloque"></div>
    </div>
    <form id="formPedido" method="POST" action="League_of_legends.php">
    <input type="hidden" name="ligaInicial" id="ligaInicial">
    <input type="hidden" name="ligaFinal" id="ligaFinal">
    <input type="hidden" name="precioTransaccion" id="precioTransaccion">
    <button type="submit" class="button" onclick="return pagar()">Pagar</button>
</form>

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
    var precioRangos = [2500, 3000, 3500, 4000, // Hierro
                        3300, 3900, 4200, 4500, // Bronce
                        3800, 4000, 4800, 5100, // Plata
                        3400, 3800, 4200, 6000, // Oro
                        6300, 6700, 7500, 10000, // Platino
                        11500, 13000, 15000, 40000, 60000, 80000 // Diamante, Maestro, Gran Maestro, Challenger
                       ];

    if (!ligaActual || !ligaDeseada) {
        return '... Seleccione ambas ligas';
    }

    var diferencia = obtenerDiferenciaLigas(ligaActual, ligaDeseada);
    var costo = 0;

    if (diferencia > 0) {
        for (var i = 0; i < diferencia; i++) {
            costo += precioRangos[obtenerIndiceRango(ligaActual) + i];
        }
    } else if (diferencia < 0) {
        for (var i = 0; i < Math.abs(diferencia); i++) {
            costo += precioRangos[obtenerIndiceRango(ligaActual) + i];
        }
    }

    return '$' + costo + ' CLP';
}


  function obtenerIndiceRango(liga) {
      var ligas = ['Hierro IV', 'Hierro III', 'Hierro II', 'Hierro I',
                  'Bronce IV', 'Bronce III', 'Bronce II', 'Bronce I',
                  'Plata IV', 'Plata III', 'Plata II', 'Plata I',
                  'Oro IV', 'Oro III', 'Oro II', 'Oro I',
                  'Platino IV', 'Platino III', 'Platino II', 'Platino I',
                  'Diamante IV', 'Diamante III', 'Diamante II', 'Diamante I',
                  'Maestro', 'Gran Maestro', 'Challenger'];
      return ligas.indexOf(liga);
  }

  function obtenerDiferenciaLigas(ligaActual, ligaDeseada) {
      var indiceActual = obtenerIndiceRango(ligaActual);
      var indiceDeseada = obtenerIndiceRango(ligaDeseada);

      return indiceDeseada - indiceActual;
  }


  function obtenerDiferenciaLigas(ligaActual, ligaDeseada) {
    var rangos = ['Hierro IV', 'Hierro III', 'Hierro II', 'Hierro I', 'Bronce IV', 'Bronce III', 'Bronce II', 'Bronce I', 'Plata IV', 'Plata III', 'Plata II', 'Plata I', 'Oro IV', 'Oro III', 'Oro II', 'Oro I', 'Platino IV', 'Platino III', 'Platino II', 'Platino I', 'Diamante IV', 'Diamante III', 'Diamante II', 'Diamante I', 'Maestro', 'Gran Maestro', 'Challenger'];
    var indiceActual = rangos.indexOf(ligaActual);
    var indiceDeseada = rangos.indexOf(ligaDeseada);

    return indiceDeseada - indiceActual;
}


    function pagar() {
        alert('Pago realizado con éxito');
        // Envía el formulario
        document.getElementById('formPedido').submit();
      
    }
</script>

</body>
</html>

<?php

// Verificar si la sesión ha sido iniciada correctamente
if (!isset($_SESSION['user_id'])) {
    die("Error: Sesión no iniciada.");
}

// Conexión a la base de datos
$servername = "localhost";
$username = "gio";
$password = "";
$DB = "eloboost";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $DB);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los datos del formulario
$ligaInicial = isset($_POST['ligaInicial']) ? $_POST['ligaInicial'] : null;
$ligaFinal = isset($_POST['ligaFinal']) ? $_POST['ligaFinal'] : null;
$precioTransaccion = isset($_POST['precioTransaccion']) ? $_POST['precioTransaccion'] : null;
$idUsuario = $_SESSION['user_id'];
$fechaPedido = time(); // Fecha actual en formato UNIX timestamp
$estadoPedido = false; // Estado inicial del pedido

// Verificar que todos los datos estén presentes
if (!$ligaInicial || !$ligaFinal || !$precioTransaccion) {
    die("Error: Datos incompletos.");
}

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

