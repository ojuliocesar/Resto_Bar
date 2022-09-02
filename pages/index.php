<?php

session_start();

if (!isset($_SESSION['token'])) {
    header("Location: ../");
}

?>

<h1>Olá, <?= $_SESSION['userName'] ?></h1>
<h3>Email: <?= $_SESSION['userEmail'] ?></h3>

<a href="../admin/login/loggout.php">Sair da Conta</a>