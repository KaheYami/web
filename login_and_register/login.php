<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="login.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <title>Login</title>
</head>
<body> 
   <div class="container" id="main">
       <div class="sign-up">
           <form action="login.php" method="post">
               <h1>Crear una cuenta</h1>
               <div class="social-container">
                 <a href="#" class="social"> <i class="fa-brands fa-instagram"></i></a>
                 <a href="#" class="social"><i class="fa-brands fa-github"></i></a>
                 <a href="#" class="social"><i class="fa-brands fa-linkedin"></i></a>
               </div>
               <p>O utilice el correo electrónico para registrarse</p>
               <input type="text" name="username" placeholder="Username" required="">
               <input type="email" name="email" placeholder="Email" required="">
               <input type="password" name="password" placeholder="Password" required="">
               <button type="submit" name="register">Registrarse</button>
           </form> 
       </div>
       <div class="sign-in">
           <form action="login.php" method="post">
               <h1>Iniciar sesión</h1>
               <div class="social-container">
                 <a href="#" class="social"> <i class="fa-brands fa-instagram"></i></a>
                 <a href="#" class="social"><i class="fa-brands fa-github"></i></a>
                 <a href="#" class="social"><i class="fa-brands fa-linkedin"></i></a>
               </div>
               <p>O inicie sesión en una cuenta ya registrada</p>
               <input type="email" name="email" placeholder="Email" required="">
               <input type="password" name="password" placeholder="Password" required="">
               <a href="#"> Olvidaste tu contraseña ?</a>
               <button type="submit" name = "login">Iniciar sesión</button>
           </form> 
       </div> 
       <div class="overlay-container">
           <div class="overlay">
               <div class="overlay-left">
               <h1>¡¡Bienvenido de nuevo!!</h1>
               <p> Para disfrutar de las funciones de nuestra aplicación con nosotros, inicie sesión con su información personal</p>
               <button id="signIn">Sign In</button>
               </div>
               <div class="overlay-right">
                   <h1>Hola amig@ !!</h1>
                   <p>Introduce tus datos y disfruta con nosotros</p>
                   <button id="signUp">Inscribirse</button>
                   </div>
           </div>
       </div>
   </div>
   <script>
      const signUpButton = document.getElementById('signUp');
      const signInButton = document.getElementById('signIn');
      const main = document.getElementById('main');

      signUpButton.addEventListener('click', () => {
         main.classList.add("right-panel-active");
      });

      signInButton.addEventListener('click', () => {
         main.classList.remove("right-panel-active");
      });
   </script>
</body>
</html>


<?php
session_start(); // Iniciar la sesión

$pass = ""; // Tu contraseña de base de datos
$username = "edgar"; // Tu nombre de usuario de base de datos
$DB = "wenssen"; // Tu nombre de base de datos

// Verifica si se envió el formulario de registro
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    // Conexión a la base de datos (reemplaza 'localhost', 'username', 'password' y 'database' con tus propios datos)
    $conn = new mysqli('localhost', $username, $pass, $DB);
    
    // Verifica si la conexión tuvo éxito
    if ($conn->connect_error) {
        die("La conexión falló: " . $conn->connect_error);
        echo "error";
    } else {
        // Recupera los datos del formulario de registro
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        // Hash del password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Prepara la consulta SQL para insertar un nuevo usuario en la base de datos
        $sql = $conn->prepare("INSERT INTO usuarios (usuario, correo, contraseña) VALUES (?, ?, ?)");
        $sql->bind_param("sss", $username, $email, $hashed_password);
        
        // Ejecuta la consulta
        if ($sql->execute() === TRUE) {
            echo "<script>alert('Usuario registrado exitosamente');</script>";
        } else {
            echo "<script>alert('Error al registrar el usuario: " . $conn->error . "');</script>";
        }
        
        // Cierra la conexión
        $conn->close();
    }
}

// Verifica si se envió el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    // Conexión a la base de datos (reemplaza 'localhost', 'username', 'password' y 'database' con tus propios datos)
    $conn = new mysqli('localhost', $username, $pass, $DB);
    
    // Verifica si la conexión tuvo éxito
    if ($conn->connect_error) {
        die("La conexión falló: " . $conn->connect_error);
    } else {
        // Recupera los datos del formulario de inicio de sesión
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        // Prepara la consulta SQL para buscar el usuario en la base de datos
        $sql = $conn->prepare("SELECT * FROM usuarios WHERE correo=?");
        $sql->bind_param("s", $email);
        $sql->execute();
        $result = $sql->get_result();
        
        // Verifica si se encontró un usuario con el correo electrónico proporcionado
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Verifica si la contraseña proporcionada coincide con la almacenada en la base de datos
            if (password_verify($password, $row['contraseña'])) {
                // Inicio de sesión exitoso
                // Almacena el ID del usuario en una variable de sesión
                $_SESSION['user_id'] = $row['ID_usuario'];
                // Redirige al usuario a otra página
                echo "<script>alert('Inicio de sesión exitoso');</script>";
                header("Location: inicio_web/inicio.php");
                exit(); // Asegura que el script se detenga después de la redirección
            } else {
                echo "<script>alert('Contraseña incorrecta');</script>";
            }
        } else {
            echo "<script>alert('No se encontró ningún usuario con ese correo electrónico');</script>";
        }
        
        // Cierra la conexión
        $conn->close();
    }
}
?>

