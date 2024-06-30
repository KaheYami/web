<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Panel de Administrador</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Eloboost - Administrador</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="admin_usuarios.php">Gestionar Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_servicios.php">Gestionar Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_pedidos.php">Gestionar Pedidos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_reportes.php">Generar Reportes</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Bienvenido al Panel de Administrador</h1>
        <p>Desde aquí podrás gestionar usuarios, servicios, pedidos y generar reportes.</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
