<?php

include('../includes/conexao.php');

if (isset($_POST['submit'])) {
    $imagem = $_FILES['imagem'];
    $nome = $_POST['nome'];
    $codigo = $_POST['codigo'];
    $preco = $_POST['preco'];
    $categoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];
    $calorias = $_POST['calorias'];
    $destaque = $_POST['destaque'];

    $dir = "../img/cardapio/";

    $imagem['name'] = $codigo.".jpg";

    if (move_uploaded_file($imagem['tmp_name'], "$dir".$imagem['name'])) {
        echo 'Arquivo enviado com sucesso!';
    } else {
        echo 'Erro ao inserir imagem';
    }

    $sql = "INSERT INTO
            tb_pratos (codigo, nome, categoria, descricao, preco, calorias, destaque)
            VALUES ('$codigo', '$nome', '$categoria', '$descricao', '$preco', '$calorias', '$destaque')";

    $conexao->query($sql);

    $conexao->close();

    header("Location: listar-pratos.php");
}