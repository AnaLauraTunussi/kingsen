<?php

require_once '../../conexao/conecta.php';

if (!isset($_SESSION)) {
    session_start();
}


// cadastrar um novo cargo
if (isset($_POST['cadastrar_marca']) && $_POST['cadastrar_marca'] == 'cadastrar_marca') {
    $nome_marca = mysqli_real_escape_string($conexao, $_POST['marca']);
    $descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);

    $sql = "INSERT INTO marca VALUES(0, '$nome_marca', 1, NOW(), '$descricao')";

    if (mysqli_query($conexao, $sql)) {
        // header('Location: index.php');
        $_SESSION['mensagem'] = "Marca cadastrado com sucesso";
        header('Location: inserir.php');
    } else {
        // die("Erro: ".$sql. "<br>" . mysqli_error($conexao));
        $_SESSION['mensagem'] = "Erro ao cadastrar";
        header('Location: inserir.php');
    }
}

if (isset($_POST['atualizar']) && $_POST['atualizar'] == 'atualizar_marca')
{
    $codigo = mysqli_real_escape_string($conexao, $_POST['id_marca']);
    $status = mysqli_real_escape_string($conexao, $_POST['status']);

    $nome_marca = mysqli_real_escape_string($conexao, $_POST['marca']);
    $descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);

    $sql = "UPDATE marca SET nome_marca = '$nome_marca', status = $status, descricao = '$descricao' WHERE id_marca = $codigo";

    if (mysqli_query($conexao, $sql))
    {
        // header('Location: index.php');

        $_SESSION['mensagem'] = "Marca atualizado com sucesso!";
        header('Location: index.php');

    }
    else
    {
        // die("Erro: " . $sql . "<br>" . mysqli_error($conexao));

        $_SESSION['mensagem'] = "Erro ao atualizar";
        header('Location: inserir.php');
    }
}

if (isset($_POST['deletar_marca'])) {
    $codigo = $_POST['deletar_marca'];

    $sql = "delete from marca where id_marca = $codigo";

    if (mysqli_query($conexao, $sql)) {

    $_SESSION['mensagem'] = "marca excluido com sucesso!";
    header('Location: index.php');
} else {
    die("Erro: " . $sql . "<br>" . mysqli_error($conexao));
    // $_SESSION['mensagem'] = "Erro ao excluir o marca";
    // header('Location: index.php');
}
}
?>