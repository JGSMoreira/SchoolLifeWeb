<?php
$id = $_GET['id'];
include (dirname(__FILE__).'\..\connection.php');

if(empty($id)){
  header('location:../materia/listar.php');
}
else{
  $SQL = "SELECT * FROM materia where idMateria = ".$id;
  $RESULT = $conn->query($SQL);
  $ROWS = $RESULT->fetch(PDO::FETCH_OBJ);
  $nome = $ROWS->nome;

  $RESULT = $conn->prepare('SELECT nome FROM professor WHERE idProfessor = :id');
  $RESULT->bindParam(':id', $ROWS->idProfessorFK);
  $RESULT->execute();
  $ROWS = $RESULT->fetch(PDO::FETCH_OBJ);

  $nomeprof = $ROWS->nome;
}
?>
