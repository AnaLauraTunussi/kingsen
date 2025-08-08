<?php

require_once '../../conexao/conecta.php';

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['cadastrar_categoria']) && $_POST['cadastrar_categoria'] == 'cadastrar_categoria') {
    $nome_categoria = mysqli_real_escape_string($conexao, $_POST['categoria']);
    $descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);

    $sql = "INSERT INTO categoria VALUES(0, '$nome_categoria', 1, NOW(), '$descricao')";

    if (mysqli_query($conexao, $sql)) {
        // header('Location: index.php');
        $_SESSION['mensagem'] = "categoria cadastrado com sucesso";
        header('Location: inserir.php');
    } else {
        die("Erro: " . $sql . "<br>" . mysqli_error($conexao));
        //     $_SESSION['mensagem'] = "Erro ao cadastrar";
        //     header('Location: inserir.php');
        // }
    }
}

if (isset($_POST['atualizar']) && $_POST['atualizar'] == 'atualizar_categoria')
{
    $codigo = mysqli_real_escape_string($conexao, $_POST['id_categoria']);
    $status = mysqli_real_escape_string($conexao, $_POST['status']);

    $categoria = mysqli_real_escape_string($conexao, $_POST['categoria']);
    $descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);

    $sql = "UPDATE categoria SET nome_categoria = '$categoria', status = $status, descricao = '$descricao' WHERE id_categoria = $codigo";

    if (mysqli_query($conexao, $sql))
    {
        // header('Location: index.php'); //FORMA QUE VOLTA PARA A PAGINA DAS TABELAS

        $_SESSION['mensagem'] = "Categoria atualizado com sucesso!";
        header('Location: index.php');

    }
    else
    {
        // die("Erro: " . $sql . "<br>" . mysqli_error($conexao));

        $_SESSION['mensagem'] = "Erro ao atualizar";
        header('Location: inserir.php');
    }
}

if (isset($_POST['deletar_categoria'])) {
    $codigo = $_POST['deletar_categoria'];

    $sql = "delete from categoria where id_categoria = $codigo";

    if (mysqli_query($conexao, $sql)) {

    $_SESSION['mensagem'] = "Categoria excluido com sucesso!";
    header('Location: index.php');
} else {
    die("Erro: " . $sql . "<br>" . mysqli_error($conexao));
    // $_SESSION['mensagem'] = "Erro ao excluir o categoria";
    // header('Location: index.php');
}
}



?>