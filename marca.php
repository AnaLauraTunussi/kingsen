<?php
require_once 'conexao/conecta.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link href="https://fonts.googleapis.com/css2?family=Pirata+One&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

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


    <div class="mainpage-container">
        <div class="container">

            <?php

            if (isset($_GET['id_marca']) && $_GET['id_marca'] != '') {

                $marca = $_GET['id_marca'];

                $sql_cont = "select p.id_produto, m.nome_marca from produto p join marca m on p.id_marca = m.id_marca where m.id_marca = $marca";

                $query_count = mysqli_query($conexao, $sql_cont);
                $quantidade = mysqli_num_rows($query_count);

                if (isset($_GET['pagina']) && !empty($_GET['pagina'])) {
                    $paginaAtual = $_GET['pagina'];
                } else {
                    $paginaAtual = 1;
                }

                $url = "?pagina=";

                $buscapag = "&id_marca=" . $marca;

                $paginaQtdd = 4;

                $valorInicial = ($paginaAtual * $paginaQtdd) - $paginaQtdd;

                $paginaFinal = ceil($quantidade / $paginaQtdd);

                $paginaInicial = 1;

                $paginaProxima = $paginaAtual + 1;

                $paginaAnterior = $paginaAtual - 1;

                $sql = "SELECT *, m.nome_marca, m.id_marca from produto p join marca m on p.id_marca = m.id_marca where p.status = 1 and p.id_marca = $marca limit $valorInicial, $paginaQtdd";

                $query = mysqli_query($conexao, $sql);
            }

            if ($quantidade > 0) {

            ?>

                <div class="row justify-content-center text-center" id="marca">
                    <?php
                    foreach ($query as $produto) {
                    ?>

                        <div class="col-lg-3">
                            <div class="card m-2 mt-3" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;">
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
                    <?php } ?>


                    <div class="col-12">
                        <nav aria-label="paginacao">
                            <ul class="pagination justify-content-center mt-4">

                                <?php if ($paginaAtual != $paginaInicial) { ?>
                                    <li class="page-item">
                                        <a class="page-link" href="<?php echo $url . $paginaInicial . $buscapag ?>">Início</a>
                                    </li>
                                <?php } ?>

                                <?php if ($paginaAtual >= 2) { ?>
                                    <li class="page-item">
                                        <a class="page-link" href="<?php echo $url . $paginaAnterior . $buscapag ?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                <?php } ?>

                                <?php if ($paginaAtual != $paginaFinal) { ?>
                                    <li class="page-item">
                                        <a class="page-link" href="<?php echo $url . $paginaProxima . $buscapag ?>" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>

                                    <li class="page-item">
                                        <a class="page-link" href="<?php echo $url . $paginaFinal . $buscapag ?>">Final</a>
                                    </li>
                                <?php } ?>

                            </ul>
                        </nav>
                    </div>
                </div>

            <?php
            } else {
                echo '<h5 style="color: white">Nenhum produto encontrado!</h5>';
            }
            ?>
        </div>
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
</body>

</html>