<?php

session_start();

require_once('../includes/conexao.php');

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT email, senha FROM tb_admin WHERE email = '$email' AND BINARY senha = '$senha' AND ativo = 1";

    $conexao->query($sql);

    if (mysqli_affected_rows($conexao)) {
        $_SESSION['token'] = 'logged';
    } else {
        $_SESSION['flash']['message'] = 'E-mail ou Senha inválidos';
        $_SESSION['flash']['color'] = 'alert';
    }
}

header("Location: index.php");