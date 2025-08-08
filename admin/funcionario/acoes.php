<?php

require_once '../../conexao/conecta.php';

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['cadastrar_funcionario']) && $_POST['cadastrar_funcionario'] == 'cadastrar_funcionario') {
    $rg = mysqli_real_escape_string($conexao, $_POST['rg']);
    $cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
    $sexo = mysqli_real_escape_string($conexao, $_POST['sexo']);
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $data_nasc = mysqli_real_escape_string($conexao, $_POST['data_nasc']);
    $nome_social = mysqli_real_escape_string($conexao, $_POST['nome_social']);
    $estado_civil = mysqli_real_escape_string($conexao, $_POST['estado_civil']);
    // $foto = mysqli_real_escape_string($conexao, $_POST['foto']);
    $foto = basename($_FILES['foto']['name']);
    $tpm = $_FILES['foto']['tmp_name'];
    $final = "../../images/" . $foto;
    move_uploaded_file($tmp, $final);

    $telef_celular = mysqli_real_escape_string($conexao, $_POST['celular']);
    $telef_residen = mysqli_real_escape_string($conexao, $_POST['telefone']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
    $tipo_acesso = mysqli_real_escape_string($conexao, $_POST['tipo_acesso']);
    $numero = mysqli_real_escape_string($conexao, $_POST['numero']);
    $complemento = mysqli_real_escape_string($conexao, $_POST['complemento']);
    $bairro = mysqli_real_escape_string($conexao, $_POST['bairro']);
    $cidade = mysqli_real_escape_string($conexao, $_POST['cidade']);
    $estado = mysqli_real_escape_string($conexao, $_POST['estado']);
    $cep = mysqli_real_escape_string($conexao, $_POST['cep']);
    $salario = str_replace(',', '.', $_POST['salario']);
    $cargo = mysqli_real_escape_string($conexao, $_POST['cargo']);
    $endereco = mysqli_real_escape_string($conexao, $_POST['rua']);


    //enviando foto para o servidor


    $sql = "INSERT INTO funcionario VALUES (0, '$rg', '$cpf', '$sexo', '$nome', '$data_nasc', '$nome_social', '$estado_civil', '$foto', '$telef_celular','$telef_residen', 1 , '$email', '$usuario', '$senha', $tipo_acesso, '$numero', '$complemento', '$bairro', '$cidade', '$estado', '$cep', NOW(), '$salario', $cargo, '$endereco')";

    if (mysqli_query($conexao, $sql)) {
        // header('Location: index.php');
        $_SESSION['mensagem'] = "Funcionario cadastrado com sucesso";
        header('Location: inserir.php');
    } else {
        // die("Erro: ".$sql. "<br>" . mysqli_error($conexao));
        $_SESSION['mensagem'] = "Erro ao cadastrar";
        header('Location: inserir.php');
    }
}

if (isset($_POST['atualizar']) && $_POST['atualizar'] == 'atualizar_funcionario') {
    $codigo = mysqli_real_escape_string($conexao, $_POST['id_funcionario']);
    $status = mysqli_real_escape_string($conexao, $_POST['status']);
    $rg = mysqli_real_escape_string($conexao, $_POST['rg']);
    $cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
    $sexo = mysqli_real_escape_string($conexao, $_POST['sexo']);
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $data_nasc = mysqli_real_escape_string($conexao, $_POST['data_nasc']);
    $nome_social = mysqli_real_escape_string($conexao, $_POST['nome_social']);
    $estado_civil = mysqli_real_escape_string($conexao, $_POST['estado_civil']);
    $telef_celular = mysqli_real_escape_string($conexao, $_POST['celular']);
    $telef_residen = mysqli_real_escape_string($conexao, $_POST['telefone']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
    $tipo_acesso = mysqli_real_escape_string($conexao, $_POST['tipo_acesso']);
    $numero = mysqli_real_escape_string($conexao, $_POST['numero']);
    $complemento = mysqli_real_escape_string($conexao, $_POST['complemento']);
    $bairro = mysqli_real_escape_string($conexao, $_POST['bairro']);
    $cidade = mysqli_real_escape_string($conexao, $_POST['cidade']);
    $estado = mysqli_real_escape_string($conexao, $_POST['estado']);
    $cep = mysqli_real_escape_string($conexao, $_POST['cep']);
    $salario = str_replace(',', '.', $_POST['salario']);
    $cargo = mysqli_real_escape_string($conexao, $_POST['cargo']);
    $endereco = mysqli_real_escape_string($conexao, $_POST['rua']);
    //ENVIANDO A FOTO PARA O SERVIDOR
    //PEGANDO O NOME DA IMAGEM
    $foto = basename($_FILES['foto']['name']);
    //SALVANDO O CAMINHO TEMPORÁRIO NA PASTA TMP
    $tmp = $_FILES['foto']['tmp_name'];
    //CRIANDO O CAMINHO FINAL DA IMAGEM
    $final = "../../images/" . $foto;
    //MOVENDO A IMAGEM DA PASTA TEMPORÁRIA PARA A PASTA IMAGES
    move_uploaded_file($tmp, $final);

    $sql = "UPDATE funcionario SET id_cargo = $cargo, nome =  '$nome', nome_social = '$nome_social', data_nasc = '$data_nasc', sexo = '$sexo', estado_civil = '$estado_civil', cpf = '$cpf', rg = '$rg', salario = '$salario', telef_residen = '$telef_residen', telef_celular = '$telef_celular', email = '$email', status = $status, usuario = '$usuario', senha = '$senha', tipo_acesso = $tipo_acesso, cidade = '$cidade', estado = '$estado', numero = '$numero', bairro = '$bairro', endereco = '$endereco', complemento = '$complemento', cep = '$cep', foto = '$foto'";

    //VERIFICAR SE A FOTO ESTÁ VAZIA, CASO NÃO, ELE DAZ A ATUALIZAÇÃO DO FOTO
    if (!empty($foto)) {
        $sql .= " , foto = '$foto'";
    }

    $sql .= " WHERE id_funcionario = $codigo";
    
    if (mysqli_query($conexao, $sql)) {
            header('Location: index.php');

            $_SESSION['mensagem'] = "Funcionário atualizado com sucesso!";
            header('Location: index.php');
        } else {
            // die("Erro: " . $sql . "<br>" . mysqli_error($conexao)); 

            $_SESSION['mensagem'] = "Erro ao cadastrar";
            header('Location: inserir.php');
        }

    
}

if (isset($_POST['deletar_funcionario'])) {
    $codigo = $_POST['deletar_funcionario'];

    $sql = "delete from funcionario where id_funcionario = $codigo";

    if (mysqli_query($conexao, $sql)) {

    $_SESSION['mensagem'] = "Funcionario excluido com sucesso!";
    header('Location: index.php');
} else {
    die("Erro: " . $sql . "<br>" . mysqli_error($conexao));
    // $_SESSION['mensagem'] = "Erro ao excluir o funcionario";
    // header('Location: index.php');
}
}
