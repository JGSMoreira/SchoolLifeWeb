<?php
include '../connection.php';
session_start();
//Variáveis recebidas
$nome = $_POST['nome'];
$iduser = $_SESSION['iduser'];

//Insert no Banco de Dados
if (empty($nome)){
  echo '<div class="alert alert-danger" role="alert">Os campos não podem ficar vazios.</div>';
}
else{
  $SQL = "INSERT INTO tipo_atividade(nome, idUserFK) VALUES(:nome, :iduser)";
  $INSERIR = $conn->prepare($SQL);
  $INSERIR->bindParam(':nome', $nome);
  $INSERIR->bindParam(':iduser', $iduser);
  $RESULTADO = $INSERIR->execute();

  if (! $RESULTADO){
    echo '<div class="alert alert-primary" role="alert">Não foi possivel salvar os dados!</div>';
    var_dump($INSERIR->errorInfo());
    exit;
  }
  else{
    echo '<div class="alert alert-primary" role="alert">Tipo de Atividade salva com sucesso!</div>';
    header('location: ../../sistema/tipo_atividade/listar.php');
  }
}

//Fechamento da conexão
$CONNECTION = null;
?>
