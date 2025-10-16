<?php

require_once '../conexao/conecta.php';

if (!isset($_SESSION)) {
  session_start();
}

if (!$_SESSION['USER']) {
  $_SESSION['nAutorizada'] = 'Apenas usuários cadastrados podem acessar essa área!';
  header('Location: index.php');
}

?>
<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Kingsen - Painel</title>

  <!-- BOOTSTRAP CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <!-- BOOTSTRAP ICONS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- CUSTOMIZAÇÃO DO TEMPLATE -->
  <link href="../css/dashboard.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

  <!-- FAVICON -->
  <link rel="icon" type="image/x-icon" href="../assets/img/favicon.icon.png">

  <link rel="stylesheet" href="../css/style.css">
</head>

<body>

  <?php
  #Início TOPO
  include('topo.php');
  #Final TOPO
  ?>

  <div class="container-fluid">
    <div class="row">
      <?php
      #Início MENU
      include('navegacao.php');
      #Final MENU
      ?>

      <main class="ml-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2 text-white">Painel Administrativo</h1>
          <h2 class="h3 text-white">Olá, <?php echo $_SESSION['NAME'] ?></h2>
        </div>

        <section class="dashboard">
          <div class="row" id="dois">
            <div class="col-5">
              <?php
              $sql = "SELECT COUNT(id_produto) AS total FROM produto where status = 1";
              $query = mysqli_query($conexao, $sql);
              $produto = mysqli_fetch_assoc($query); ?>
              <h1><?php echo $produto['total']; ?></h1>
              <h3>Produtos Cadastrados</he>
            </div>

            <div class="col-1"></div>

            <div class="col-5">
              <?php
              $sql = "SELECT nome, data_nasc FROM cliente WHERE MONTH(data_nasc) = MONTH(CURDATE());";
              $query = mysqli_query($conexao, $sql);
              $cliente = mysqli_fetch_assoc($query);
              if (mysqli_num_rows($query) > 0) {
              ?>
                <h1 style="color: white;"><?php echo $cliente['nome']; ?></h1>
              <?php } else {
                echo '<h1> Sem aniversariantes esse mês </h1>';
              } ?>
              <h3>Aniversariantes do mês</h3>
            </div>
          </div>

          <div class="row mt-5" id="dois">
            <div class="col-5">
              <?php
              $sql = "SELECT COUNT(id_venda) AS total FROM venda";
              $query = mysqli_query($conexao, $sql);
              $venda = mysqli_fetch_assoc($query); ?>
              <h1><?php echo $venda['total']; ?></h1>
              <h3>Quantidade de Vendas</h3>
            </div>

            <div class="col-1"></div>

            <div class="col-5">
              <?php
              $sql = "SELECT f.nome, SUM(v.valor_total) AS total_vendas FROM venda v JOIN funcionario f ON v.id_funcionario = f.id_funcionario GROUP BY f.id_funcionario ORDER BY total_vendas DESC LIMIT 1;";
              $query = mysqli_query($conexao, $sql);
              $venda = mysqli_fetch_assoc($query);
              if (mysqli_num_rows($query) > 0) {
              ?>
                <h1 style="color: white;"><?php echo $venda['nome'] ?>: R$<?php echo $venda['total_vendas']; ?> </h1>
              <?php } else {
                echo '<h1> Sem vendas </h1>';
              } ?>
              <h3>Funcionario que mais vendeu</h3>
            </div>
          </div>

          <div class="row mt-5">
            <div class="col-4 mb-3">
              <?php
              $sql = "SELECT p.nome, p.foto, SUM(iv.qtde) AS total_vendido FROM item_venda iv JOIN produto p ON iv.id_produto = p.id_produto GROUP BY iv.id_produto ORDER BY total_vendido DESC LIMIT 1;";
              $query = mysqli_query($conexao, $sql);
              $produto = mysqli_fetch_assoc($query); ?>
              <h1 style="font-family: Pirata One, system-ui;">Produto mais vendido</h1>
              <h1><?php echo $produto['nome']; ?></h1>

              <div class="div-img">
                <?php
                if ($produto['foto'] != '') {
                  echo '<img src="../images/' . $produto['foto'] . '" alt= "' . $produto['nome'] . '" class="card-img"/>';
                } else {
                  echo '<img src="assets/img/placeholder-produto.png" alt="' . $produto['nome'] . '" class="card-img"/>';
                }
              ?>
              </div>
            </div>
          </div>
        </section>

        <div>
          <?php
          if (isset($_SESSION['naoAdm'])) {

            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';

            echo $_SESSION['naoAdm'];

            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';

            unset($_SESSION['naoAdm']);
          }
          ?>

        </div>

      </main>
    </div>
  </div>

  <!-- BOOTSTRAP JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>