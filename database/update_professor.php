<?php
$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];

include 'connection.php';

if(empty($id)){
  header('location:../listar_professor.php');
}
else{
  $SQL = "UPDATE professor SET nome = :nome, email = :email where idProfessor = ".$id;
  $ALTERAR = $CONNECTION->prepare($SQL);
  $ALTERAR->bindParam(':nome', $nome);
  $ALTERAR->bindParam(':email', $email);

  $RESULT = $ALTERAR->execute();
  header('location:../listar_professor.php');
}
?>
