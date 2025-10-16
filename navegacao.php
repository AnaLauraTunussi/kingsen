<header class="header">
    <div class="header-content">
        <div class="logo">
            <a class="navbar-brand" href="index.php">
                <img src="images/kingsen.pnj_page-0001.jpg" height="120" alt="logo">
            </a>
        </div>
        <nav class="nav">
            <ul style="margin-bottom: 0;">
                <li><a href="index.php">Home</a></li>
                 <li class="dropdown">
                    <a href="produtos.php">Categorias</a>
                    <ul class="dropdown-menu">
                        <?php
                        $sql_categoria = "SELECT id_categoria, nome_categoria FROM categoria WHERE status = 1;";
                        $query_categoria = mysqli_query($conexao, $sql_categoria);
                        foreach ($query_categoria as $categoria) {
                            echo '<li><a style="font-family: Gill Sans Extrabold, sans-serif;font-size: 1rem" href="categoria.php?id_categoria= ' . $categoria['id_categoria'] . '">' . $categoria['nome_categoria'] . '</a></li>';
                        }
                        ?>
                    </ul>
                </li>
                <li><a href="produtos.php" style="margin-left: 20px;">Produtos</a></li>
                <li><a href="contato.php" style="margin-left: 20px;">Contato</a></li>
            </ul>
        </nav>
        <form class="form-inline my-2 my-lg-0" action="buscar.php" method="GET">
            <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar" name="busca">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
        </form>
    </div>
</header>