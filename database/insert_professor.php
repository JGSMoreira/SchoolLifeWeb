<?php
include 'connection.php';

//Variáveis recebidas
$nome = $_POST['nome'];
$email = $_POST['email'];

//Insert no Banco de Dados
if (empty($nome) || empty($email)){
  echo '<div class="alert alert-danger" role="alert">Os campos não podem ficar vazios.</div>';
}
else{
  $SQL = "INSERT INTO professor(nome, email) VALUES(:nome, :email)";
  $INSERIR = $conn->prepare($SQL);
  $INSERIR->bindParam(':nome', $nome);
  $INSERIR->bindParam(':email', $email);
  $RESULTADO = $INSERIR->execute();

  if (! $RESULTADO){
    echo '<div class="alert alert-primary" role="alert">Não foi possivel salvar os dados!</div>';
    var_dump($INSERIR->errorInfo());
    exit;
  }
  else{
    echo '<div class="alert alert-primary" role="alert">Pessoa salva com sucesso!</div>';
    header('location:../listar_professor.php');
  }
}

//Fechamento da conexão
$CONNECTION = null;
?>
