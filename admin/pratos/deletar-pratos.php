<?php

session_start();

require('../../includes/conexao.php');

if (isset($_GET['idprato'])) {

    $id = $_GET['idprato'];

    $sql = "DELETE FROM tb_pratos WHERE id = $id";

    $conexao->query($sql);

    if (mysqli_affected_rows($conexao)) {
        $_SESSION['flash']['message'] = 'Prato deletado com sucesso!';
        $_SESSION['flash']['color'] = 'success';
    } else {
        $_SESSION['flash']['message'] = 'Servidor em manutenção. Por favor, aguarde!';
    }

    $conexao->close();
}

header("Location: listar.php");
exit();