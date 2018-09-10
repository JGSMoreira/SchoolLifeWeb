<?php
$id = $_GET['id'];

include 'connection.php';

if(empty($id)){
  header('location:../listar_professor.php');
}
else{
  $SQL = "DELETE FROM professor WHERE idProfessor = :id";
  $ALTERAR = $conn->prepare($SQL);
  $ALTERAR->bindParam(':id', $id);

  $RESULT = $ALTERAR->execute();
  header('location:../sistema/listar_professor.php');
}
?>
