<?php

session_start();

require_once(__DIR__ . '/../../includes/conexao.php');

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM tb_admin WHERE email = '$email' AND BINARY senha = '$senha' AND ativo = 1 LIMIT 1";

    $comands = $conexao->query($sql);

    if (mysqli_affected_rows($conexao)) {
        $data = $comands->fetch_assoc();

        $_SESSION['userId'] = $data['id'];
        $_SESSION['userName'] = $data['nome'];
        $_SESSION['userAccess'] = $data['nivel_acesso'];
        $_SESSION['userEmail'] = $data['email'];
    } else {
        $_SESSION['flash']['message'] = 'E-mail ou Senha inválidos';
        $_SESSION['flash']['color'] = 'alert';

        header("Location: index.php");
        exit;
    }
}

if ($_SESSION['userAccess'] == 1) {

    $_SESSION['token'] = 'loggedAdmin';
}elseif ($_SESSION['userAccess'] == 2){

    $_SESSION['token'] = 'loggedUserAdmin';
}elseif ($_SESSION['userAccess'] == 3) {

    $_SESSION['token'] = 'loggedUser'; 
}

header("Location: ./");