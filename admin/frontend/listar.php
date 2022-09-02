<?php 

session_start();

include('../../includes/conexao.php');
require_once('../../includes/admin/header.php');

if ($_SESSION['token'] != 'loggedAdmin') {
  header("Location: ../index.php");
}

?>

<div class="container">
  <div class="row centered-form">
    <?php if (isset($_SESSION['flash'])): ?>

      <div class="flash-danger <?= isset($_SESSION['flash']['color']) ? $_SESSION['flash']['color'] : '' ?>">
        <span><?= $_SESSION['flash']['message'] ?></span>
      </div>

    <?php unset($_SESSION['flash']); endif ?>
    
    <div class="col-lg-12 ">
    <div class="panel panel-default">

      <div class="panel-heading">
        <h3 class="panel-title">CRUD Operation Using PHP MySQLI</h3> </div>
      <div class="panel-body">

      <?php

      $query = "SELECT * FROM tb_frontend";
      $comands = $conexao->query($query);

      // conta o numero de registros
      $dados = $comands->fetch_assoc();

      ?>

      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Id</th>
            <th>Sobre Nós</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?php echo $dados['id'] ?></td>
            <td><?php echo $dados['sobre'] ?></td>
            <td><button><a href="atualizar.php?idfrontend=<?= $dados['id'] ?>">Alterar</button></a></td>
          </tr> 
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</div>

<style type="text/css">

body {
  background-color: #fff;
}

.centered-form {
  margin-top: 60px;
}

.centered-form .panel {
  background: rgba(255, 255, 255, 0.8);
  box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
}

</style>