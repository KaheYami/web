<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
  <head> <!-- esto no se muestra al usuario -->
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Servicios</title>
      <link rel="stylesheet" href="style.css">
  </head>
  <body><!-- esto si se muestra al usuario -->
    <h1 class="titulo">wensen</h1>
    <nav role="navigation">
      <div id="menuToggle">
        <input type="checkbox" />
        <span></span>
        <span></span>
        <span></span>
        <ul id="menu">
          <li><a href="#" id="boosting">boosting</a>
            <ul>
              <li><a href="servicios/League_of_legends.php">leagueoflegends</a></li>
              <li><a href="#">Submenu 2</a></li>
              <li><a href="#">Submenu 3</a></li>
            </ul>
          </li>
          <li><a href="#" id="coaching">Coaching</a>
            <ul>
              <li><a href="#">Submenu 1</a></li>
              <li><a href="#">Submenu 2</a></li>
              <li><a href="#">Submenu 3</a></li>
            </ul>
          </li>
          <li><a href="#" id="Cuentas">Cuentas</a>
            <ul>
              <li><a href="#">Submenu 1</a></li>
              <li><a href="#">Submenu 2</a></li>
              <li><a href="#">Submenu 3</a></li>
            </ul>
          </li>
          <li><a href="#">Contacto</a></li>
          <li><a href="#">Blog</a></li>
        </ul>
      </div>
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

    <!-- Aquí muestras el ID del usuario -->
    <p>ID de usuario: <?php echo $_SESSION['user_id']; ?></p>


  </body>
</html>

