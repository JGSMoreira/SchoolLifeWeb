<?php
$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];

include (dirname(__FILE__).'\..\connection.php');

if(empty($id)){
  header('location:../../sistema/tipo_atividade/listar.php');
}
else{
  $SQL = "UPDATE tipo_atividade SET nome = :nome where idtipo_atividade = ".$id;
  $ALTERAR = $conn->prepare($SQL);
  $ALTERAR->bindParam(':nome', $nome);

  $RESULT = $ALTERAR->execute();
  header('location:../../sistema/tipo_atividade/listar.php');
}
?>
