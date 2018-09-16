<?php
  $titulo = "School Life";
    include (dirname(__FILE__).'/../../database/atividade/selectupdate.php');
  session_start();
  $logado = false;
  $mensagem = 'Você não está logado.';

  if (isset($_SESSION['logado']) && $_SESSION['logado']){
    $logado = true;
    $mensagem = 'Bem-vindo, '.$_SESSION['nome'].'.';
  }
 ?>

 <!doctype html>
 <html lang="pt-br">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <title><?= $titulo  ?> - Cadastrar Atividade</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
     <link rel="stylesheet" href="/css/base.css">
   </head>

   <body>
     <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
       <a class="navbar-brand" href="index.php"><?= $titulo  ?></a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>

       <div class="collapse navbar-collapse">
         <ul class="navbar-nav mr-auto">
           <li class="nav-item">
             <a class="nav-link" href="../painel.php">Painel</a>
           </li>
           <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cadastrar</a>
             <div class="dropdown-menu" aria-labelledby="dropdown01">
               <a class="dropdown-item" href="../professor/cadastrar.php">Professor</a>
               <a class="dropdown-item" href="cadastrar.php">Matéria</a>
               <a class="dropdown-item" href="../tipo_atividade/cadastrar.php">Tipo de Atividade</a>
               <a class="dropdown-item" href="../atividade/cadastrar.php">Atividade</a>
             </div>
           </li>
           <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Listar</a>
             <div class="dropdown-menu" aria-labelledby="dropdown01">
               <a class="dropdown-item" href="../professor/listar.php">Professor</a>
               <a class="dropdown-item" href="listar.php">Matéria</a>
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

       <div class="jumbotron jumbotron-fluid" id="elefantebot">
         <div class="container">
           <br>
           <h1 class="display-3">Editar Atividade</h1>
         </div>
       </div>

       <main role="main">

       <div class="container">
         <div class="row">
           <div class="col-md">
             <form class="" action="../../database/atividade/update.php" method="post">
               <div class="form-group">
                 <div class="row">
                   <div class="col">
                     <label for="nome">Nome</label>
                     <input type="text" class="form-control" name="nome" value="<?=$nome ?>" placeholder="Digite o nome da Atividade">
                   </div>
                   	<div class="col">
                       <label for="valor">Valor</label>
                       <input type="text" class="form-control" name="valor" value="<?=$valor ?>" placeholder="Digite o valor da Atividade">
                     </div>
                     <div class="col">
                       <label for="data" class="texto">Data de Entrega</label>
                      	<input type="date" class="form-control" name="data" value="<?=$data ?>">
                     </div>
                  </div>
               </div>
               <div class="form-group">
                 <div class="row">
                   <div class="col">
                     <label>Prioridade (atual)</label>
                     <input type="text" class="form-control" name="" value="<?=$prioridade ?>" readonly>
                   </div>
                   <div class="col">
                     <label>Situação (atual)</label>
                     <input type="text" class="form-control" name="" value="<?=$situacao ?>" readonly>
                   </div>
                 </div>
               </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col">
                      <label for="prioridade">Prioridade</label>
                      <select class="form-control" name="prioridade">
                        <option>Baixa</option>
                        <option>Média</option>
                        <option>Alta</option>
                        <option>Extrema</option>
                      </select>
                    </div>
                    <div class="col">
                      <label for="situacao">Situação</label>
                      <select class="form-control" name="situacao">
                        <option>A fazer</option>
                        <option>Fazendo</option>
                        <option>Entregue</option>
                        <option>Atrasada</option>
                        <option>Não feita</option>
                      </select>
                    </div>
                  </div>
                 </div>
                 <div class="form-group">
                   <div class="row">
                     <div class="col">
                       <label>Matéria (atual)</label>
                       <input type="text" class="form-control" name="" value="<?=$materia ?>" readonly>
                     </div>
                     <div class="col">
                       <label>Tipo de Atividade (atual)</label>
                       <input type="text" class="form-control" name="" value="<?=$tipo ?>" readonly>
                     </div>
                   </div>
                 </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col">
                      <label for="materia" class="texto">Matéria</label>
                      <select class="form-control" name="materia">
                        <?php
                          if ($logado){
                            include '../../database/atividade/select_materia.php';
                          }
                          else{
                            echo $mensagem;
                          }
                        ?>
                       </select>
                    </div>
                    <div class="col">
                      <label for="tipo_atividade" class="texto">Tipo de atividade</label>
                      <select class="form-control" name="tipo_atividade">
                        <?php
                          if ($logado){
                            include '../../database/atividade/select_tipo_atividade.php';
                          }
                          else{
                            echo $mensagem;
                          }
                        ?>
                       </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Cadastrar</button>
                  <button type="button" class="btn btn-danger" onclick="voltar()">Cancelar</button>
                </div>
             </form>
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

     <script>function voltar() {window.history.back();}</script>
   </body>
 </html>
