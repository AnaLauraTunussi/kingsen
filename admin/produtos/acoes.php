<?php

require_once '../../conexao/conecta.php';

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['cadastrar_produto']) && $_POST['cadastrar_produto'] == 'cadastrar_produto') {
    $descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $preco_venda = str_replace(',', '.', $_POST['venda']);
    $preco_promocao = str_replace(',', '.', $_POST['preco_promo']);
    $estoque = mysqli_real_escape_string($conexao, $_POST['estoque']);
    $preco_custo = str_replace(',', '.', $_POST['custo']);
    $preco_lucro = str_replace(',', '.',  $_POST['lucro']);
    $status_promocao = mysqli_real_escape_string($conexao, $_POST['status_promo']);
    $porcentagem = mysqli_real_escape_string($conexao, $_POST['porcentagem']);
    $id_marca = mysqli_real_escape_string($conexao, $_POST['marca']);
    $id_categoria = mysqli_real_escape_string($conexao, $_POST['categoria']);

    $foto = basename($_FILES['foto']['name']);
    $tmp = $_FILES['foto']['tmp_name'];
    $final = "../../images/" . $foto;
    move_uploaded_file($tmp, $final);


    $sql = "INSERT INTO produto VALUES (0, '$descricao', '$nome', '$preco_venda', '$foto', '$preco_promocao', '$estoque', 1, '$preco_custo','$preco_lucro', $status_promocao , '$porcentagem',NOW(), $id_marca, $id_categoria)";

    if (mysqli_query($conexao, $sql)) {
        // header('Location: index.php');
        $_SESSION['mensagem'] = "Produto cadastrado com sucesso";
        header('Location: inserir.php');
    } else {
        // die("Erro: ".$sql. "<br>" . mysqli_error($conexao));
        $_SESSION['mensagem'] = "Erro ao cadastrar";
        header('Location: inserir.php');
    }
}

if (isset($_POST['atualizar']) && $_POST['atualizar'] == 'atualizar_produto') {
    $codigo = mysqli_real_escape_string($conexao, $_POST['id_produto']);
    $status = mysqli_real_escape_string($conexao, $_POST['status']);
    $descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $preco_venda = str_replace(',', '.', $_POST['venda']);

    $foto = basename($_FILES['foto']['name']);
    $tmp = $_FILES['foto']['tmp_name'];
    $final = "../../images/" . $foto;
    move_uploaded_file($tmp, $final);

    $preco_promocao = str_replace(',', '.', $_POST['preco_promo']);
    $estoque = mysqli_real_escape_string($conexao, $_POST['estoque']);
    $preco_custo = str_replace(',', '.', $_POST['custo']);
    $preco_lucro = mysqli_real_escape_string($conexao, $_POST['lucro']);
    $status_promocao = mysqli_real_escape_string($conexao, $_POST['status_promo']);
    $porcentagem = mysqli_real_escape_string($conexao, $_POST['porcentagem']);
    $id_marca = mysqli_real_escape_string($conexao, $_POST['marca']);
    $id_categoria = mysqli_real_escape_string($conexao, $_POST['categoria']);


    $sql = "UPDATE produto SET descricao = '$descricao', nome = '$nome', preco_venda = '$preco_venda', preco_promocao = '$preco_promocao', estoque = '$estoque', status = $status, preco_custo =  '$preco_custo', lucro = '$preco_lucro', status_promocao = $status_promocao , porcentagem = '$porcentagem', id_marca = $id_marca, id_categoria = $id_categoria";

    if (!empty($foto)) {
        $sql .= " , foto = '$foto'";
    }

    $sql .= " WHERE id_produto = $codigo";

    

    if (mysqli_query($conexao, $sql)) {
       
        header('Location: index.php');
        $_SESSION['mensagem'] = "Produto editado com sucesso";
        header('Location: index.php');
    } else {
        // die("Erro: ".$sql. "<br>" . mysqli_error($conexao));
        $_SESSION['mensagem'] = "Erro ao editar";
        header('Location: inserir.php');
    }
}

if (isset($_POST['deletar_produto'])) {
    $codigo = $_POST['deletar_produto'];

    $sql = "delete from produto where id_produto = $codigo";

    if (mysqli_query($conexao, $sql)) {

        $_SESSION['mensagem'] = "produto excluido com sucesso!";
        header('Location: index.php');
    } else {
        die("Erro: " . $sql . "<br>" . mysqli_error($conexao));
        // $_SESSION['mensagem'] = "Erro ao excluir o produto";
        // header('Location: index.php');
    }
}
