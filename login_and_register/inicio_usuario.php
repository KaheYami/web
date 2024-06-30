<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
  <head> <!-- esto no se muestra al usuario -->
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Wenssen</title>
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  </head>
  <body><!-- esto si se muestra al usuario -->
    <h1 class="titulo">wensen</h1>
    <nav role="navigation">
      <i class="fas fa-user" id="user-icon"></i>
    </nav>
    <h2 id="servicios">Servicios para league of legends</h2>
    <div class="container">
      <div class="box" >
          <span style="--i:1;"><img src="img/plata.webp"></span>
          <span style="--i:2;"><img src="img/oro.webp"></span>
          <span style="--i:3;"><img src="img/platino.webp"></span>
          <span style="--i:4;"><img src="img/esmeralda.webp"></span>
          <span style="--i:5;"><img src="img/diamante.webp"></span>
          <span style="--i:6;"><img src="img/master.png"></span>
          <span style="--i:7;"><img src="img/chall.png"></span>
          <span style="--i:8;"><img src="img/bronce.webp"></span>

      </div>
    </div>

    <script>
        document.getElementById('user-icon').addEventListener('click', function() {
            window.location.href = 'login.php';
        });
    </script> 
  </body>
</html>

