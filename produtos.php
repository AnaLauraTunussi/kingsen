<?php
require_once '../kingsen/conexao/conecta.php';
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
</head>

<body>
    <nav class="navbar navbar-expand-lg ">
        <a class="navbar-brand" href="index.html">
            <img src="images/kingsen.pnj_page-0001.jpg"  height="120" alt="">
          </a>
        <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link"  href="index.php">Home</a>
                    <a class="nav-item nav-link" href="produtos.php">Produtos</a>
                    <a class="nav-item nav-link" href="contato.php">Contato</a>
                
                </div>
            </div>    
            <form class="form-inline my-2 my-lg-0" style="margin-left: 370px;">
                <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
            </form>
        </div>
    </nav>

    <div class="mainpage-container">
        <div class="container" style="margin-top: 10px;"> 
                <?php
            $sql = "SELECT p.id_produto, p.foto, p.nome, p.preco_venda FROM produto p where 1=1";

            $query = mysqli_query($conexao, $sql);
            if (mysqli_num_rows($query) > 0) {  

            ?>

                <div class="row justify-content-center text-center">
                    <div class="card-group">

                        <?php
                        foreach ($query as $produto) {
                        ?>
                            <div class="col-lg-3">
                                <div class="card m-2 mt-3" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;">
                                    <div class="div-img">
                                        <?php
                                        if ($produto['foto'] != '') {
                                            echo '<img src="images/' . $produto['foto'] . '" alt="" class="card-img-top"/>';
                                        } else {
                                            echo '<img src="assets/img/placeholder-produto.png" alt="" class="card-img-top"/>';
                                        }
                                        ?>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title" style="color: black;"><?php echo $produto['nome'] ?></h5>
                                        <p class="card-text" style="color: rgb(0, 0, 0);">R$ <?php echo $produto['preco_venda'] ?></p>
                                        <a href="comprar.php?id_produto=<?php echo $produto['id_produto'] ?>" class="btn btn-primary"
                                            style="color: rgb(255, 255, 255); background-color: rgb(124, 19, 19); border: none;">Comprar</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

            <?php
            } else {
                echo '<h5>Nenhum produto encontrado!</h5>';
            }
            ?>
        </div>
    </div>

        <hr style="border-bottom:2px solid #000000ff">

    <section style="color: white;" class="mt-5 mb-3">
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

</body>

</html>