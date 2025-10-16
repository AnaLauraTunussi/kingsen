<?php
# CONECTA COM O BANCO #
require_once('../../conexao/conecta.php');
if (!isset($_SESSION)) {
    session_start();
}

include_once '../usuario_comum.php';

?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Kingsen - produto</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- CUSTOMIZAÇÃO DO TEMPLATE -->
    <link href="../../css/dashboard.css" rel="stylesheet">

    <!-- FAVICON -->
<link rel="icon" type="image/x-icon" href="../../assets/img/favicon.icon.png">

    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>

    <?php
    #Início TOPO
    include('../topo.php');
    #Final TOPO
    ?>

    <div class="container-fluid">
        <div class="row">
            <?php
            #Início MENU
            include('../navegacao.php');
            #Final MENU
            ?>

            <main class="ml-auto col-lg-10 px-md-4">

                <div class="container mt-5">
                    <?php
                    if (isset($_GET['id_produto']) && $_GET['id_produto'] != '') {
                        $codigo = $_GET['id_produto'];

                        $sql = " SELECT * FROM produto WHERE id_produto = $codigo";
                        $query = mysqli_query($conexao, $sql);
                        $produto = mysqli_fetch_assoc($query);
                    ?>
                        <?php include '../mensagem.php' ?>
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-itens-center">
                                <h4 class="m-0">Novo Produto</h4>

                                <a href="index.php" class="btn btn-primary btn-sm"><i class="bi bi-arrow-left"></i>Voltar</a>


                            </div> <!-- fechamento cargo e adicionar -->
                            <div class="card-body">
                                <form action="acoes.php" method="post" enctype="multipart/form-data">
                                    <div class="col-12 mb-2 text-center">
                                        <input type="image" src= "<?php 
                                            if($produto['foto'] != ""){
                                                echo '../../images/' . $produto['foto'];
                                            }else{
                                                echo'../../assets/img/placeholder-produto.jpg';
                                            }
                                        ?>" id="preview-foto" name="foto" alt="foto" width="200" height="200"><br>
                                        <label for="image"><strong class="text-danger">*</strong>Foto do Produto</label><br>
                                        <input type="file" id="foto_produto" name="foto" accept="image/*" onchange="previewImagem(event)">

                                    </div>

                                    <div class="form-group">
                                        <div class="form-row">


                                            <!--  -->
                                            <div class="col-12">
                                                <h5>Informações:</h3>
                                            </div>
                                            <div class="col-8 mb-2">
                                                <label for="nome"><strong class="text-danger">*</strong>Nome do Produto: </label>
                                                <input type="text" name="nome" maxlength="60" class="form-control" value="<?php echo $produto['nome'] ?>" required>
                                            </div>

                                            <div class="col-2">
                                                <label for="nomeSocial">Quantidade: </label>
                                                <input type="text" name="estoque" maxlength="50" value="<?php echo $produto['estoque'] ?>" class="form-control">
                                            </div>
                                            <div class="col-2">
                                                <label for="status"><strong class="text-danger">*</strong>Status: </label>
                                                <select class="form-control" name="status">
                                                    <option value="1" <?php if ($produto['status'] == 1) echo 'selected'; ?>>Ativo</option>
                                                    <option value="0" <?php if ($produto['status'] == 0) echo 'selected'; ?>>Inativo</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label for="cargo"><strong class="text-danger">*</strong>Marca: </label>
                                                <select class="form-control" name="marca">
                                                    <option value="" selected>Selecione</option>

                                                    <?php

                                                    $sql_marca = 'SELECT id_marca, nome_marca FROM marca WHERE status = 1';
                                                    $query_marca = mysqli_query($conexao, $sql_marca);
                                                    $marca = mysqli_fetch_assoc($query_marca);
                                                    do {
                                                    ?>
                                                        <option value="<?php echo $marca['id_marca'] ?>" <?php if ($produto['id_marca'] == $marca['id_marca']) echo 'selected' ?>><?php echo $marca['nome_marca'] ?> </option>;
                                                    <?php
                                                    } while ($marca = mysqli_fetch_assoc($query_marca));
                                                    ?>

                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label for="categoria"><strong class="text-danger">*</strong>Categoria: </label>
                                                <select class="form-control" name="categoria">
                                                    <option value="" selected>Selecione</option>

                                                    <?php

                                                    $sql_categoria = 'SELECT id_categoria, nome_categoria FROM categoria WHERE status = 1';
                                                    $query_categoria = mysqli_query($conexao, $sql_categoria);
                                                    $categoria = mysqli_fetch_assoc($query_categoria);
                                                    do {
                                                    ?>
                                                        <option value="<?php echo $categoria['id_categoria'] ?>" <?php if ($produto['id_categoria'] == $categoria['id_categoria']) echo 'selected' ?>><?php echo $categoria['nome_categoria'] ?> </option>;
                                                    <?php
                                                    } while ($categoria = mysqli_fetch_assoc($query_categoria));
                                                    ?>

                                                </select>
                                            </div>

                                            <div class="col-6">
                                                <label for="obaCargo">Descrição: </label>
                                                <textarea name="descricao" style="height: 39px;" maxlength="100" class="form-control" require><?php echo $produto['descricao'] ?></textarea><br>
                                            </div>
                                            <!--  -->
                                            <div class="col-12">
                                                <h5>Preço:</h5>
                                            </div>
                                            <div class="col-4">
                                                <label for="custo"><strong class="text-danger">*</strong>Preço de Custo: </label>
                                                <input type="text" name="custo" id="custo" maxlength="8" data-mask="0000000,00" data-mask-reverse=true class="form-control" value="<?php echo $produto['preco_custo'] ?>" required>

                                            </div>
                                            <div class="col-4">
                                                <label for="lucro"><strong class="text-danger">*</strong>Lucro: </label>
                                                <input type="text" name="lucro" id="lucro" class="form-control" data-mask="00%" maxlength="4" data-mask-reverse=true value="<?php echo $produto['lucro'] ?>" required>
                                            </div>
                                            <div class="col-4">
                                                <label for="venda"><strong class="text-danger">*</strong>Preço de Venda: </label>
                                                <input type="text" name="venda" id="venda" maxlength="8" data-mask="0000000,00" readonly data-mask-reverse=true class="form-control" value="<?php echo $produto['preco_venda'] ?>" required><br>

                                            </div>
                                            <div class="col-4">
                                                <label for="status">Status Promoção: </label>
                                                <select class="form-control" name="status_promo" id="status_promo">
                                                    <option value="1" <?php if ($produto['status_promocao'] == 1) echo 'selected'; ?>>Ativo</option>
                                                    <option value="0" <?php if ($produto['status_promocao'] == 0) echo 'selected'; ?>>Inativo</option>
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <label for="porcentagem">Porcentagem % </label>
                                                <input type="text" name="porcentagem" id="porcentagem" data-mask="00%" maxlength="4" data-mask-reverse=true class="form-control" value="<?php echo $produto['porcentagem'] ?>">
                                            </div>
                                            <div class="col-4">
                                                <label for="preco_promo">Preço Promocional: </label>
                                                <input type="text" name="preco_promo" id="preco_promo" maxlength="8" data-mask="0000000,00" readonly data-mask-reverse=true class="form-control" value="<?php echo $produto['preco_promocao'] ?>">
                                            </div>

                                        </div>
                                    </div>
                                    <input value="Editar" type="submit" class="btn btn-primary btn-md">
                                    <input type="hidden" value="atualizar_produto" name="atualizar">
                                    <input type="hidden" name="id_produto" value=" <?php echo $codigo ?> ">
                                </form>
                            </div>
                        </div>
                    <?php
                    } else {
                        echo "<h5>Funcionário não encontrado!</h5>";
                    }
                    ?>
                </div>

            </main>
        </div>
    </div>

    <!-- BOOTSTRAP JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-- jquery mask -->
    <script src="../../js/jquery.mask.js"></script>

    <!-- script cep -->
    <script src="../../js/script.js"></script>

    <script src="../../js/calculo.js"></script>

    <script src="../../js/foto.js"></script>

</body>

</html>