<?php

    session_start();

    require_once('includes/cabecalho.php');
    require_once('includes/conexao.php');

    $sql = "SELECT * FROM tb_pratos WHERE destaque = 1";

    $resultado = $conexao->query($sql);

    $data = $resultado->fetch_all(MYSQLI_ASSOC);

?>

    <div class="ghost-element"></div>

    <div class="welcome-gallery small-12 columns">

        <div class="photo-section small-12 columns">
            <img class="homepage-main-photo" src="img/main-photo.jpg" alt="slider imagem 1">
        </div>

        <div class="main-section-title small-10 columns">

            <?php if (isset($_SESSION['flash'])): ?>

            <div data-alert class="alert-box animation-flash <?= $_SESSION['flash']['color'] ?> radius">
                <span><?= $_SESSION['flash']['message'] ?></span>
            </div>

            <?php unset($_SESSION['flash']); endif ?>


            <div class="table">
                <div class="table-cell">
                    <h1>Bem vindo ao Restô Bar</h1>
                    <h2>A cozinha tradicional na Brasa</h2>
                </div>
            </div>

        </div>

        <div class="photo-gradient"></div>

    </div>

    <div class="about-us small-11 large-12 columns no-padding small-centered">

        <div class="global-page-container">
            <div id="about-us" class="about-us-title small-12 columns no-padding">
                <h3>Sobre Nós</h3>
                <hr></hr>
            </div>

            <?php
            
            $sql2 = "SELECT * FROM tb_frontend WHERE id = 1";

            $comands = $conexao->query($sql2);

            $frontend = $comands->fetch_assoc();
            
            ?>    

            <img src="img/frontend/<?= $frontend['imagem_sobre'] ?>" alt="fachada do restaurante">

            <div class="about-us-text">
                <p>
                    <?= $frontend['sobre'] ?>
                </p>
            </div>

        </div>

    </div>


    <div class="cardapio small-11 large-12 columns no-padding small-centered">
        <div class="global-page-container">
            <div class="cardapio-title small-12 columns no-padding">
                <h3>Cardapio</h3>
                <hr>
                </hr>
            </div>
        </div>
        <div class="global-page-container">
            <div class="slider-cardapio">
                <div class="slider-002 small-12 small-centered columns">
                    <?php foreach ($data as $dados): ?>

                    <div class="cardapio-item-outer bounce-hover small-10 medium-4 columns">
                        <div class="cardapio-item">
                            <a href="prato.php?prato=<?= $dados['codigo'] ?>">
                                <div class="cardapio-item-image">
                                    <img src="img/cardapio/<?= $dados['codigo'] ?>.jpg" alt="<?php $dados ['nome']?>" />
                                </div>

                                <div class="item-info">
                                    <div class="title"><?= $dados['nome']?></div>
                                </div>

                                <div class="gradient-filter"></div>
                            </a>
                        </div>
                    </div>

                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>

    <div id="contact-us" class="contact-us small-11 large-12 columns no-padding small-centered">

        <div class="global-page-container">
            <div class="contact-us-title small-12 columns no-padding">
                <h3>Faça a sua reserva</h3>
                <hr>
                </hr>
            </div>


            <div class="reservation-form small-12 columns no-padding">

                <form action="admin/reservas/reserva.php" method="POST">

                    <div class="form-part1 small-12 large-8 xlarge-7 columns no-padding">

                        <input type="text" name="nome" class="field" placeholder="Nome completo" required/>

                        <input type="email" name="email" class="field" placeholder="E-mail" required/>

                        <textarea type="text" name="mensagem" class="field" placeholder="Mensagem" required></textarea>

                    </div>

                    <div class="form-part2 small-12 large-3 xlarge-3 end columns no-padding">
                        <input type="number" minlength="11" maxlength="11" name="telefone" class="field" placeholder="Telefone: 19998899988" required/>

                        <input type="datetime-local" name="data" class="field" placeholder="Data e hora" required/>

                        <input type="number" min="1" name="number" class="field" placeholder="Número de pessoas" required/>

                        <input type="submit" name="submit" value="Reservar"/>

                    </div>
                </form>
            </div>

        </div>
    </div>
<?php

include('includes/rodape.php');

?>