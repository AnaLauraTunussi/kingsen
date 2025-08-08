<?php

require_once '../../conexao/conecta.php';

include_once '../usuario_comum.php';

?>
<?php 
  
  if(!isset($_SESSION)){
    session_start();
  }

?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Kingsen - cliente</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- CUSTOMIZAÇÃO DO TEMPLATE -->
    <link href="../../css/dashboard.css" rel="stylesheet">

    <!-- FAVICON -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.ico">

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
                    <?php include '../mensagem.php'?>
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-itens-center">
                            <h4 class="m-0">Novo Cliente</h4>

                            <a href="index.php" class="btn btn-primary btn-sm"><i class="bi bi-arrow-left"></i>Voltar</a>


                        </div> <!-- fechamento cargo e adicionar -->
                        <div class="card-body">
                            <form action="acoes.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="form-row">


                                        <!--  -->
                                        <div class="col-12">
                                            <h5>Dados Pessoais:</h3>
                                        </div>
                                        <div class="col-4 mb-2">
                                            <label for="nome"><strong class="text-danger">*</strong>Nome: </label>
                                            <input type="text" name="nome" maxlength="60" class="form-control" required>
                                        </div>

                                        <div class="col-4">
                                            <label for="nomeSocial">Nome Social: </label>
                                            <input type="text" name="nome_social" maxlength="50" class="form-control">
                                        </div>

                                        <div class="col-2">
                                            <label for="dataNascimento"><strong class="text-danger">*</strong>Data de Nascimento: </label>
                                            <input type="date" name="data_nasc" maxlength="10" class="form-control" required>
                                        </div>

                                        <div class="col-2">
                                            <label for="status"><strong class="text-danger">*</strong>Status: </label>
                                            <select class="form-control" name="status" disabled>
                                                <option value="1" selected>Ativo</option>
                                                <option value="0">Inativo</option>
                                            </select>
                                        </div>
                                        <!--  -->
                                        <div class="col-2 mb-2">
                                            <label for="sexo"><strong class="text-danger">*</strong>Sexo: </label>
                                            <select class="form-control" name="sexo" required>
                                                <option value="M" selected>Masculino</option>
                                                <option value="F">Feminino</option>
                                                <option value="N" selected>Não informado</option>
                                            </select>
                                        </div>

                                        <div class="col-5 mb-2">
                                            <label for="cpf"><strong class="text-danger">*</strong>CPF: </label>
                                            <input type="text" name="cpf" maxlength="14" data-mask="000.000.000-00" class="form-control" required>
                                        </div>
                                        <!--  -->
                                        <div class="col-12">
                                            <h5>Contatos:</h5>
                                        </div>
                                        <div class="col-3">
                                            <label for="celular"><strong class="text-danger">*</strong>Celular: </label>
                                            <input type="tel" name="celular" maxlength="14" data-mask="(00)00000-0000" class="form-control" required>
                                        </div>
                                        <div class="col-3">
                                            <label for="telefone"><strong class="text-danger">*</strong>Telefone: </label>
                                            <input type="tel" name="telefone" maxlength="14" data-mask="(00)00000-0000" class="form-control" required>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <label for="email"><strong class="text-danger">*</strong>Email: </label>
                                            <input type="text" name="email" maxlength="50" class="form-control" required>
                                        </div>
                                        <!--  -->
                                        <div class="col-12">
                                            <h5>Endereço:</h5>
                                        </div>
                                        <div class="col-2 mb-2">
                                            <label for="cep"><strong class="text-danger">*</strong>CEP: </label>
                                            <input type="text" name="cep" id="cep" maxlength="9" data-mask="00000-000" class="form-control" onblur="pesquisacep(this.value);" required>
                                        </div>
                                        <div class="col-6">
                                            <label for="rua"><strong class="text-danger">*</strong>Rua: </label>
                                            <input type="text" name="rua" id="rua" maxlength="9" class="form-control" required>
                                        </div>
                                        <div class="col-3">
                                            <label for="bairro"><strong class="text-danger">*</strong>Bairro: </label>
                                            <input type="text" name="bairro" id="bairro" maxlength="30" class="form-control" required>
                                        </div>
                                        <div class="col-1">
                                            <label for="numero"><strong class="text-danger">*</strong>Número: </label>
                                            <input type="text" name="numero"  maxlength="5" class="form-control" required>
                                        </div>
                                        <!--  -->
                                        <div class="col-4 mb-2">
                                            <label for="cidade"><strong class="text-danger">*</strong>Cidade: </label>
                                            <input type="text" name="cidade" id="cidade" maxlength="30" class="form-control" required>
                                        </div>
                                        <div class="col-3">
                                            <label for="estado"><strong class="text-danger">*</strong>Estado: </label>
                                            <select class="form-control" name="estado" id="uf" required>
                                                
                                                <option value="AC">AC</option>
                                                <option value="AL">AL</option>
                                                <option value="AP">AP</option>
                                                <option value="AM">AM</option>
                                                <option value="BA">BA</option>
                                                <option value="CE">CE</option>
                                                <option value="DF">DF</option>
                                                <option value="ES">ES</option>
                                                <option value="GO">GO</option>
                                                <option value="MA">MA</option>
                                                <option value="MT">MT</option>
                                                <option value="MS">MS</option>
                                                <option value="MG">MG</option>
                                                <option value="PA">PA</option>
                                                <option value="PB">PB</option>
                                                <option value="PR">PR</option>
                                                <option value="PE">PE</option>
                                                <option value="PI">PI</option>
                                                <option value="RJ">RJ</option>
                                                <option value="RN">RN</option>
                                                <option value="RS">RS</option>
                                                <option value="RO">RO</option>
                                                <option value="RR">RR</option>
                                                <option value="SC">SC</option>
                                                <option value="SP" selected>SP</option>
                                                <option value="SE">SE</option>
                                                <option value="TO">TO</option>
                                            </select>
                                        </div>
                                        <div class="col-5 mb-4">
                                            <label for="complemento">Complemento: </label>
                                            <input type="text" name="complemento" maxlength="50" class="form-control">
                                        </div>
                                        <!--  -->
                                        <div class="col-6">
                                            <label for="usuario"><strong class="text-danger">*</strong>Usuário: </label>
                                            <input type="text" name="usuario" maxlength="50" class="form-control" required>
                                        </div>

                                        <div class="col-6">
                                            <label for="senha"><strong class="text-danger">*</strong>Senha: </label>
                                            <input type="password" name="senha" maxlength="50" class="form-control" required>
                                        </div>
                            
                                        <!--  -->
                                    </div>
                                </div>
                                <input value="cadastrar" type="submit" class="btn btn-primary btn-md">
                                <input type="hidden" value="cadastrar_cliente" name="cadastrar_cliente" >
                            </form>
                        </div>
                    </div>
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

</body>

</html>