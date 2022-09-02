<?php

session_start();

if ($_SESSION['token'] != 'loggedAdmin') {
  header("Location: ../index.php");
}

require_once('../../includes/conexao.php');

if ($_SESSION['token'] != 'loggedAdmin') {
  header("Location: ../index.php");
}

if (isset($_POST['btnSend']) && isset($_GET['idreserva'])) {

    $id = $_GET['idreserva'];

    $hasEmpty = false;

    foreach($_POST as $postItem) {
        if (trim($postItem) == '') {
            $hasEmpty = true;
        }
    }

    if ($hasEmpty) {
        $_SESSION['flash']['message'] = 'Preencha os Campos!';

        header("Location: editar_pratos.php?idprato=".$id);
        exit();
    }

    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);
    $data = $_POST['data'];
    $mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_SPECIAL_CHARS);
    $number = filter_input(INPUT_POST, 'number', FILTER_SANITIZE_NUMBER_INT);

    $sql =  "UPDATE tb_reserva set nome = '$nome', email = '$email', telefone = '$telefone', data_reserva = '$data', mensagem = '$mensagem', numero_pessoas = '$number'";

    $conexao->query($sql);

    if (mysqli_affected_rows($conexao)) {
        $_SESSION['flash']['message'] = 'Reserva atualizada com sucesso!';
        $_SESSION['flash']['color'] = 'success';
    } else {
        $_SESSION['flash']['message'] = 'Owo';
    }

    $conexao->close();
}

header("Location: listar.php");