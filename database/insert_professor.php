<?php
include 'connection.php';
session_start();
//Variáveis recebidas
$nome = $_POST['nome'];
$email = $_POST['email'];
$iduser = $_SESSION['iduser'];

//Insert no Banco de Dados
if (empty($nome) || empty($email)){
  echo '<div class="alert alert-danger" role="alert">Os campos não podem ficar vazios.</div>';
}
else{
  $SQL = "INSERT INTO professor(nome, email, idUserFK) VALUES(:nome, :email, :iduser)";
  $INSERIR = $conn->prepare($SQL);
  $INSERIR->bindParam(':nome', $nome);
  $INSERIR->bindParam(':email', $email);
  $INSERIR->bindParam(':iduser', $iduser);
  $RESULTADO = $INSERIR->execute();

  if (! $RESULTADO){
    echo '<div class="alert alert-primary" role="alert">Não foi possivel salvar os dados!</div>';
    var_dump($INSERIR->errorInfo());
    exit;
  }
  else{
    echo '<div class="alert alert-primary" role="alert">Pessoa salva com sucesso!</div>';
    header('location: ../sistema/listar_professor.php');
  }
}

//Fechamento da conexão
$CONNECTION = null;
?>
