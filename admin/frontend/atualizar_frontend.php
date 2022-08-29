<?php

session_start();

if (!isset($_SESSION['token'])) {
    header("Location: ../index.php");
}

require_once('../../includes/conexao.php');

if (isset($_POST['btnSend']) && isset($_GET['idfrontend'])) {

    $id = $_GET['idfrontend'];

    $hasEmpty = false;

    foreach($_POST as $postItem) {
        if (trim($postItem) == '') {
            $hasEmpty = true;
        }
    }

    if ($hasEmpty) {
        $_SESSION['flash']['message'] = 'Preencha os Campos!';

        header("Location: atualizar.php?idfrontend=".$id);
        exit();
    }

    if (!empty($_FILES['imagem']['tmp_name'])) {
        $imagem = $_FILES['imagem'];

        $dir = "../../img/frontend/";

        $imagem['name'] = md5(uniqid(rand(), true)).".jpg";

        $sql =  "UPDATE tb_frontend set imagem_sobre = '" . $imagem['name'] . "' WHERE id = $id";

        $conexao->query($sql);

        move_uploaded_file($imagem['tmp_name'], $dir . $imagem['name']);
    }

    $sobre = filter_input(INPUT_POST, 'sobre', FILTER_SANITIZE_SPECIAL_CHARS);

    $sql =  "UPDATE tb_frontend set sobre = '$sobre' WHERE id = $id";

    $conexao->query($sql);

    $_SESSION['flash']['message'] = 'Reserva atualizada com sucesso!';
    $_SESSION['flash']['color'] = 'success';

    $conexao->close();
}

header("Location: listar.php");