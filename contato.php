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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Pirata+One&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

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


    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-7" id="contato">
                <h2 class="text-center px-lg-5" style="color:white">
                    Deixe seu recado, envie suas duvidas e sugestões!
                </h2>
                <form action="">
                    <div class="form-row">
                        <div class="col-12">
                            <input type="text" class="form-control" placeholder="Nome Completo">
                        </div>


                        <div class="col-md-6" style="margin-top: 20px;">
                            <input type="email" class="form-control" placeholder="E-Mail">
                        </div>


                        <div class="col-md-6" style="margin-top: 20px;">
                            <input type="tel" id="telefone" class="form-control" placeholder="Telefone">
                        </div>


                        <div class="col-12" style="margin-top: 20px;">
                            <input type="text" class="form-control" placeholder="Assunto">
                        </div>

                        <div class="col-12" style="margin-top: 20px;">
                            <textarea class="form-control" placeholder="Mensagem"></textarea>
                            <input style="margin-top: 30px; background-color:rgb(124, 19, 19);color: aliceblue;height: 50px; width: 100px; font-size: 20px;" type="submit" value="Enviar" class="btn btn-outline">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12" id="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d547.0031378664305!2d-47.64574015252453!3d-22.728673144296696!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c631a09ac7b2e1%3A0x197834b105f878e3!2sSenac%20Piracicaba!5e0!3m2!1spt-BR!2sbr!4v1753728063271!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>

    <div class="container" id="formas-contato" style="background-color: rgb(241, 240, 240); border-radius: 20px; margin-bottom: 30px;">
        <div class="row">
            <!-- telefone -->
            <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="card-info text-center">
                    <img src="images/tell.png" alt="Telefone" class="img-fluid mb-3" >
                    <h4>Telefone</h4>
                    <p class="lead">4002-8922</p>
                </div>
            </div>
            <!-- telefone fim -->
            <!-- email -->
            <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="card-info text-center">
                    <img src="images/mail.png" alt="Telefone" class="img-fluid mb-3">
                    <h4>Email</h4>
                    <p class="lead">ana@laura.com.br</p>
                </div>
            </div>
            <!-- email-fim -->
            <!-- endereço -->
            <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="card-info text-center">
                    <img src="images/location.png" alt="Telefone" class="img-fluid mb-3">
                    <h4>Endereço</h4>
                    <p class="lead">R. Santa Cruz, 1148</p>
                </div>
            </div>
            <!-- endereço fim -->
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