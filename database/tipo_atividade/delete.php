<?php
$id = $_GET['id'];

include '../connection.php';

if(empty($id)){
  header('location:../../sistema/tipo_atividade/listar.php');
}
else{
  $SQL = "DELETE FROM tipo_atividade WHERE idtipo_atividade = :id";
  $ALTERAR = $conn->prepare($SQL);
  $ALTERAR->bindParam(':id', $id);

  $RESULT = $ALTERAR->execute();
  header('location:../../sistema/tipo_atividade/listar.php');
}
?>
