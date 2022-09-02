<?php

session_start();

require_once('../../includes/conexao.php');

if (isset($_POST['submit'])) {

    if (
        !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ||
        !strlen(!filter_var($_POST['telefone'], FILTER_VALIDATE_INT)) === 11 ||
        !filter_var($_POST['number'], FILTER_VALIDATE_INT)
    ) {
        $_SESSION['flash']['message'] = "Preencha as informações corretamente!";
        $_SESSION['flash']['color'] = 'alert';
        
        header("Location: ../../index.php");
        exit();
    }

    $hasEmpty = false;

    foreach($_POST as $postItem) {
        if (empty(trim($postItem))) {
            $hasEmpty = true;
        }            
    }

    if (!$hasEmpty) {
        DEFINE('NOME', filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS));
        DEFINE('TELEFONE', filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT));
        DEFINE('EMAIL', filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
        DEFINE('DATA', $_POST['data']);
        DEFINE('MENSAGEM', filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_SPECIAL_CHARS));
        DEFINE('NUMERO', filter_input(INPUT_POST, 'number', FILTER_SANITIZE_NUMBER_INT));

        $sql = "INSERT INTO tb_reserva (nome, telefone, email, data_reserva, mensagem, numero_pessoas) VALUES ('" . NOME . "', '" . TELEFONE . "', '" . EMAIL . "', '" . DATA . "', '" . MENSAGEM . "', '" . NUMERO . "')";

        $comands = $conexao->query($sql);

        if (mysqli_affected_rows($conexao)) {
            $_SESSION['flash']['message'] = 'Reserva cadastrada com sucesso!';
            $_SESSION['flash']['color'] = 'success';

        } else {
            $_SESSION['flash']['message'] = 'O servidor está em manutenção!';
            $_SESSION['flash']['color'] = 'alert';
        }

        $conexao->close();

    } else {
        $_SESSION['flash']['message'] = "Preencha as informações!";
        $_SESSION['flash']['color'] = 'alert';
    }
}

header("Location: ../../");