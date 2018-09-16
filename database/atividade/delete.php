<?php
$id = $_GET['id'];

include '../connection.php';

if(empty($id)){
  header('location:../../sistema/atividade/listar.php');
}
else{
  $SQL = "DELETE FROM atividade WHERE idAtividade = :id";
  $ALTERAR = $conn->prepare($SQL);
  $ALTERAR->bindParam(':id', $id);

  $RESULT = $ALTERAR->execute();
  header('location:../../sistema/atividade/listar.php');
}
?>
