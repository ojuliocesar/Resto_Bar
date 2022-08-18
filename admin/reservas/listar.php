<?php 

session_start();

include('../../includes/conexao.php');
require_once('../../includes/admin/header.php');

if (!isset($_SESSION['token'])) {
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

      $query = "SELECT * from tb_reserva";
      $res = mysqli_query($conexao,$query);

      // conta o numero de registros
      $total = mysqli_num_rows($res);

      ?>

      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Mensagem</th>
            <th>Data</th>
            <th>Pessoas</th>
          </tr>
        </thead>
        <tbody>
          <?php while($dados=mysqli_fetch_array($res)): $id = $dados['id'] ?>
          <tr>
            <td><?php echo $dados['id'] ?></td>
            <td><?php echo $dados['nome'] ?></td>
            <td><?php echo $dados['email'] ?></td>
            <td><?php echo $dados['telefone'] ?></td>
            <td><?php echo $dados['mensagem'] ?></td>
            <td><?php echo $dados['data_reserva'] ?></td>
            <td><?php echo $dados['numero_pessoas'] ?></td>
            <td><button><a href="atualizar.php?idreserva=<?= $id ?>">Alterar</button></a></td>
            <td><button><a href="deletar.php?idreserva=<?= $id ?>">Excluir</button></a></td>
          </tr> 
          <?php endwhile ?> 
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