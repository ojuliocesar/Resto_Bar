<?php

require_once('../includes/conexao.php');

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

$conexao->close();

header("Location: listar-pratos.php");