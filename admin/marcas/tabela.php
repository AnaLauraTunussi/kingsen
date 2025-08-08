<?php
require_once '../../conexao/conecta.php';

include_once '../usuario_comum.php';

# FILTROS #
$status = $_POST['status']?? '';
// CAMPO DE BUSCA POR NOME 
$nome = mysqli_real_escape_string($conexao, $_POST['nome']?? '');


?>
<table class="table">
    <?php
    $sql = "SELECT * FROM marca where 1=1";

    if ($status != '') {
        $sql .= " AND marca.status = $status";
    }
    if ($nome != '') {
        $sql .= " AND marca.nome_marca LIKE '%$nome%'";
    }
    // ela execulta a classe conexão depois o comando do banco
    $query = mysqli_query($conexao, $sql);
    // se a contagem de linhas da variavel for maior que 0
    if (mysqli_num_rows($query) > 0) {
    ?>
        <thead>
            <tr>
                <th>#</th>
                <th>Marca</th>
                <th>Descrição</th>
                <th>Data Cadastro</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            <?php
            foreach ($query as $marca) {

            ?>
                <tr>
                    <td><?php echo $marca['id_marca'] ?></td>
                    <td><?php echo $marca['nome_marca'] ?></td>
                    <td><?php echo $marca['descricao'] ?></td>
                    <td><?php echo date('d/m/Y', strtotime($marca['data_cadastro'])) ?></td>
                    <td><?php
                        if ($marca['status'] == 1) {
                            echo '<span class="badge badge-success">Ativo</span>';
                        } else {
                            echo '<span class="badge badge-warning">Inativo</span>';
                        }
                        ?></td>
                    <td>
                        <a href="editar.php?id_marca=<?php echo $marca['id_marca'] ?>" title="Editar" class="btn btn-outline-success btn-sm">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="acoes.php" method="post" class="d-inline">
                            <button type="submit" title="Excluir" class="btn btn-outline-danger btn-sm" name="deletar_marca" value="<?php echo $marca['id_marca'] ?>" onclick="return confirm('Tem certeza que deseja excluir?')">
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
        echo '<h5>Nenhum registro encontrado!</h5>';
    }
    ?>
</table>