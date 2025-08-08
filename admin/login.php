<?php 

require_once '../conexao/conecta.php';

if(!isset($_SESSION))
{
    session_start();
}

if(isset($_POST['usuario']) && $_POST['usuario'] != '' && isset($_POST['senha']) && $_POST['senha'] != '')
{
    $usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

    $sql = "select * from funcionario where usuario = '$usuario' and senha = '$senha'";
    $query = mysqli_query($conexao, $sql);
    $funcionario = mysqli_fetch_assoc($query);

    // echo $funcionario['usuario'];
    // echo $funcionario['senha'];
    // echo $funcionario['tipo_acesso'];

    if(isset($funcionario))
    {
        $_SESSION['ID'] = $funcionario['id_funcionario'];
        $_SESSION['USER'] = $funcionario['usuario'];
        $_SESSION['TYPE'] = $funcionario['tipo_acesso'];
        $_SESSION['NAME'] = $funcionario['nome'];

        header('location: admin.php');
    }
    else
    {
        $_SESSION['loginErro'] = 'Usuário ou senha inválidos';
        header('Location: index.php');
    }

    
}
else
{
    $_SESSION['loginVazio'] = 'Informar o usuário e a senha';
    header('Location: index.php');
}

?>