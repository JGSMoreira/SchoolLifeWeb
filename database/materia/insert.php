<?php
include '../connection.php';
session_start();
//Variáveis recebidas
$nome = $_POST['nome'];
$prof = $_POST['professor'];
$iduser = $_SESSION['iduser'];
//Insert no Banco de Dados
if (empty($nome) || empty($prof)){
  echo '<div class="alert alert-danger" role="alert">Os campos não podem ficar vazios.</div>';
}
else{
  $SQL = 'SELECT idProfessor FROM professor WHERE nome = :nome AND idUserFK = :iduser';
  $RESULT = $conn->prepare($SQL);
  $RESULT->bindParam(':iduser', $iduser);
  $RESULT->bindParam(':nome', $prof);
  $RESULT->execute();
  $ROWS = $RESULT->fetch(PDO::FETCH_OBJ);

  $profid = $ROWS->idProfessor;
  if ($ROWS){
    $SQL = "INSERT INTO materia(nome, idProfessorFK, idUserFK) VALUES(:nome, :prof, :iduser)";
    $INSERIR = $conn->prepare($SQL);
    $INSERIR->bindParam(':nome', $nome);
    $INSERIR->bindParam(':prof', $profid);
    $INSERIR->bindParam(':iduser', $iduser);
    $RESULTADO = $INSERIR->execute();

    if (! $RESULTADO){
      echo '<div class="alert alert-primary" role="alert">Não foi possivel salvar os dados!</div>';
      var_dump($INSERIR->errorInfo());
      exit;
    }
    else{
      echo '<div class="alert alert-primary" role="alert">Pessoa salva com sucesso!</div>';
      header('location: ../../sistema/materia/listar.php');
    }
  }
}

//Fechamento da conexão
$CONNECTION = null;
?>
