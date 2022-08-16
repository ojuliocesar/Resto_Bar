<?php
    include_once('includes/cabecalho.php');
    include_once('includes/conexao.php');

    $sql = "SELECT * FROM tb_pratos WHERE codigo = '" . $_GET['prato'] . "'";

    $comands = $conexao->query($sql);

    $data = $comands->fetch_assoc();
?>

		<div class="ghost-element"></div>
           
        <div class="product-page small-11 large-12 columns no-padding small-centered">
            <div class="global-page-container">
                <div class="product-section">
                    <div class="product-info small-12 large-5 columns no-padding">
                        <h3><?= $data['nome'] ?></h3>
                        <h4><?= $data['categoria'] ?></h4>
                        <p><?= $data['descricao'] ?></p>

                        <h5><b>Preço: </b>R$ <?= number_format($data['preco'], 2, ',', '.') ?></h5>
                        <h5><b>Calorias: </b><?= $data['calorias'] ?></h5> 
                    </div>

                    <div class="product-picture small-12 large-7 columns no-padding">
                        <img src="img/cardapio/<?= $data['codigo'] ?>.jpg" alt="camarao">
                    </div>

                </div>

                <div class="go-back small-12 columns no-padding">
                    <a href="cardapio.php"><< Voltar ao Cardápio</a>
                </div>
            </div>
        </div> 

<?php
    include_once('includes/rodape.php')
?>