<?php

if (!isset($_SESSION)) {
  session_start();
}

?>

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Kingsen - Login</title>

  <!-- BOOTSTRAP CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <!-- CUSTOMIZAÇÃO DO TEMPLATE -->
  <link href="../css/signin.css" rel="stylesheet">

  <!-- FAVICON -->
  <link rel="icon" type="image/x-icon" href="../assets/img/favicon.icon.png">
</head>

<body class="text-center">

  <main class="form-signin">
    <form action="login.php" method="POST">
      <h2 class="h3 mb-3">Faça seu Login</h2>

      <input type="text" class="form-control mb-2" name="usuario" placeholder="Usuário">

      <input type="password" class="form-control" name="senha" placeholder="Senha">

      <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>

    </form>

    <div class="pt-2">
      <?php

      if (isset($_SESSION['loginVazio'])) {

        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">';

        echo $_SESSION['loginVazio'];

        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';

        unset($_SESSION['loginVazio']);
      }

      if (isset($_SESSION['loginErro'])) {

        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">';

        echo $_SESSION['loginErro'];

        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';

        unset($_SESSION['loginErro']);
      }

      if (isset($_SESSION['nAutorizada'])) {

        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">';

        echo $_SESSION['nAutorizada'];

        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';

        unset($_SESSION['nAutorizada']);
      }

      if (isset($_SESSION['logOff'])) {

        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';

        echo $_SESSION['logOff'];

        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';

        unset($_SESSION['logOff']);
      }

      ?>
    </div>

    <p class="mt-5 text-muted">&copy; <?= date('Y') ?></p>
  </main>

  <!-- BOOTSTRAP JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>