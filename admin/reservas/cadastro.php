<?php

session_start();

if ($_SESSION['token'] != 'loggedAdmin') {
  header("Location: ../index.php");
}

?>

<html>
    <?php require_once('../../includes/admin/header.php') ?>
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

        <?php if (isset($_SESSION['flash'])): ?>

            <div class="flash-danger">
                <span><?= $_SESSION['flash']['message'] ?></span>
            </div>

        <?php unset($_SESSION['flash']); endif ?>

        <main class="container container-painel">

            <h1>Reservas</h1>
            <p>Acrescente as informações desejadas</p>
            <br>
            <form class="form-horizontal" action="reserva.php" method="post" role="form" data-toggle="" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label col-sm-3">Nome</label>
                    <div class="col-sm-9">
                        <input type="text" name="nome" class="form-control" placeholder="Nome completo" required/>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" name="email" id="email" required placeholder="Email" required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">telefone</label>
                    <div class="col-sm-9">
                        <input type="number" maxlength="11" minlength="11" class="form-control" name="telefone" id="telefone" placeholder="Telefone: 19998998989" required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Data</label>
                    <div class="col-sm-9">
                        <input type="datetime-local" name="data" class="form-control" placeholder="Data e hora" required/>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Mensagem</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="exampleTextarea" rows="6" 
                                  id="mensagem" name="mensagem" placeholder="Mensagem" required></textarea>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Número Pessoas</label>
                    <div class="col-sm-9">
                        <input type="number" minlength="1" class="form-control" name="number" id="number" placeholder="5" required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12 text-right">
                        <input class = "btn btn-primary" id="submit" name="submit" type="submit" value="ENVIAR">
                        <a name="formulario"></a>
                        <div class="mensagem-alerta"></div>
                    </div>
                </div>
            </form>
        </main>
        <footer>
            <hr>
            <div class="copyright">Desenvolvido com ❤ por
                <a href="" target="_blank">Bistrô</a>
            </div>  
        </footer>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
    </body>
</html>
