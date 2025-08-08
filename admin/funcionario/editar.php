<?php
# CONECTA COM O BANCO #
require_once('../../conexao/conecta.php');

include_once'../usuario_admin.php'

?>


<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Kingsen - Funcionários</title>

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- CUSTOMIZAÇÃO DO TEMPLATE -->
    <link href="../../css/dashboard.css" rel="stylesheet">

    <!-- FAVICON -->
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon.ico">

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
                    <?php
                    if (isset($_GET['id_funcionario']) && $_GET['id_funcionario'] != '') {
                        $codigo = $_GET['id_funcionario'];

                        $sql = " SELECT * FROM funcionario WHERE id_funcionario = $codigo";
                        $query = mysqli_query($conexao, $sql);
                        $funcionario = mysqli_fetch_assoc($query);
                    ?>
                        <div class="card">

                            <div class="card-header d-flex justify-content-between align-itens-center">
                                <h4 class="m-0">Editar Funcionário</h4>
                                <a href="index.php" class="btn btn-primary btn-sm"><i class="bi bi-arrow-left"></i>Voltar</a>
                            </div> <!-- fechamento cargo e adicionar -->

                            <div class="card-body">

                                <!-- ENCTYPE PARA TRANSFERENCIA DE ARQUIVOS -->
                                <form action="acoes.php" method="post" enctype="multipart/form-data">

                                    <div class="col-12 mb-2 text-center">
                                        <?php if($foto != ''){ ?>
                                        <input type="image" src="../../assets/img/" id="preview-foto" name="foto" alt="foto" width="200" value="<?php echo $produto['foto'] ?>" height="200"><br>
                                        <?php }else { ?>
                                        <input type="image" src="../../assets/img/placeholder-produto.jpg" id="preview-foto" name="foto" alt="foto" width="200" height="200"><br>    
                                        <?php } ?>    
                                        <label for="image"><strong class="text-danger">*</strong>Foto do Produto</label><br>
                                        <input type="file" id="foto_produto" name="foto" accept="image/*"  onchange="previewImagem(event)">
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row">


                                            <!--  -->
                                            <div class="col-12">
                                                <h5>Dados Pessoais:</h3>
                                            </div>
                                            <div class="col-4 mb-2">
                                                <label for="nome"><strong class="text-danger">*</strong>Nome: </label>
                                                <input type="text" name="nome" maxlength="50" value="<?php echo $funcionario['nome'] ?>" class="form-control" required>
                                            </div>

                                            <div class="col-4">
                                                <label for="nomeSocial">Nome Social: </label>
                                                <input type="text" name="nomeSocial" maxlength="50" value="<?php echo $funcionario['nome_social'] ?>" class="form-control">
                                            </div>

                                            <div class="col-2">
                                                <label for="dataNascimento"><strong class="text-danger">*</strong>Data de Nascimento: </label>
                                                <input type="date" name="data_nasc" maxlength="10" value="<?php echo $funcionario['data_nasc'] ?>" class="form-control" required>
                                            </div>

                                            <div class="col-2">
                                                <label for="status"><strong class="text-danger">*</strong>Status: </label>
                                                <select class="form-control" name="status">
                                                    <option value="1" <?php if ($funcionario['status'] == 1) echo 'selected'; ?>>Ativo</option>
                                                    <option value="0" <?php if ($funcionario['status'] == 0) echo 'selected'; ?>>Inativo</option>
                                                </select>
                                            </div>
                                            <!--  -->
                                            <div class="col-2 mb-2">
                                                <label for="sexo"><strong class="text-danger">*</strong>Sexo: </label>
                                                <select class="form-control" name="sexo" required>
                                                    <option value="M" <?php if ($funcionario['sexo'] == 'M') echo 'selected'; ?>>Masculino</option>
                                                    <option value="F" <?php if ($funcionario['sexo'] == 'F') echo 'selected'; ?>>Feminino</option>
                                                    <option value="N" <?php if ($funcionario['sexo'] == 'N') echo 'selected'; ?>>Não informado</option>
                                                </select>
                                            </div>

                                            <div class="col-2">
                                                <label for="estadoCivil"><strong class="text-danger">*</strong>Estado Civil: </label>
                                                <select class="form-control" name="estado_civil">
                                                    <option value="solteiro" <?php if ($funcionario['estado_civil'] == 'solteiro') echo 'selected'; ?>>Solteiro</option>
                                                    <option value="casado" <?php if ($funcionario['estado_civil'] == 'casado') echo 'selected'; ?>>Casado</option>
                                                    <option value="divorciado" <?php if ($funcionario['estado_civil'] == 'divorciado') echo 'selected'; ?>>Divorciado</option>
                                                    <option value="viuvo" <?php if ($funcionario['estado_civil'] == 'viuvo') echo 'selected'; ?>>Viúvo</option>
                                                    <option value="separado" <?php if ($funcionario['estado_civil'] == 'separado') echo 'selected'; ?>>Separado </option>
                                                </select>
                                            </div>

                                            <div class="col-5 mb-2">
                                                <label for="cpf"><strong class="text-danger">*</strong>CPF: </label>
                                                <input type="text" name="cpf" maxlength="14" value="<?php echo $funcionario['cpf'] ?>" class="form-control" data-mask="000.000.000-00" required>
                                            </div>

                                            <div class="col-3">
                                                <label for="rg"><strong class="text-danger">*</strong>RG: </label>
                                                <input type="text" name="rg" maxlength="12" value="<?php echo $funcionario['rg'] ?>" class="form-control" data-mask="00.000.000-A" required>
                                            </div>
                                            <!--  -->
                                            <div class="col-12">
                                                <h5>Contatos:</h5>
                                            </div>
                                            <div class="col-3">
                                                <label for="celular"><strong class="text-danger">*</strong>Celular: </label>
                                                <input type="tel" name="celular" maxlength="14" value="<?php echo $funcionario['telef_celular'] ?>" class="form-control" data-mask="(00)00000-0000" required>
                                            </div>
                                            <div class="col-3">
                                                <label for="telefone">Telefone: </label>
                                                <input type="tel" name="telefone" maxlength="13" value="<?php echo $funcionario['telef_residen'] ?>" class="form-control" data-mask="(00)0000-0000">
                                            </div>
                                            <div class="col-6 mb-2">
                                                <label for="email"><strong class="text-danger">*</strong>Email: </label>
                                                <input type="email" name="email" maxlength="50" value="<?php echo $funcionario['email'] ?>" class="form-control" required>
                                            </div>
                                            <!--  -->
                                            <div class="col-12">
                                                <h5>Endereço:</h5>
                                            </div>
                                            <div class="col-2 mb-2">
                                                <label for="cep"><strong class="text-danger">*</strong>CEP: </label>
                                                <input type="text" name="cep" id="cep" maxlength="9" data-mask="00000-000" class="form-control" onblur="pesquisacep(this.value);" value="<?php echo $funcionario['cep'] ?>" required>
                                            </div>
                                            <div class="col-6">
                                                <label for="rua"><strong class="text-danger">*</strong>Rua: </label>
                                                <input type="text" name="rua" id="rua" maxlength="9" class="form-control" value="<?php echo $funcionario['endereco'] ?>" required>
                                            </div>
                                            <div class="col-3">
                                                <label for="bairro"><strong class="text-danger">*</strong>Bairro: </label>
                                                <input type="text" name="bairro" id="bairro" maxlength="30" class="form-control" value="<?php echo $funcionario['bairro'] ?>" required>
                                            </div>
                                            <div class="col-1">
                                                <label for="numero"><strong class="text-danger">*</strong>Número: </label>
                                                <input type="text" name="numero" maxlength="5" class="form-control" value="<?php echo $funcionario['numero'] ?>" required>
                                            </div>
                                            <!--  -->
                                            <div class="col-4 mb-2">
                                                <label for="cidade"><strong class="text-danger">*</strong>Cidade: </label>
                                                <input type="text" name="cidade" id="cidade" maxlength="30" class="form-control" value="<?php echo $funcionario['cidade'] ?>" required>
                                            </div>
                                            <div class="col-3">
                                                <label for="estado"><strong class="text-danger">*</strong>Estado: </label>
                                                <select class="form-control" name="estado" id="uf" required>
                                                    <option value="AC" <?php if ($funcionario['estado'] == 'AC') echo 'selected'; ?>>Acre</option>
                                                    <option value="AL" <?php if ($funcionario['estado'] == 'AL') echo 'selected'; ?>>Alagoas</option>
                                                    <option value="AP" <?php if ($funcionario['estado'] == 'AP') echo 'selected'; ?>>Amapá</option>
                                                    <option value="AM" <?php if ($funcionario['estado'] == 'AM') echo 'selected'; ?>>Amazonas</option>
                                                    <option value="BA" <?php if ($funcionario['estado'] == 'BA') echo 'selected'; ?>>Bahia</option>
                                                    <option value="CE" <?php if ($funcionario['estado'] == 'CE') echo 'selected'; ?>>Ceará</option>
                                                    <option value="DF" <?php if ($funcionario['estado'] == 'DF') echo 'selected'; ?>>Distrito Federal</option>
                                                    <option value="ES" <?php if ($funcionario['estado'] == 'ES') echo 'selected'; ?>>Espírito Santo</option>
                                                    <option value="GO" <?php if ($funcionario['estado'] == 'GO') echo 'selected'; ?>>Goiás</option>
                                                    <option value="MA" <?php if ($funcionario['estado'] == 'MA') echo 'selected'; ?>>Maranhão</option>
                                                    <option value="MT" <?php if ($funcionario['estado'] == 'MT') echo 'selected'; ?>>Mato Grosso</option>
                                                    <option value="MS" <?php if ($funcionario['estado'] == 'MS') echo 'selected'; ?>>Mato Grosso do Sul</option>
                                                    <option value="MG" <?php if ($funcionario['estado'] == 'MG') echo 'selected'; ?>>Minas Gerais</option>
                                                    <option value="PA" <?php if ($funcionario['estado'] == 'PA') echo 'selected'; ?>>Pará</option>
                                                    <option value="PB" <?php if ($funcionario['estado'] == 'PB') echo 'selected'; ?>>Paraíba</option>
                                                    <option value="PR" <?php if ($funcionario['estado'] == 'PR') echo 'selected'; ?>>Paraná</option>
                                                    <option value="PE" <?php if ($funcionario['estado'] == 'PE') echo 'selected'; ?>>Pernambuco</option>
                                                    <option value="PI" <?php if ($funcionario['estado'] == 'PI') echo 'selected'; ?>>Piauí</option>
                                                    <option value="RJ" <?php if ($funcionario['estado'] == 'RJ') echo 'selected'; ?>>Rio de Janeiro</option>
                                                    <option value="RN" <?php if ($funcionario['estado'] == 'RN') echo 'selected'; ?>>Rio Grande do Norte</option>
                                                    <option value="RS" <?php if ($funcionario['estado'] == 'RS') echo 'selected'; ?>>Rio Grande do Sul</option>
                                                    <option value="RO" <?php if ($funcionario['estado'] == 'RO') echo 'selected'; ?>>Rondônia</option>
                                                    <option value="RR" <?php if ($funcionario['estado'] == 'RR') echo 'selected'; ?>>Roraima</option>
                                                    <option value="SC" <?php if ($funcionario['estado'] == 'SC') echo 'selected'; ?>>Santa Catarina</option>
                                                    <option value="SP" <?php if ($funcionario['estado'] == 'SP') echo 'selected'; ?>>São Paulo</option>
                                                    <option value="SE" <?php if ($funcionario['estado'] == 'SE') echo 'selected'; ?>>Sergipe</option>
                                                    <option value="TO" <?php if ($funcionario['estado'] == 'TO') echo 'selected'; ?>>Tocantins</option>
                                                </select>
                                            </div>
                                            <div class="col-5 mb-4">
                                                <label for="complemento">Complemento: </label>
                                                <input type="text" name="complemento" maxlength="50" value="<?php echo $funcionario['complemento'] ?>" class="form-control">
                                            </div>
                                            <!--  -->
                                            <div class="col-12">
                                                <h5>Acesso:</h5>
                                            </div>
                                            <div class="col-6">
                                                <label for="usuario"><strong class="text-danger">*</strong>Usuário: </label>
                                                <input type="text" name="usuario" maxlength="14" value="<?php echo $funcionario['usuario'] ?>" class="form-control" required>
                                            </div>

                                            <div class="col-6">
                                                <label for="senha"><strong class="text-danger">*</strong>Senha: </label>
                                                <input type="password" name="senha" maxlength="8" value="<?php echo $funcionario['senha'] ?>" class="form-control" required>
                                            </div>
                                            <!--  -->
                                            <div class="col-12">
                                                <h5>Cargo:</h5>
                                            </div>
                                            <div class="col-6">
                                                <label for="cargo"><strong class="text-danger">*</strong>Cargo: </label>
                                                <select class="form-control" name="cargo">
                                                    <option value="" selected>Selecione</option>
                                                    <?php
                                                    $sql_cargo = 'SELECT id_cargo, nome_cargo FROM cargo WHERE status = 1';
                                                    $query_cargo = mysqli_query($conexao, $sql_cargo);
                                                    $cargo = mysqli_fetch_assoc($query_cargo);
                                                    do {
                                                    ?>
                                                        <option value="<?php echo $cargo['id_cargo'] ?>" <?php if ($funcionario['id_cargo'] == $cargo['id_cargo']) echo 'selected' ?>><?php echo $cargo['nome_cargo'] ?></option>
                                                    <?php
                                                    } while ($cargo = mysqli_fetch_assoc($query_cargo));
                                                    ?>

                                                </select>
                                            </div>

                                            <div class="col-4">
                                                <label for="salario"><strong class="text-danger">*</strong>Salário: </label>
                                                <input type="text" name="salario" maxlength="8" value="<?php echo $funcionario['salario'] ?>" class="form-control" data-mask="00000,00" data-mask-reverse="true" required>
                                            </div>

                                            <div class="col-2">
                                                <label for="tipoAcesso"><strong class="text-danger">*</strong>Tipo de Acesso: </label>
                                                <select class="form-control" name="tipo_acesso">
                                                    <option value="1" <?php if ($funcionario['tipo_acesso'] == 1) echo 'selected' ?>>Admin</option>
                                                    <option value="0" <?php if ($funcionario['tipo_acesso'] == 0) echo 'selected' ?>>Comum</option>
                                                </select>
                                            </div>
                                            <!--  -->

                                        </div>
                                    </div>

                                    <input type="hidden" name="atualizar" value="atualizar_funcionario"><!-- VALIDAÇÃO ESCONDIDO -->
                                    <input type="hidden" name="id_funcionario" value=" <?php echo $codigo ?> ">

                                    <input value="Atualizar" type="submit" href="" class="btn btn-primary btn-md">

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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- JQUERY MASK -->
    <script src="../../js/jquery.mask.js"></script>

    <!-- script cep -->
    <script src="../../js/script.js"></script>


    <script src="../../js/foto.js"></script>
</body>

</html>