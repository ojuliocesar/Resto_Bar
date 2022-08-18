<?php

session_start();

require_once('../../includes/conexao.php');

if (isset($_POST['btnSend'])) {

    $id = $_GET['idprato'];
    $nome = $_POST['nprato'];
    $codigo = $_POST['codigo'];
    $preco = $_POST['preco'];
    $categoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];
    $calorias = $_POST['calorias'];
    $destaque = $_POST['destaque'];

    $sql =  "UPDATE tb_pratos set nome = '$nome', codigo = '$codigo', categoria = '$categoria', descricao = '$descricao', preco = '$preco', calorias = '$calorias', destaque = '$destaque' WHERE id = $id";

    $conexao->query($sql);

    if (mysqli_affected_rows($conexao)) {
        $_SESSION['flash']['message'] = 'Prato alterado com sucesso!';
        $_SESSION['flash']['color'] = 'success';
    } else {
        $_SESSION['flash']['message'] = 'Servidor em manutenção. Por favor, aguarde!';
    }

    $conexao->close();
}

header("Location: listar.php");