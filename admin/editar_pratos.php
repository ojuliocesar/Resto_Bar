<?php include '../includes/conexao.php' ?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Código fonte formulario php"/>
        <meta name="keywords" content="formulario php, bootstrap, bootstrap validator"/>
     

        <title>Editar Pratos</title>

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

    </head>
    <body>
        <?php  
            $id = $_GET['idprato'];

            $sql = "SELECT * FROM tb_pratos WHERE id = $id";

            $res = $conexao->query($sql);

            $dados = mysqli_fetch_array($res);
        ?>
   
        <main class="container">
            <h1>Formulário de Contato</h1>
            <p>Acrescente um email válido para receber o email teste!</p>
            <br>
            <form class="form-horizontal" action="atualizar.php" method="post" role="form" data-toggle="validator">
                <div class="form-group">
                    <label class="control-label col-sm-3">id*:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="iden" id="iden" value="<?php echo $dados['id'] ?>" placeholder="seu nome" required >
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Nome*:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $dados['name'] ?>" placeholder="seu nome" required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Email*:</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" name="email" id="email" placeholder="exemplo@dominio.com">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Telefone*:</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" name="telefone" id="telefone" placeholder="(00) 00000-0000" required value="<?php $dados['id'] ?>">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Assunto*:</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="assunto" required>
                            <option value="" selected="selected" disabled="disabled"></option>
                            <option value="contato">Contato</option>
                            <option value="vendas">Vendas</option>
                            <option value="financeiro">Financerio</option>
                            <option value="informacoes">Informações</option>
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Mensagem*:</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="exampleTextarea" rows="6" 
                                  id="mensagem" name="mensagem" placeholder="sua mensagem" required></textarea>
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
