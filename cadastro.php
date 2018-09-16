<?php
if (empty($_POST['user']) || empty($_POST['senha']) || empty($_POST['nome'])){
  header('location: cadastrar.php?erro=Os campos não podem ficar vazios.');
}
else{
  $nome = $_POST['nome'];
  $usuario = $_POST['user'];
  $senha = $_POST['senha'];

  include 'database/connection.php';

  $SQL = 'SELECT nickUsuario FROM usuario WHERE nickUsuario = :nick';
  $RESULT = $conn->prepare($SQL);
  $RESULT->bindParam(':nick', $usuario);
  $RESULT->execute();
  $ROWS = $RESULT->fetch(PDO::FETCH_OBJ);

  if (! $ROWS){
    $SQL2 = "INSERT INTO usuario(nomeUsuario, nickUsuario, senhaUsuario) VALUES(:nome, :nick, :senha)";
    $INSERIR = $conn->prepare($SQL2);
    $INSERIR->bindParam(':nome', $nome);
    $INSERIR->bindParam(':nick', $usuario);
    $INSERIR->bindParam(':senha', $senha);
    $RESULTADO = $INSERIR->execute();
    header('location: logar.php');
  }
  else{
    header('location: cadastrar.php?erro=Usuário já utilizado!');
  }

}
?>
