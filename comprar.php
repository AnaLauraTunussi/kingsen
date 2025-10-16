<?php
# CONECTA COM O BANCO #
require_once 'conexao/conecta.php';
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

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">


  <link rel="stylesheet" href="../kingsen/css/style_front.css">

  <title>Kingsen</title>

  <link rel="icon" type="image/x-icon" href="assets/img/favicon.icon.png">

</head>

<body>

  <?php
  #Início MENU
  include('navegacao.php');
  #Final MENU
  ?>


  <div class="mainpage-container" style="margin-top:12rem" id="product">


    <?php
    if (isset($_GET['id_produto']) && $_GET['id_produto'] != '') {
      $codigo = $_GET['id_produto'];

      $sql = " SELECT p.id_produto, p.descricao, p.nome, p.preco_venda, p.foto, p.preco_promocao, p.estoque, p.status, p.preco_custo, p.lucro, p.status_promocao, p.porcentagem, p.id_marca, p.id_categoria, m.nome_marca FROM produto p join marca m on p.id_marca = m.id_marca WHERE id_produto = $codigo";
      $query = mysqli_query($conexao, $sql);
      $produto = mysqli_fetch_assoc($query);
      $marca = $produto['id_marca'];
      $nome_marca = $produto['nome_marca'];
      $id = $produto['id_produto'];

    ?>
      <div class="row">

        <?php
        foreach ($query as $produto) {
        ?>

          <div class="col-5">

            <div class="div-produto" style="margin-top: 1.9rem;">
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
            <?php if ($produto['status_promocao'] == 1) {
              echo '<s>De: R$ ' . number_format($produto['preco_venda'], 2, ',', '.') . '</s>';
              echo '<h2>Por: R$ ' . number_format($produto['preco_promocao'], 2, ',', '.') . '</h2>';
            } else {
              echo '<h2> R$ ' . number_format($produto['preco_venda'], 2, ',', '.') . '</h2>';
            } ?>

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

  <h1 class="textoRelacionados">Produtos relacionados da Marca: <?php echo $nome_marca ?></h1>
  <div class="owl-carousel owl-theme">


    <?php
    $sql = " SELECT * FROM produto where id_marca = $marca";
    $query = mysqli_query($conexao, $sql);
    $produto = mysqli_fetch_assoc($query);
    foreach ($query as $produto) {
    ?>
      <div class="item">
        <div class="container">
          <div class="row justify-content-center text-center">

            <div class="card m-2 mt-3">
              <div class="div-img">
                <?php
                if ($produto['status_promocao'] == 1) {
                  echo '<span class="badge badge-success ml-6">Promoção</span>';
                }
                if ($produto['foto'] != '') {
                  echo '<img src="images/' . $produto['foto'] . '" alt= "' . $produto['nome'] . '" class="card-img"/>';
                } else {
                  echo '<img src="assets/img/placeholder-produto.png" alt="' . $produto['nome'] . '" class="card-img"/>';
                }


                ?>
              </div>
              <div class="card-body">
                <h5 class="card-title mt-5" style="color: black;"><?php echo $produto['nome'] ?></h5>
                <?php if ($produto['status_promocao'] == 1) {
                  echo '<s style="display: inline-block;" class="mr-2"> R$ ' . number_format($produto['preco_venda'], 2, ',', '.') . '</s>';
                  echo '<p style="display: inline-block;"> R$ ' . number_format($produto['preco_promocao'], 2, ',', '.') . '</p>';
                } else {
                  echo '<p> R$ ' .  number_format($produto['preco_venda'], 2, ',', '.') . '</p>';
                } ?>
                <a href="comprar.php?id_produto=<?php echo $produto['id_produto'] ?>" class="btn btn-primary"
                  style="color: rgb(255, 255, 255); background-color: rgb(124, 19, 19); border: none;">Comprar</a>
              </div>

            </div>
          </div>
        </div>
      </div>

    <?php
    }
    ?>

  </div>

   <div class="linha" style="background-color: black;height: 0.2rem"></div>


  <?php
  #Início MENU
  include('finalPag.php');
  #Final MENU
  ?>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js" integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    $('.owl-carousel').owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      autoplay: true,
      autoplayTimeout: 3000,
      autoplayHoverPause: true,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 3
        },
        1000: {
          items: 5
        }
      }
    })
  </script>
</body>

</html>