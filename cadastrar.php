<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>School Life - Cadastro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/login.css">
  </head>

  <body class="text-center">
    <form class="form-signin" action="cadastro.php" method="post">
      <img class="mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Cadastro - School Life</h1>
      <label for="nome" class="sr-only">Nome</label>
      <input type="texto" name="nome" class="form-control" placeholder="Nome" required autofocus>
      <label for="user" class="sr-only">Usuário</label>
      <input type="texto" name="user" class="form-control" placeholder="Usuário" required>
      <label for="senha" class="sr-only">Senha</label>
      <input type="password" name="senha" class="form-control" placeholder="Senha" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Cadastrar-se</button>
      <a href="logar.php">Já é cadastrado? Faça login.</a>
      <br>
      <?php
        if (isset($_GET['erro'])){
          echo '<div class="alert alert-danger" role="alert">';
          echo $_GET['erro'];
          echo '</div>';
        }
      ?>
    </form>
  </body>
</html>
