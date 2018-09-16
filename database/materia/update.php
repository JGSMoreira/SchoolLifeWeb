<?php
$id = $_POST['id'];
$nome = $_POST['nome'];
$professor = $_POST['novoprof'];

session_start();
$logado = false;
$mensagem = 'Você não está logado.';
if (isset($_SESSION['logado']) && $_SESSION['logado']){
  $logado = true;
  $mensagem = 'Bem-vindo, '.$_SESSION['nome'].'.';
}

include (dirname(__FILE__).'\..\connection.php');

if(empty($id)){
  header('location:../../sistema/materia/listar.php');
}
else{

  $RESULT = $conn->prepare('SELECT idProfessor FROM professor WHERE nome = :nome AND idUserFK = :iduser');
  $RESULT->bindParam(':nome', $professor);
  $RESULT->bindParam(':iduser', $_SESSION['iduser']);
  $RESULT->execute();
  $ROWS = $RESULT->fetch(PDO::FETCH_OBJ);
  $profid = $ROWS->idProfessor;

  $SQL = "UPDATE materia SET nome = :nome, idProfessorFK = :professor WHERE idMateria = ".$id;
  $ALTERAR = $conn->prepare($SQL);
  $ALTERAR->bindParam(':nome', $nome);
  $ALTERAR->bindParam(':professor', $profid);
  $RESULT = $ALTERAR->execute();

  header('location:../../sistema/materia/listar.php');
}
?>
