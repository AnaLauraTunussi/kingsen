 <?php
    require_once '../../conexao/conecta.php';

    include_once '../usuario_comum.php';

    # FILTROS #
    $categoria = $_POST['categoria']?? '';
    $marca = $_POST['marca']?? '';
    $status = $_POST['status']?? '';

    // CAMPO DE BUSCA POR NOME 
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']?? '');

    ?>
 <table class="table">
     <?php
        $sql = "SELECT produto.id_produto,produto.foto,produto.nome,produto.preco_venda,produto.estoque,produto.status,categoria.nome_categoria,marca.nome_marca FROM produto join categoria on produto.id_categoria=categoria.id_categoria join marca on produto.id_marca=marca.id_marca where 1=1";


        if (!empty($categoria)) {
            $sql .= " AND produto.id_categoria = '$categoria'";
        }

        if (!empty($marca)) {
            $sql .= " AND produto.id_marca = '$marca'";
        }

        if ($status != '') {
            $sql .= " AND produto.status = $status";
        }

        if (!empty($nome)) {
            $sql .= " AND (produto.nome LIKE '%$nome%')";
        }

        $query = mysqli_query($conexao, $sql);
        if (mysqli_num_rows($query) > 0) {
        ?>
         <thead>
             <tr>
                 <th>#</th>
                 <th>Nome</th>
                 <th>Marca</th>
                 <th>Categoria</th>
                 <th>Preço</th>
                 <th>Quantidade</th>
                 <th>Status</th>
                 <th>Ações</th>
             </tr>
         </thead>

         <tbody>
             <?php

                foreach ($query as $produto) {

                ?>
                 <tr>
                     <td><?php echo $produto['id_produto'] ?></td>
                     <td><?php echo $produto['nome'] ?></td>
                     <td><?php echo $produto['nome_marca'] ?></td>
                     <td><?php echo $produto['nome_categoria'] ?></td>
                     <td><?php echo $produto['preco_venda'] ?></td>
                     <td><?php echo $produto['estoque'] ?></td>
                     <td><?php
                            if ($produto['status'] == 1) {
                                echo '<span class="badge badge-success">Ativo</span>';
                            } else {
                                echo '<span class="badge badge-warning">Inativo</span>';
                            }
                            ?></td>
                     <td>
                         <a href="editar.php?id_produto=<?php echo $produto['id_produto'] ?>" title="Editar" class="btn btn-outline-success btn-sm">
                             <i class="bi bi-pencil"></i>
                         </a>
                         <form action="acoes.php" method="post" class="d-inline">
                            <button type="submit" title="Excluir" class="btn btn-outline-danger btn-sm" name="deletar_produto" value="<?php echo $produto['id_produto'] ?>" onclick="return confirm('Tem certeza que deseja excluir?')">
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
            echo '<h5>Nenhum produto encontrado!</h5>';
        }
        ?>
 </table>