<?php

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
    <title>Kingsen - marca</title>

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

            <main class="ml-auto col-lg-10 px-md-12">

                <div class="container mt-5">
                    <?php include '../mensagem.php' ?>
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="m-0">Marcas</h4>

                            <a href="index.php" class="btn btn-primary btn-sm">
                                <i class="bi bi-arrow-left"></i>
                                Voltar
                            </a>
                        </div>

                        <div class="card-body">
                            <form action="acoes.php" method="post">
                                <div class="form-group m-2">
                                    <div class="form-row">
                                        <div class="col-6">
                                            <label for=""><strong class="text-danger">*</strong>Marca:</label>
                                            <input type="text" name="marca" class="form-control" maxlength="40" require>
                                        </div>
                                        <div class="col-6">
                                            <label for="">Status:</label>
                                            <select name="status" class="form-control" disabled>
                                                <option value="1">Ativo</option>
                                                <option value="0">Inativo</option>
                                            </select>
                                        </div>
                                        <div class="col-12 mt-1">
                                            <label for="">Descrição:</label>
                                            <textarea maxlength="100" class="form-control" name="descricao" require></textarea>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="cadastrar_marca" value="cadastrar_marca">
                                <input type="submit" value="Cadastrar" class="btn btn-primary btn-sm mt-2">
                            </form>
                        </div>
                    </div>
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