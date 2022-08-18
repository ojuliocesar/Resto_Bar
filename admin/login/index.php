<?php

session_start();

if (isset($_SESSION['token'])) {
    header("Location: ../");
}

if (isset($_SESSION['flash'])): ?>

    <div data-alert class="alert-box animation-flash <?= $_SESSION['flash']['color'] ?> radius">
        <span><?= $_SESSION['flash']['message'] ?></span>
    </div>

    <?php unset($_SESSION['flash']); endif

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="../../css/foundation.css" />
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <div id="container-admin">
        <form class="main-form" action="login.php" method="POST">
            <h2>Admin</h2>

            <div class="input-wrapper">
                <label class="form-label" for="email">E-mail</label>
                <input type="email" name="email" id="email" placeholder="Digite seu E-mail" required>
            </div>

            <div class="input-wrapper">
                <label class="form-label" for="senha">Senha</label>
                <input type="password" name="senha" id="senha" placeholder="Digite sua Senha" required>
            </div>

            <input type="submit" name="submit" class="main-button" value="Login">
        </form>
    </div>
</body>
</html>