<?php
require_once '../../conexao/conecta.php';

include_once '../usuario_comum.php';

# FILTROS #
$sexo = $_POST['sexo']?? '';
$status = $_POST['status']?? '';

// CAMPO DE BUSCA POR NOME 
$nome = mysqli_real_escape_string($conexao, $_POST['nome']?? '');


?>

<table class="table">
    <?php
    $sql = "SELECT * FROM cliente where 1=1";
    if (!empty($sexo)) {
        $sql .= " AND cliente.sexo = '$sexo'";
    }

    //FILTRO POR STATUS
    if ($status != '') {
        $sql .= " AND cliente.status = $status";
    }

    //PESQUISA NOME
    if ($nome != '') {
        $sql .= " AND cliente.nome LIKE '%$nome%'";
    }
    $query = mysqli_query($conexao, $sql);
    if (mysqli_num_rows($query) > 0) {
    ?>
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Sexo</th>
                <th>Data Nascimento</th>
                <th>Celular</th>
                <th>Usuário</th>
                <th>Data do cadastro</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            <?php

            foreach ($query as $cliente) {

            ?>
                <tr>
                    <td><?php echo $cliente['id_cliente'] ?></td>
                    <td><?php
                        if ($cliente['nome_social'] != "") {
                            echo $cliente['nome_social'];
                        } else {

                            echo $cliente['nome'];
                        }
                        ?></td>
                    <td><?php echo $cliente['sexo'] ?></td>
                    <td><?php echo date('d/m/Y', strtotime($cliente['data_nasc'])) ?></td>
                    <td><?php echo $cliente['tel_cell'] ?></td>
                    <td><?php echo $cliente['login'] ?></td>
                    <td><?php echo date('d/m/Y', strtotime($cliente['data_cadastro'])) ?></td>
                    <td>
                        <a href="editar.php?id_cliente=<?php echo $cliente['id_cliente'] ?>" title="Editar" class="btn btn-outline-success btn-sm">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="acoes.php" method="post" class="d-inline">
                            <button type="submit" title="Excluir" class="btn btn-outline-danger btn-sm" name="deletar_cliente" value="<?php echo $cliente['id_cliente'] ?>" onclick="return confirm('Tem certeza que deseja excluir?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            <?php
            };
            ?>
        </tbody>
    <?php
    } else {
        echo '<h5>Nenhum cliente encontrado!</h5>';
    }
    ?>
</table>