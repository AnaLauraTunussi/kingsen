<?php

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
  <title>Kingsen - marcas</title>

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
           <?php include '../mensagem.php' ?>
          <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h4 class="m-0">Marcas</h4>

              <a href="inserir.php" class="btn btn-primary btn-sm">Adcionar</a>

            </div>
            <div class="card-body">

              <div class="row p-3">
                <!-- FILTRO POR STATUS -->
                <div class="col-2">
                  <select name="status" id="status" class="form-control" onchange="buscar()">
                    <option value="">Status</option>
                    <option value="1">Ativo</option>
                    <option value="0">Inativo</option>
                  </select>
                </div>
                <!-- PESQUISA -->
                <div class="col-4">
                  <input type="search" name="pesquisa" id="pesquisa" class="form-control" placeholder="Pesquisa por nome:">
                </div>
              </div>
              <div id="listar">

              </div>

            </div>
          </div>
        </div>

      </main>
    </div>
  </div>

  <!-- encerra a conexão com o servidor -->
  <?php
  mysqli_close($conexao);
  ?>

  <!-- BOOTSTRAP JS -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script>
    //FUNÇÃO PARA LISTAR FUNCIONÁRIOS
    function listar(status, nome) {
      $('#listar').text('Carregando...');
      $.ajax({
        url: 'tabela.php',
        method: 'POST',
        data: {
          status,
          nome
        },
        dataType: 'html',

        success: function(res) {
          $('#listar').html(res);
        }
      })
    }
    //FUNÇÃO PARA PESQUISAR COM OS FILTROS
    function buscar() {
      var stts = $('#status').val();

      listar(stts);
    }
    $(document).ready(function() {
      listar();
      //FUNÇÃO PARA PESQUISAR 
      $('#pesquisa').keyup(function() {
        var pesquisa = $(this).val();
        listar('', pesquisa);
      })
    })
  </script>
</body>

</html>