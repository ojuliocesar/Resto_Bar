<?php

require('../includes/conexao.php');

$id = $_GET['idprato'];

$sql = "DELETE FROM tb_pratos WHERE id = $id";

$conexao->query($sql);

$conexao->close();

header("Location: listar-pratos.php");
exit();