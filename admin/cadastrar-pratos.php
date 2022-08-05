<?php

include('../includes/conexao.php');

if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $codigo = $_POST['codigo'];
    $preco = $_POST['preco'];
    $categoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];
    $calorias = $_POST['calorias'];
    $destaque = $_POST['destaque'];

    $sql = "INSERT INTO
            tb_pratos (codigo, nome, categoria, descricao, preco, calorias, destaque)
            VALUES ('$codigo', '$nome', '$categoria', '$descricao', '$preco', '$calorias', '$destaque')";

    $conexao->query($sql);

    $conexao->close();

    header("Location: listar-pratos.php");
}