<?php
//SE NÃO TIVER UMA SESSION SETADA INICIE UMA SESSION
require_once '../../conexao/conecta.php';
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
    <title>Kingsen - Marca</title>

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

                    <!-- MENSAGEM PHP -->
                    <?php include '../mensagem.php' ?>

                    <?php
                    if (isset($_GET['id_marca']) && $_GET['id_marca'] != '') {
                        $codigo = $_GET['id_marca'];

                        $sql = "SELECT * FROM marca WHERE id_marca = $codigo";
                        $query = mysqli_query($conexao, $sql);
                        $marca = mysqli_fetch_assoc($query);
                    ?>
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-itens-center">
                                <h4 class="m-0">Editar marca</h4>

                                <a href="index.php" class="btn btn-primary btn-sm"><i class="bi bi-arrow-left"></i>Voltar</a>


                            </div> <!-- fechamento cargo e adicionar -->
                            <div class="card-body">

                                <form action="acoes.php" method="post">
                                    <div class="form-group">

                                        <div class="form-row">

                                            <div class="col-6">
                                                <label for="cargo"><strong class="text-danger">*</strong>marca: </label>
                                                <input type="text" name="marca" maxlength="40" value="<?php echo $marca['nome_marca'] ?>" class="form-control" required>
                                            </div>

                                            <div class="col-6">
                                                <label for="status"><strong class="text-danger">*</strong>Status: </label>
                                                <select class="form-control" name="status">
                                                    <option value="1" <?php if ($marca['status'] == 1) echo 'selected'; ?>>Ativo</option>
                                                    <option value="0" <?php if ($marca['status'] == 0) echo 'selected'; ?>>Inativo</option>
                                                </select>
                                            </div>

                                            <div class="col-12">
                                                <label for="observacao">Descrição: </label>
                                                <textarea name="descricao" row="5" maxlength="100" class="form-control"><?php echo $marca['descricao'] ?></textarea>
                                            </div>

                                        </div>

                                    </div>

                                    <input type="hidden" name="atualizar" value="atualizar_marca">
                                    <input type="hidden" name="id_marca" value=" <?php echo $codigo ?> ">

                                    <input value="Atualizar" type="submit" href="" class="btn btn-primary btn-md">

                                </form>
                            </div>


                        </div>
                    <?php
                    } else {
                        echo "<h5>Marca não encontrado!</h5>";
                    }
                    ?>
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