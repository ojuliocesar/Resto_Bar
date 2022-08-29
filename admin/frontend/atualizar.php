<?php
    session_start();

    include('../../includes/conexao.php');

    if (!isset($_SESSION['token'])) {
        header("Location: ../index.php");
    }

    if (!isset($_GET['idfrontend'])) {
        header("Location: listar.php");
    }

?>

<html>
    <?php require_once('../../includes/admin/header.php') ?>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" />

    <style>
        main, footer, .mensagem-alerta{
            text-align: center; 
        }
        form{
            max-width: 800px;
            padding-top: 30px;
            display: block;
            margin: 0 auto;
        }
        .mensagem-alerta{
            max-width: 500px;
            margin: 20px auto;
        }
    </style>


    <?php

        $id = $_GET['idfrontend'];

        $sql =  "SELECT * FROM tb_frontend WHERE id = {$id}";

        $res = $conexao->query($sql);

        $dados = $res->fetch_assoc();

        ?>

        <main class="container container-painel">
        <h1>Edição do prato</h1>
        <br>
        <form class="form-horizontal" action="atualizar_frontend.php?idfrontend=<?= $id ?>" method="post" role="form" data-toggle="validator" enctype = "multipart/form-data">
            <div class="form-group">
                <label class="control-label col-sm-3">Sobre Nós</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="sobre" id="sobre" value="<?= $dados['sobre'] ?>" placeholder="Nome">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Imagem</label>
                <div class="col-sm-9">
                    <input type="file" accept="image/png, image/gif, image/jpeg, image/jpg, image/webp" class="form-control" name="imagem" id="imagem">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12 text-right">
                    <input class = "btn btn-primary" id="submit" name="btnSend" type="submit" value="ENVIAR">
                    <a name="formulario"></a>
                    <div class="mensagem-alerta"></div>
                </div>
            </div>
        </form>
    </main>
    <footer>
        <hr>
        <div class="copyright">Desenvolvido com ❤ por
            <a href="" target="_blank"></a>
        </div>  
    </footer>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>

    </body>
</html>