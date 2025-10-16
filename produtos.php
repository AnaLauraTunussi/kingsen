<?php
require_once 'conexao/conecta.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Kingsen</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Pirata+One&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="../kingsen/css/style_front.css">

    <link rel="icon" type="image/x-icon" href="assets/img/favicon.icon.png">

</head>

<body>

    <?php include('navegacao.php'); ?>

    <div class="main-content">
        <!-- FILTRO -->
        <aside class="filtro">
            <h3>Filtrar por</h3>

            <!-- FILTRO POR CATEGORIA -->
            <h4>Categorias</h4>
            <ul>
                <?php
                $sql_categoria = "SELECT id_categoria, nome_categoria FROM categoria WHERE status = 1;";
                $query_categoria = mysqli_query($conexao, $sql_categoria);
                foreach ($query_categoria as $categoria) {
                    echo '<li><a href="categoria.php?id_categoria=' . $categoria['id_categoria'] . '">' . $categoria['nome_categoria'] . '</a></li>';
                }
                ?>
            </ul>

            <!-- FILTRO POR MARCA -->
            <h4>Marcas</h4>
            <ul>
                <?php
                $sql_marca = "SELECT id_marca, nome_marca FROM marca WHERE status = 1;";
                $query_marca = mysqli_query($conexao, $sql_marca);
                foreach ($query_marca as $marca) {
                    echo '<li><a href="marca.php?id_marca=' . $marca['id_marca'] . '">' . $marca['nome_marca'] . '</a></li>';
                }
                ?>
            </ul>
        </aside>

        <!-- CONTEÚDO DE PRODUTOS -->
        <main class="produtos">
            <div class="container mt-3">
                <?php
                $sql_cont = "SELECT id_produto FROM produto";
                $query_count = mysqli_query($conexao, $sql_cont);
                $quantidade = mysqli_num_rows($query_count);

                $paginaAtual = isset($_GET['pagina']) && !empty($_GET['pagina']) ? $_GET['pagina'] : 1;
                $url = "?pagina=";
                $paginaQtdd = 8;
                $valorInicial = ($paginaAtual * $paginaQtdd) - $paginaQtdd;
                $paginaFinal = ceil($quantidade / $paginaQtdd);
                $paginaInicial = 1;
                $paginaProxima = $paginaAtual + 1;
                $paginaAnterior = $paginaAtual - 1;

                $sql = "SELECT * FROM produto p WHERE p.status = 1 LIMIT $valorInicial, $paginaQtdd";
                $query = mysqli_query($conexao, $sql);

                if (mysqli_num_rows($query) > 0) {
                ?>
                    <div class="row justify-content-center text-center" id="produtos">
                        <?php foreach ($query as $produto) { ?>
                            <div class="col-lg-3" >
                                <div class="card mt-3">
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
                                        <?php
                                        if ($produto['status_promocao'] == 1) {
                                            echo '<s class="mr-2"> R$ ' . number_format($produto['preco_venda'], 2, ',', '.') . '</s>';
                                            echo '<p style="display: inline-block;"> R$ ' . number_format($produto['preco_promocao'], 2, ',', '.') . '</p>';
                                        } else {
                                            echo '<p> R$ ' .  number_format($produto['preco_venda'], 2, ',', '.') . '</p>';
                                        }
                                        ?>
                                        <a href="comprar.php?id_produto=<?php echo $produto['id_produto'] ?>" class="btn btn-primary"
                                            style="background-color: rgb(124, 19, 19); border: none;">Comprar</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <div class="col-12">
                            <nav aria-label="paginacao">
                                <ul class="pagination justify-content-center mt-4">
                                    <?php if ($paginaAtual != $paginaInicial) { ?>
                                        <li class="page-item"><a class="page-link" href="<?php echo $url . $paginaInicial ?>">Início</a></li>
                                    <?php } ?>
                                    <?php if ($paginaAtual >= 2) { ?>
                                        <li class="page-item"><a class="page-link" href="<?php echo $url . $paginaAnterior ?>">&laquo;</a></li>
                                    <?php } ?>
                                    <?php if ($paginaAtual != $paginaFinal) { ?>
                                        <li class="page-item"><a class="page-link" href="<?php echo $url . $paginaProxima ?>">&raquo;</a></li>
                                        <li class="page-item"><a class="page-link" href="<?php echo $url . $paginaFinal ?>">Final</a></li>
                                    <?php } ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                <?php
                } else {
                    echo '<h5>Nenhum produto encontrado!</h5>';
                }
                ?>
            </div>
        </main>
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