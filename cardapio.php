<?php
include_once('includes/cabecalho.php');
include_once('includes/conexao.php');
?>
<div class="ghost-element">
</div>

<div class="cardapio-list small-11 large-12 columns no-padding small-centered">

    <div class="global-page-container">
        <div class="cardapio-title small-12 columns no-padding">
            <h3>Cardapio</h3>
            <hr></hr>
        </div>

        <?php

        $sql = "SELECT DISTINCT categoria FROM tb_pratos";

        $result = $conexao->query($sql);
        
        if ($result->num_rows > 0):
            while ($row = $result->fetch_assoc()):
                $categoria = $row['categoria']; ?>

        <div class="category-slider small-12 columns no-padding">
            <h4><?= ucfirst(str_replace('-', ' ', $row['categoria'])) ?></h4>

            <!-- Pai -->
            <div class="slider-cardapio">
                <div class="slider-002 small-12 small-centered columns">
                    <!-- Filho -->
                    <?php 
                    
                    $sql2 = "SELECT * FROM tb_pratos WHERE categoria = '$categoria'";

                    $result2 = $conexao->query($sql2);

                    if ($result2->num_rows > 0) {
                        while($row2 = $result2->fetch_assoc()) { ?>

                    <div class="cardapio-item-outer bounce-hover small-10 medium-4 columns">
                        <div class="cardapio-item">
                            <a href="prato.php?prato=<?= $row2['codigo'] ?>">
                                <div class="item-image">
                                    <img src="img/cardapio/<?= $row2['codigo'] ?>.jpg" alt="<?= $row2['nome'] ?>" />
                                </div>

                                <div class="item-info">
                                    <div class="title"><?= $row2['nome'] ?></div>
                                </div>

                                <div class="gradient-filter"></div>
                            </a>
                        </div>
                    </div>

                    <?php } } ?> 
                </div>
            </div>
        </div>

        <?php endwhile; endif?>
    </div>
</div>

<?php

include_once('includes/rodape.php')

?>