<?php

session_start();

include('../includes/conexao.php');

if (isset($_POST['submit']) && isset($_FILES['imagem'])) {

    $hasEmpty = false;

    foreach($_POST as $postItem) {
        if (trim($postItem) == '') {
            $hasEmpty = true;
        }
    }

    if (!$hasEmpty) {

        $imagem = $_FILES['imagem'];
        
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $codigo = filter_input(INPUT_POST, 'codigo', FILTER_SANITIZE_SPECIAL_CHARS);
        $preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_NUMBER_FLOAT);
        $categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_SPECIAL_CHARS);
        $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
        $calorias = filter_input(INPUT_POST, 'calorias', FILTER_SANITIZE_NUMBER_INT);
        $destaque = filter_input(INPUT_POST, 'destaque', FILTER_SANITIZE_NUMBER_INT);

        $conexao->query("SELECT * FROM tb_pratos WHERE codigo = '$codigo'");

        if (mysqli_affected_rows($conexao)) {
            $_SESSION['flash']['message'] = 'Cógido já existente! Altere o valor do Código';
            header("Location: cadastro-pratos.php");

            exit();
        }

        $dir = "../img/cardapio/";

        $imagem['name'] = $codigo.".jpg";

        if (!move_uploaded_file($imagem['tmp_name'], "$dir".$imagem['name'])) {
            echo 'Erro ao inserir imagem';
            exit();
        }

        $sql = "INSERT INTO
                tb_pratos (codigo, nome, categoria, descricao, preco, calorias, destaque)
                VALUES ('$codigo', '$nome', '$categoria', '$descricao', '$preco', '$calorias', '$destaque')";

        $conexao->query($sql);

        if (mysqli_affected_rows($conexao)) {
            $_SESSION['flash']['message'] = 'Prato cadastrado com sucesso!';
            $_SESSION['flash']['color'] = 'success';
        } else {
            $_SESSION['flash']['message'] = 'Servidor em manutenção. Por favor, aguarde!';
        }

        $conexao->close();

    } else {
        $_SESSION['flash']['message'] = 'Preencha os Campos!';

        header("Location: cadastro-pratos.php");
    }
}

header("Location: listar-pratos.php");