<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="login.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <title>Login como Administrador</title>
</head>
<body> 
   <div class="container" id="main">
       <div class="sign-in">
           <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
               <h1>Iniciar sesión como administrador</h1>
               <div class="social-container">
                 <a href="#" class="social"> <i class="fa-brands fa-instagram"></i></a>
                 <a href="#" class="social"><i class="fa-brands fa-github"></i></a>
                 <a href="#" class="social"><i class="fa-brands fa-linkedin"></i></a>
               </div>
               <p>Ingrese su usuario y contraseña</p>
               <input type="text" name="username" placeholder="Usuario" required="">
               <input type="password" name="password" placeholder="Password" required="">
               <button type="submit" name="login">Iniciar sesión</button>
           </form> 
       </div> 
       <div class="overlay-container">
           <div class="overlay">
               <div class="overlay-left">
               <h1>¡¡Bienvenido de nuevo!!</h1>
               <p> Para disfrutar de las funciones de nuestra aplicación con nosotros, inicie sesión con su información personal</p>
               </div>
           </div>
       </div>
   </div>
</body>
</html>

<?php
session_start(); // Iniciar la sesión si aún no se ha iniciado

$pass = ""; // Tu contraseña de base de datos
$username_db = "gio"; // Tu nombre de usuario de base de datos
$DB = "eloboost"; // Tu nombre de base de datos

// Verifica si se envió el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    // Conexión a la base de datos (reemplaza 'localhost', 'username', 'password' y 'database' con tus propios datos)
    $conn = new mysqli('localhost', $username_db, $pass, $DB);
    
    // Verifica si la conexión tuvo éxito
    if ($conn->connect_error) {
        die("La conexión falló: " . $conn->connect_error);
    } else {
        // Recupera los datos del formulario de inicio de sesión
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        // Prepara la consulta SQL para buscar el administrador en la base de datos por nombre de usuario
        $sql = $conn->prepare("SELECT * FROM administrador WHERE Nombre_administrador=?");
        $sql->bind_param("s", $username);
        $sql->execute();
        $result = $sql->get_result();
        
        // Verifica si se encontró un administrador con el nombre de usuario proporcionado
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Verifica si la contraseña proporcionada coincide con la almacenada en la base de datos
            if ($password === $row['Contraseña']) { 
                // Inicio de sesión exitoso como administrador
                // Almacena el ID del administrador en una variable de sesión
                $_SESSION['user_id'] = $row['ID_administrador'];
                // Redirige al administrador a la página admin.php
                header("Location: /web/login_and_register/administrador/panel_admin.php");
                exit(); // Asegura que el script se detenga después de la redirección
            } else {
                echo "<script>alert('Contraseña incorrecta');</script>";
            }
        } else {
            // No se encontró ningún administrador con ese nombre de usuario
            echo "<script>alert('Usuario incorrecto');</script>";
        }
        
        // Cierra la conexión
        $conn->close();
    }
}
?>
