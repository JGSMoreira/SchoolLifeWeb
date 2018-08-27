<?php
  $titulo = "School Life";
 ?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $titulo  ?> - Página Inicial</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  </head>

  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#"><?= $titulo  ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Início <span class="sr-only">(atual)</span></a>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cadastrar</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Professor</a>
              <a class="dropdown-item" href="#">Matéria</a>
              <a class="dropdown-item" href="#">Tipo de Atividade</a>
              <a class="dropdown-item" href="#">Atividade</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Listar</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Professor</a>
              <a class="dropdown-item" href="#">Matéria</a>
              <a class="dropdown-item" href="#">Tipo de Atividade</a>
              <a class="dropdown-item" href="#">Atividade</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main">

      <div class="jumbotron">
        <div class="container">
          <br>
          <h1 class="display-3">Bem-vindo ao School Life!</h1>
          <p>Esta é a versão web do gerenciador de atividades com o mesmo nome.</p>
          <p><a class="btn btn-primary btn-lg" href="#" role="button">Acessar &raquo;</a></p>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-md">
            <h2>Simples e fácil</h2>
            <p>A versão web do School Life é ainda mais simples e completa que o antigo software. Ela mantém as funções originais com melhorias e adiciona novas para ajudar com seus estudos!</p>
          </div>
        </div>
        <hr>
      </div>
    </main>

    <footer class="container">
      <p>School Life | Continuação do projeto de 2017.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  </body>
</html>
