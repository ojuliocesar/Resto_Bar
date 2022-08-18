<?php
    session_start();

    include('../../includes/conexao.php');

    if (!isset($_SESSION['token'])) {
        header("Location: ../index.php");
    }

    if (!isset($_GET['idreserva'])) {
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

        $id = $_GET['idreserva'];

        $sql =  "SELECT * FROM tb_reserva WHERE id = {$id}";

        $res = $conexao->query($sql);

        $dados = mysqli_fetch_array($res);

        ?>

        <main class="container container-painel">
        <h1>Edição do prato</h1>
        <br>
        <form class="form-horizontal" action="atualizar_reserva.php?idreserva=<?= $id ?>" method="post" role="form" data-toggle="validator" enctype = "multipart/form-data">
            <div class="form-group">
                <label class="control-label col-sm-3">Nome</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nome" id="nome" value="<?= $dados['nome'] ?>" placeholder="Nome">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Email</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" name="email" id="email" value="<?= $dados['email'] ?>" placeholder="Email">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Telefone</label>
                <div class="col-sm-9">
                    <input type="number" maxlength="11" minlength="11" class="form-control" name="telefone" id="telefone" value="<?= $dados['telefone'] ?>" placeholder="Telefone">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Data</label>
                <div class="col-sm-9">
                    <input type="datetime-local" class="form-control" name="data" id="data" value="<?= $dados['data_reserva'] ?>" placeholder="Data">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-group">
            <label class="control-label col-sm-3">Mensagem</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="exampleTextarea" rows="6" id="mensagem" name="mensagem" placeholder="Mensagem" required><?= $dados['mensagem'] ?></textarea>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Número Pessoas</label>
                <div class="col-sm-9">
                    <input type="number" minlength="1" class="form-control" name="number" id="number" value="<?= $dados['numero_pessoas'] ?>" placeholder="Número de Pessoas">
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