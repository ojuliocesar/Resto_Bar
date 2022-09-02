<?php

session_start();

if (!isset($_SESSION['token'])) {
    header("Location: ./login/");
} elseif ($_SESSION['token'] != 'loggedAdmin') {
    header("Location: ../");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
    <div id="container-dashboard">
        <h1>Dashboard</h1>

        <a href="pratos/listar.php">Pratos</a>
        <a href="reservas/listar.php">Reservas</a>
        <a href="frontend/listar.php">Frontend</a>
    </div>
</body>
</html>