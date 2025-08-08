<?php
require_once '../../conexao/conecta.php';

include_once'../usuario_admin.php';

# FILTROS #
$sexo = $_POST['sexo']?? '';
$status = $_POST['status']?? '';
$cargo = $_POST['cargo']?? '';

// CAMPO DE BUSCA POR NOME 
$nome = mysqli_real_escape_string($conexao, $_POST['nome']?? '');


?>
<table class="table">
    <?php
    $sql = "SELECT funcionario.id_funcionario, funcionario.foto, funcionario.nome,funcionario.sexo,funcionario.data_nasc,funcionario.telef_celular,funcionario.usuario,funcionario.data_cadastro,funcionario.nome_social,funcionario.status, cargo.nome_cargo FROM funcionario JOIN cargo ON funcionario.id_cargo=cargo.id_cargo where 1=1";

    // FILTRO DE SEXO
    if (!empty($sexo)) {
        $sql .= " AND funcionario.sexo = '$sexo'";
    }

    //FILTRO POR STATUS
    if ($status != '') {
        $sql .= " AND funcionario.status = $status";
    }

    //FILTRO DE CARGO
    if (!empty($cargo)) {
        $sql .= " AND funcionario.id_cargo = '$cargo'";
    }

    //PESQUISA NOME

    if (!empty($nome)) {
        $sql .= " AND (funcionario.nome_social LIKE '%$nome%' OR funcionario.nome like '%$nome%')";
    }
    $query = mysqli_query($conexao, $sql);
    if (mysqli_num_rows($query) > 0) {
    ?>
        <thead>
            <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Nome</th>
                <th>Cargo</th>
                <th>Sexo</th>
                <th>Data Nascimento</th>
                <th>Celular</th>
                <th>Usuário</th>
                <th>Data do cadastro</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            <?php

            foreach ($query as $funcionario) {

            ?>
                <tr>
                    <td><?php echo $funcionario['id_funcionario'] ?></td>
                    <td><?php
                        if ($funcionario['foto'] != '') {
                            echo '<img src="../../images/' . $funcionario['foto'] . '" alt="" class="rounded-circle" width="40" height="40"/>';
                        } else {
                            echo '<img src="../../assets/img/placeholder-funcionario.png" alt="" class="rounded-circle" width="40" height="40"/>';
                        }


                        ?></td>
                    <td><?php
                        if ($funcionario['nome_social'] != "") {
                            echo $funcionario['nome_social'];
                        } else {

                            echo $funcionario['nome'];
                        }
                        ?></td>
                    <td><?php echo $funcionario['nome_cargo'] ?></td>
                    <td><?php echo $funcionario['sexo'] ?></td>
                    <td><?php echo date('d/m/Y', strtotime($funcionario['data_nasc'])) ?></td>
                    <td><?php echo $funcionario['telef_celular'] ?></td>
                    <td><?php echo $funcionario['usuario'] ?></td>
                    <td><?php echo date('d/m/Y', strtotime($funcionario['data_cadastro'])) ?></td>
                    <td><?php
                        if ($funcionario['status'] == 1) {
                            echo '<span class="badge badge-success">Ativo</span>';
                        } else {
                            echo '<span class="badge badge-warning">Inativo</span>';
                        }
                        ?></td>
                    <td>
                        <a href="editar.php?id_funcionario=<?php echo $funcionario['id_funcionario'] ?>" title="Editar" class="btn btn-outline-success btn-sm">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <?php if($_SESSION['TYPE'] == '1') {?>
                        <form action="acoes.php" method="post" class="d-inline">
                            <button type="submit" title="Excluir" class="btn btn-outline-danger btn-sm" name="deletar_funcionario" value="<?php echo $funcionario['id_funcionario'] ?>" onclick="return confirm('Tem certeza que deseja excluir?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                        <?php }?>
                    </td>
                </tr>
            <?php
            };
            ?>
        </tbody>
    <?php
    } else {
        echo '<h5>Nenhum funcionario encontrado!</h5>';
    }
    ?>
</table>