<?php

require_once '../../conexao/conecta.php';

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['cadastrar_cliente']) && $_POST['cadastrar_cliente'] == 'cadastrar_cliente') {
    $cep = mysqli_real_escape_string($conexao, $_POST['cep']);
    $bairro = mysqli_real_escape_string($conexao, $_POST['bairro']);
    $cidade = mysqli_real_escape_string($conexao, $_POST['cidade']);
    $estado = mysqli_real_escape_string($conexao, $_POST['estado']);
    $numero = mysqli_real_escape_string($conexao, $_POST['numero']);
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $data_nasc = mysqli_real_escape_string($conexao, $_POST['data_nasc']);
    $sexo = mysqli_real_escape_string($conexao, $_POST['sexo']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $nome_social = mysqli_real_escape_string($conexao, $_POST['nome_social']);
    $tel_residen = mysqli_real_escape_string($conexao, $_POST['telefone']);
    $tel_cell = mysqli_real_escape_string($conexao, $_POST['celular']);
    $endereco = mysqli_real_escape_string($conexao, $_POST['rua']);
    $cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
    $complemento = mysqli_real_escape_string($conexao, $_POST['complemento']);
    $login = mysqli_real_escape_string($conexao, $_POST['usuario']);


    $sql = "INSERT INTO cliente VALUES (0, '$cep', '$bairro', '$cidade', '$estado', '$numero', '$nome', '$data_nasc', 1, '$sexo','$senha', '$email' , '$nome_social', '$tel_residen', '$tel_cell', NOW(), '$endereco', '$cpf','$complemento', '$login')";

    if (mysqli_query($conexao, $sql)) {
        // header('Location: index.php');
        $_SESSION['mensagem'] = "Cliente cadastrado com sucesso";
        header('Location: inserir.php');
    } else {
        // die("Erro: ".$sql. "<br>" . mysqli_error($conexao));
        $_SESSION['mensagem'] = "Erro ao cadastrar";
        header('Location: inserir.php');
    }
}

if (isset($_POST['atualizar']) && $_POST['atualizar'] == 'atualizar_cliente') {
    $codigo = mysqli_real_escape_string($conexao, $_POST['id_cliente']);
    $status = mysqli_real_escape_string($conexao, $_POST['status']);

    $cep = mysqli_real_escape_string($conexao, $_POST['cep']);
    $bairro = mysqli_real_escape_string($conexao, $_POST['bairro']);
    $cidade = mysqli_real_escape_string($conexao, $_POST['cidade']);
    $estado = mysqli_real_escape_string($conexao, $_POST['estado']);
    $numero = mysqli_real_escape_string($conexao, $_POST['numero']);
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $data_nasc = mysqli_real_escape_string($conexao, $_POST['data_nasc']);
    $sexo = mysqli_real_escape_string($conexao, $_POST['sexo']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $nome_social = mysqli_real_escape_string($conexao, $_POST['nome_social']);
    $tel_residen = mysqli_real_escape_string($conexao, $_POST['telefone']);
    $tel_cell = mysqli_real_escape_string($conexao, $_POST['celular']);
    $endereco = mysqli_real_escape_string($conexao, $_POST['rua']);
    $cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
    $complemento = mysqli_real_escape_string($conexao, $_POST['complemento']);
    $login = mysqli_real_escape_string($conexao, $_POST['usuario']);

    $sql = "UPDATE cliente SET nome = '$nome', nome_social = '$nome_social', sexo = '$sexo', data_nasc = '$data_nasc', cpf = '$cpf', endereco = '$endereco', numero = '$numero', complemento = '$complemento', bairro =  '$bairro', cidade = '$cidade', estado = '$estado', cep = '$cep', email = '$email', tel_residen = '$tel_residen', tel_cell = '$tel_cell', status = $status WHERE id_cliente = $codigo";
    

    if (mysqli_query($conexao, $sql)) {
        // header('Location: index.php'); 

        $_SESSION['mensagem'] = "Cliente atualizado com sucesso!";
        header('Location: index.php');
        // header('Location: inserir.php');

    } else {
        // die("Erro: " . $sql . "<br>" . mysqli_error($conexao)); 

        $_SESSION['mensagem'] = "Erro ao atualizar";
        header('Location: inserir.php');
    }
}

if (isset($_POST['deletar_cliente'])) {
    $codigo = $_POST['deletar_cliente'];

    $sql = "delete from cliente where id_cliente = $codigo";

    if (mysqli_query($conexao, $sql)) {

    $_SESSION['mensagem'] = "Cliente excluido com sucesso!";
    header('Location: index.php');
} else {
    die("Erro: " . $sql . "<br>" . mysqli_error($conexao));
    // $_SESSION['mensagem'] = "Erro ao excluir o cliente";
    // header('Location: index.php');
}
}
