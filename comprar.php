<?php
# CONECTA COM O BANCO #
require_once '../kingsen/conexao/conecta.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <!-- Meta tags Obrigatórias -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <link href="https://fonts.googleapis.com/css2?family=Pirata+One&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">


  <link rel="stylesheet" href="../kingsen/css/style_front.css">

  <title>Kingsen</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg ">
    <a class="navbar-brand" href="index.php">
      <img src="images/kingsen.pnj_page-0001.jpg" height="120" alt="">
    </a>
    <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="index.php">Home</a>
          <a class="nav-item nav-link" href="produtos.php">Produtos</a>
          <a class="nav-item nav-link" href="contato.php">Contato</a>

        </div>
      </div>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
      </form>
    </div>
  </nav>

  <div class="mainpage-container" id="product">
    <?php
    if (isset($_GET['id_produto']) && $_GET['id_produto'] != '') {
      $codigo = $_GET['id_produto'];

      $sql = " SELECT * FROM produto WHERE id_produto = $codigo";
      $query = mysqli_query($conexao, $sql);
      $produto = mysqli_fetch_assoc($query);

      $preco = ($produto['status_promocao'] == 1) ? $produto['preco_promocao'] : $produto['preco_venda'];

    ?>
      <div class="row">

        <?php
        foreach ($query as $produto) {
        ?>

          <div class="col-5">

            <div class="div-produto" style="margin-top: 10px;">
              <?php
              if ($produto['foto'] != '') {
                echo '<img src="images/' . $produto['foto'] . '" alt="" class="card-img" style= "height:50vh; box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px, rgb(51, 51, 51) 0px 0px 0px 3px;"/>';
              }
              ?>
            </div>
          </div>
          <div class="col-5" id="payment">
            <h1 style="margin-top: 20px;" id="name"><strong><?php echo $produto['nome'] ?></strong></h1>
            <p style="margin-left: 20px;"><?php echo $produto['descricao'] ?></p><br>
            <h3>por R$<?php echo $produto['preco_venda'] ?></h3><br>

            <h5>Formas de pagamento</h5>

            <table class="table" style="margin-left: 30px;">
              <thead>
                <tr class="table-success">
                  <th scope="col">Cartão</th>
                  <th scope="col">Pix</th>
                  <th scope="col">Boleto</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1X SEM JUROS R$<?php echo $produto['preco_venda'] ?></td>
                  <td>15%</td>
                  <td>15%</td>
                </tr>
                <tr>
                  <td>2X SEM JUROS R$<?php echo $produto['preco_venda'] / 2.0 ?></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>3X SEM JUROS R$<?php echo $produto['preco_venda'] / 3.0 ?></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>

            <button type="button" style="margin-top: 30px; margin-bottom: 30px;" class="btn btn-danger">Comprar</button>
          </div>
        <?php } ?>
      </div>
    <?php
    } else {
      echo '<h5>Nenhum produto encontrado!</h5>';
    }
    ?>
  </div>

  <hr class="line" style="border-bottom:2px solid #000000ff">

  <section style="color: white;" class="mt-5">
    <div class="container">
      <div class="row">
        <div class="col-3">
          <h2>Horário de atendimento</h2>
          <br>
          <p>Segunda a Sexta: 8h00 às 18h00</p>
        </div>

        <div class="col-3" style="margin-left: 130px;">
          <h2>Redes Sociais</h2>
          <br>
          <a href="https://www.instagram.com/">
            <img src="images/Instagram_logo.png" alt="instagram" style="height: 30px; margin-right:20px; margin-left: 45px;">
          </a>
          <a href="https://x.com/?lang=pt">
            <img src="images/x-logo.png" alt="instagram" style="height: 30px;margin-right:20px">
          </a>
          <a href="https://www.facebook.com/?locale=pt_BR">
            <img src="images/facebook_logo.png" alt="instagram" style="height: 30px;margin-right:20px">
          </a>

        </div>

        <div class="col-3" style="margin-left: 120px;">
          <h2>Links Rápidos</h2>

          <a style="color: white; font-size: 20px; font-family: Rubik, sans-serif;" class="nav-link" href="index.php">Home</a>

          <a style="color: white; font-size: 20px; font-family: Rubik, sans-serif" class="nav-link" href="produtos.php">Produtos</a>

          <a style="color: white;font-size: 20px;font-family: Rubik, sans-serif" class="nav-link" href="contato.php">Contato</a>

          <div class="col-3"></div>
        </div>
      </div>
  </section>

  <footer class="rodape py-3 text-white">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          &copy; Copyright 2025 - Kigsen - Todos os diretos reservados.<br>
          Desenvolvimento por
          <a href="#" target="_blank" class="botão" style="color: rgb(155, 10, 10);">Aphehlin</a>
        </div>
      </div>
    </div>
  </footer>



  <!-- JavaScript (Opcional) -->
  <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
</body>

</html>