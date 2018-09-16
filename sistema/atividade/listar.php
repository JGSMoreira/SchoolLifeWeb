<?php
  $titulo = "School Life";

  session_start();
  $logado = false;
  $mensagem = 'Você não está logado.';

  if (isset($_SESSION['logado']) && $_SESSION['logado']){
    $logado = true;
    $mensagem = 'Bem-vindo, '.$_SESSION['nome'].'.';
  }
  else{
    header('location:/logar.php?erro=Você precisa estar logado para acessar esta tela!');
  }
 ?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $titulo  ?> - Listar Atividades</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/base.css">
  </head>

  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="../painel.php"><?= $titulo  ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link current" href="painel.php">Painel</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cadastrar</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="../professor/cadastrar.php">Professor</a>
              <a class="dropdown-item" href="../materia/cadastrar.php">Matéria</a>
              <a class="dropdown-item" href="../tipo_atividade/cadastrar.php">Tipo de Atividade</a>
              <a class="dropdown-item" href="../atividade/cadastrar.php">Atividade</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Listar</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="../professor/listar.php">Professor</a>
              <a class="dropdown-item" href="../materia/listar.php">Matéria</a>
              <a class="dropdown-item" href="../tipo_atividade/listar.php">Tipo de Atividade</a>
              <a class="dropdown-item" href="../atividade/listar.php">Atividade</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../logout.php">Sair</a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main">

      <div class="jumbotron jumbotron-fluid" id="elefantebot">
        <div class="container">
          <br>
          <h1 class="display-3">Atividades</h1>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-md">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Prioridade</th>
                  <th>Nome</th>
                  <th>Materia</th>
                  <th>Valor</th>
                  <th>Data de Entrega</th>
                  <th>Opções</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  if ($logado){
                    include '../../database/atividade/select.php';
                  }
                  else{
                    echo $mensagem;
                  }
                ?>
              </tbody>
            </table>
            <div class="form-group">
              <a href="cadastrar.php"><button type="button" class="btn btn-primary">Cadastrar nova atividade</button></a>
              <button type="button" class="btn btn-danger" onclick="voltar()">Voltar</button>
            </div>
        </div>
        <hr>
      </div>
    </main>

    <footer class="container">
      <p>School Life | 2018.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script>function voltar() {window.history.back();}</script>
  </body>
</html>
