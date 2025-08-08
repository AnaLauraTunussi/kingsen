<?php
require_once '../../conexao/conecta.php';

include_once'../usuario_admin.php';

# FILTROS #
$status = $_POST['status'] ?? '';
// CAMPO DE BUSCA POR NOME 
$nome = mysqli_real_escape_string($conexao, $_POST['nome'] ?? '') ;

?>
<table class="table table-hover table-dark">
  <?php
  $sql = "SELECT * FROM cargo where 1=1";

  if ($status != '') {
    $sql .= " AND cargo.status = $status";
  }
  if ($nome != '') {
    $sql .= " AND cargo.nome_cargo LIKE '%$nome%'";
  }
  // ela execulta a classe conexão depois o comando do banco
  $query = mysqli_query($conexao, $sql);
  // se a contagem de linhas da variavel for maior que 0
  if (mysqli_num_rows($query) > 0) {
  ?>
    <thead>
      <tr>
        <th>#</th>
        <th>Nome do cargo</th>
        <th>Observação</th>
        <th>Status</th>
        <th>Data Cadastro</th>
        <th>Ações</th>
      </tr>
    </thead>

    <tbody>
      <?php
      // para cada retorno de linha que minha variavel query tiver, transforme ela na minha arrey associativa
      foreach ($query as $cargo) {

      ?>
        <tr>
          <td><?php echo $cargo['id_cargo'] ?></td>
          <td><?php echo $cargo['nome_cargo'] ?></td>
          <td><?php echo $cargo['observacao'] ?></td>
          <td><?php
              if ($cargo['status'] == 1) {
                echo '<span class="badge badge-success">Ativo</span>';
              } else {
                echo '<span class="badge badge-warning">Inativo</span>';
              }
              ?></td>
          <td><?php echo date('d/m/Y', strtotime($cargo['data_cadastro'])) ?></td>
          <td>
            <a href="editar.php?id_cargo=<?php echo $cargo['id_cargo'] ?>" title="Editar" class="btn btn-outline-success btn-sm">
              <i class="bi bi-pencil"></i>
            </a>
            <!-- <a href="excluir.php?id_cargo=<?php echo $cargo['id_cargo'] ?>" title="Excluir" class="btn btn-outline-danger btn-sm">
              <i class="bi bi-trash"></i>
            </a> -->
            <form action="acoes.php" method="post" class="d-inline">
              <button type="submit" title="Excluir" class="btn btn-outline-danger btn-sm" name="deletar_cargo" value="<?php echo $cargo['id_cargo'] ?>" onclick="return confirm('Tem certeza que deseja excluir?')">
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