<?php
session_start();

if (empty($_POST['user']) || empty($_POST['senha'])){
  header('location: logar.php?erro=Os campos não podem ficar vazios.');
}
else{
  $usuario = $_POST['user'];
  $senha = $_POST['senha'];

  include 'database/connection.php';
  $SQL = 'SELECT * FROM usuario WHERE nickUsuario = :nick and senhaUsuario = :senha';
  $RESULT = $conn->prepare($SQL);
  $RESULT->bindParam(':nick', $usuario);
  $RESULT->bindParam(':senha', $senha);
  $RESULT->execute();
  $ROWS = $RESULT->fetch(PDO::FETCH_OBJ);

  if (($usuario == $ROWS->nickUsuario) && ($senha == $ROWS->senhaUsuario)){
    $_SESSION['logado'] = true;
    $_SESSION['nome'] = $ROWS->nomeUsuario;
    $_SESSION['iduser'] = $ROWS->idUsuario;

    header('location: sistema/admin.php');
  }
  else{
    header('location: logar.php?erro=Usuário ou senha inválidos!');
  }
}
?>
