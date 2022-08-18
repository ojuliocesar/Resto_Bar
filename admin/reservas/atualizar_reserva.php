<?php

session_start();

require_once('../../includes/conexao.php');

if (isset($_POST['btnSend'])) {

    $id = $_GET['idreserva'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $mensagem = $_POST['mensagem'];
    $data = $_POST['data'];
    $number = $_POST['number'];

    $sql =  "UPDATE tb_reserva set nome = '$nome', email = '$email', telefone = '$telefone', mensagem = '$mensagem', data_reserva = '$data', numero_pessoas = '$number' WHERE id = $id";

    $conexao->query($sql);

    if (mysqli_affected_rows($conexao)) {
        $_SESSION['flash']['message'] = 'Reserva alterada com sucesso!';
        $_SESSION['flash']['color'] = 'success';
    } else {
        $_SESSION['flash']['message'] = 'Servidor em manutenção. Por favor, aguarde!';
    }

    $conexao->close();
}

header("Location: listar.php");