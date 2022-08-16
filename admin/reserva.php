<?php

require_once('../includes/conexao.php');

if (isset($_POST['submit'])) {

    DEFINE('NOME', $_POST['nome']);
    DEFINE('TELEFONE', $_POST['telefone']);
    DEFINE('EMAIL', $_POST['email']);
    DEFINE('DATA', $_POST['data']);
    DEFINE('MENSAGEM', $_POST['mensagem']);
    DEFINE('NUMBER', $_POST['number']);

    $sql = "INSERT INTO tb_reserva (nome, telefone, email, data_reserva, mensagem, numero_pessoas) VALUES ('" . NOME . "', '" . TELEFONE . "', '" . EMAIL . "', '" . DATA . "', '" . MENSAGEM . "', '" . NUMBER . "')";

    $comands = $conexao->query($sql);

    if (mysqli_affected_rows($conexao)) {
        $conexao->close();

        header("Location: ../index.php");
    } else {
        echo 'Algo deu errado!';
    }
}

