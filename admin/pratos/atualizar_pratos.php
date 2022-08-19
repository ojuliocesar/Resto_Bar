<?php

session_start();

require_once('../../includes/conexao.php');

if (!isset($_SESSION['token'])) {
    header("Location: ../index.php");
}

if (isset($_POST['btnSend']) && isset($_GET['idprato'])) {

    $id = $_GET['idprato'];

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

    $nome = filter_input(INPUT_POST, 'nprato', FILTER_SANITIZE_SPECIAL_CHARS);
    $codigo = filter_input(INPUT_POST, 'codigo', FILTER_SANITIZE_SPECIAL_CHARS);
    $preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_NUMBER_FLOAT);
    $categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_SPECIAL_CHARS);
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
    $calorias = filter_input(INPUT_POST, 'calorias', FILTER_SANITIZE_NUMBER_INT);
    $destaque = filter_input(INPUT_POST, 'destaque', FILTER_SANITIZE_NUMBER_INT);

    $comands = $conexao->query("SELECT * FROM tb_pratos WHERE codigo = '$codigo'");

    $data = $comands->fetch_assoc();

    if (mysqli_affected_rows($conexao) && $data['codigo'] != $codigo) {
        $_SESSION['flash']['message'] = 'Cógido já existente! Altere o valor do Código';
        header("Location: editar_pratos.php?idprato=".$id);

        exit();
    }

    if (!empty($_FILES['imagem']['tmp_name'])) {
        $imagem = $_FILES['imagem'];

        $dir = "../../img/cardapio/";

        $imagem['name'] = $codigo.".jpg";

        if (!move_uploaded_file($imagem['tmp_name'], "$dir".$imagem['name'])) {
            echo 'Erro ao inserir imagem';
            exit();
        }
    }

    $sql =  "UPDATE tb_pratos set nome = '$nome', codigo = '$codigo', categoria = '$categoria', descricao = '$descricao', preco = '$preco', calorias = '$calorias', destaque = '$destaque' WHERE id = $id";

    $conexao->query($sql);

    if (mysqli_affected_rows($conexao) || isset($imagem)) {
        $_SESSION['flash']['message'] = 'Prato atualizado com sucesso!';
        $_SESSION['flash']['color'] = 'success';
    } else {
        $_SESSION['flash']['message'] = 'Owo';
    }

    $conexao->close();
}

header("Location: listar.php");