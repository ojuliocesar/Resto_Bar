<?php

session_start();

if (!isset($_SESSION['token'])) {
    header("Location: ../index.php");
}

require('../../includes/conexao.php');

if (isset($_GET['idprato'])) {

    $id = $_GET['idprato'];

    $read = "SELECT * FROM tb_pratos WHERE id = $id";
    
    $comands = mysqli_query($conexao, $read);

    $data = $comands->fetch_assoc();

    $destiny = '../../img/cardapio/' . $data['codigo'] . '.jpg';

    if (file_exists($destiny)) {
        unlink($destiny);
    }

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