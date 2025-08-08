<?php

require_once '../../conexao/conecta.php';

if (!isset($_SESSION)) {
    session_start();
}


// cadastrar um novo cargo
if (isset($_POST['cadastrar']) && $_POST['cadastrar'] == 'cadastrar_cargo') {
    $cargo = mysqli_real_escape_string($conexao, $_POST['cargo']);
    $observacao = mysqli_real_escape_string($conexao, $_POST['observacao']);

    $sql = "INSERT INTO cargo VALUES(0, '$cargo', '$observacao', 1, NOW())";

    if (mysqli_query($conexao, $sql)) {
        // header('Location: index.php');
        $_SESSION['mensagem'] = "Cargo cadastrado com sucesso";
        header('Location: inserir.php');
    } else {
        // die("Erro: ".$sql. "<br>" . mysqli_error($conexao));
        $_SESSION['mensagem'] = "Erro ao cadastrar";
        header('Location: inserir.php');
    }
}

if (isset($_POST['atualizar']) && $_POST['atualizar'] == 'atualizar_cargo') {
    $codigo = mysqli_real_escape_string($conexao, $_POST['id_cargo']);
    $status = mysqli_real_escape_string($conexao, $_POST['status']);

    $cargo = mysqli_real_escape_string($conexao, $_POST['cargo']);
    $observacao = mysqli_real_escape_string($conexao, $_POST['observacao']);

    $sql = "UPDATE cargo SET id_cargo = $codigo, nome_cargo = '$cargo', status = $status, observacao = '$observacao' WHERE id_cargo = $codigo";

    if (mysqli_query($conexao, $sql)) {

        $_SESSION['mensagem'] = "Cargo atualizado com sucesso!";
        header('Location: index.php');
    } else {
        // die("Erro: " . $sql . "<br>" . mysqli_error($conexao)); 
        $_SESSION['mensagem'] = "Erro ao atualizar o cargo";
        header('Location: inserir.php');
    }
}

if (isset($_POST['deletar_cargo'])) {
    $codigo = $_POST['deletar_cargo'];

    $sql_verificar = "select cargo.nome_cargo from cargo inner join funcionario on cargo.id_cargo = funcionario.id_cargo where cargo.id_cargo = $codigo";
    $query = mysqli_query($conexao, $sql_verificar);
    $contagem = mysqli_num_rows($query);
    $cargo = mysqli_fetch_array($query);

    if ($contagem > 0) {
        $_SESSION['mensagem'] = "Não é possivel excluir esse cargo <b>".$cargo['nome_cargo']."</b> pois existem <b>".$contagem." funcionario(s) </b> vinculados a eles";
        header('Location: index.php');
    } else {
        $sql = "delete from cargo where id_cargo = $codigo";

        if (mysqli_query($conexao, $sql)) {

            $_SESSION['mensagem'] = "Cargo excluido com sucesso!";
            header('Location: index.php');
        } else {
            die("Erro: " . $sql . "<br>" . mysqli_error($conexao));
            // $_SESSION['mensagem'] = "Erro ao excluir o cargo";
            // header('Location: index.php');
        }
    }
}
