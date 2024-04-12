<?php
$pass = ""; // Tu contraseña de base de datos
$username = "edgar"; // Tu nombre de usuario de base de datos
$DB = "credenciales"; // Tu nombre de base de datos

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
                // Redirige al usuario a otra página
                echo "<script>alert('Inicio de sesión exitoso');</script>";
                header("Location: navbar.html");
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