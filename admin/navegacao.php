<?php 

$url_completa = $_SERVER['REQUEST_URI'];

$url_dividida = parse_url($url_completa);

$caminho = explode('/', $url_dividida['path']);

$url = "http://" .$_SERVER['HTTP_HOST']. "/" .$caminho[1] . "/".$caminho[2]. "/";

?>

<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3">
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>OPÇÕES</span>
    </h6>
    
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $url?>admin/admin.php">
          <i class="bi bi-house-door-fill"></i>
          Início
        </a>
      </li>

      <?php if($_SESSION['TYPE'] == '1') {?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $url?>cargos/">
          <i class="bi bi-person-fill-gear"></i>
          Cargos
        </a>
      </li>
      <?php }?>  

      <?php if($_SESSION['TYPE'] == '1') {?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $url?>funcionario/">
          <i class="bi bi-people-fill"></i>
          Funcionários
        </a>
      </li>
      <?php }?>
      
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $url?>categoria/">
          <i class="bi bi-stack"></i>
          Categorias
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo $url?>marcas/">
          <i class="bi bi-bag-fill"></i>
          Marcas
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $url?>produtos/">
          <i class="bi bi-archive-fill"></i>
          Produtos
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo $url?>cliente/">
        <i class="bi bi-person-circle"></i>
          Clientes
        </a>
      </li>
    </ul>
  </div>
</nav>