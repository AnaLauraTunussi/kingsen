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

    <section class="mainpage-container" style="background-color: black;">
        <div class="container-gerald">
            <div class="row">
                <div class="col-lg-6" id="txt-index">
                    <div class="mb-5 text-center text-lg-left" style="margin-top: 100px;">
                        <h1 class="display-1 mb-3" style="color: #ce1616;">Bem-vindo a Kingsen</h1>

                        <p class="lead text-muted mb-5" id="sobre" style="color: #ce1616;">Nós somos uma loja de armas decorativas geek fundada em Piracicaba por Ana Laura, também conhecida como Aphelin.
                            <br>
                            <br>
                            Nascida da paixão pelos mundos da fantasia e da cultura pop, a Kingsen transforma sonhos em peças únicas, criadas para colecionadores, fãs e aventureiros modernos.
                            <br>
                            <br>
                            Kingsen – Para quem carrega a alma de um herói.

                        </p>

                    </div>
                </div>
                <div class="col-lg-6">

                    <div class="text-center">

                        <img src="images/gerald.png" alt="gerald" class="img-fluid" style="margin: 10px 10px 0 10px">

                    </div>

                </div>
            </div>
        </div>

    </section>


    <div class="titulo mt-5">
        <h1>Conheça os nossos produtos</h1>
    </div>

    <div class="container mb-5">

        <div class="row justify-content-center text-center" id="conheca">


            <div class="col-lg-4">

                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="images/adaga_anao.jpg" alt="Imagem de capa do card">
                    <div class="card-body">
                        <h5 class="card-title" style="color: black;">Adaga dos Anões</h5>
                        <a href="produtos.php" class="btn btn-primary"
                            style="color: rgb(255, 255, 255); background-color: rgb(124, 19, 19); border: none;">Produtos</a>
                    </div>
                </div>

            </div>

            <div class="col-lg-4">

                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="images/colossal.jpg" alt="Imagem de capa do card">
                    <div class="card-body">
                        <h5 class="card-title" style="color: black;">Espada Colossal</h5>
                        <a href="produtos.php" class="btn btn-primary"
                            style="color: rgb(255, 255, 255); background-color: rgb(124, 19, 19); border: none;">Produtos</a>
                    </div>
                </div>

            </div>

            <div class="col-lg-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="images/ferroada.pnj.webp" alt="Imagem de capa do card"
                        style="height: 290px;">
                    <div class="card-body">
                        <h5 class="card-title" style="color: black;">Ferroada</h5>
                        <a href="produtos.php" class="btn btn-primary"
                            style="color: rgb(255, 255, 255); background-color: rgb(124, 19, 19); border: none;">Produtos</a>
                    </div>
                </div>

            </div>

        </div>

    </div>



    <!-- start parallax -->

    <section class="parallax text-white">

        <div class="container">

            <div class="row">

                <div class="col-12">

                    <h2>Pare de esperar. <br> Comece sua aventura agora.</h2>

                </div>

            </div>

        </div>

    </section>
    <!-- end parallax -->

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