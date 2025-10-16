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

    
        <div class="container-gerald">
 
                <div class="col-6">
                    <div style="margin-top: 100px;">
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
                <div class="col-6">

                    <div class="text-center">

                        <img src="images/gerald.png" alt="gerald" class="img-fluid" style="margin: 10px 10px 0 10px">

                    </div>

                </div>

        </div>


</body>

</html>