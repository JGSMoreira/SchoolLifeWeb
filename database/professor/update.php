<?php
$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];

include (dirname(__FILE__).'\..\connection.php');

if(empty($id)){
  header('location:../../sistema/professor/listar.php');
}
else{
  $SQL = "UPDATE professor SET nome = :nome, email = :email where idProfessor = ".$id;
  $ALTERAR = $conn->prepare($SQL);
  $ALTERAR->bindParam(':nome', $nome);
  $ALTERAR->bindParam(':email', $email);

  $RESULT = $ALTERAR->execute();
  header('location:../../sistema/professor/listar.php');
}
?>
