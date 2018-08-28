<?php
$id = $_GET['id'];
include 'connection.php';

if(empty($id)){
  header('location:listar_professor.php');
}
else{
  $SQL = "SELECT nome, email FROM professor where idProfessor = ".$id;
  $RESULT = $conn->query($SQL);

  $ROWS = $RESULT->fetch(PDO::FETCH_OBJ);
  $nome = $ROWS->nome;
  $email = $ROWS->email;
}
?>
