<?php
$id = $_POST['id'];
$nome = $_POST['nome'];
$valor = $_POST['valor'];
$data = $_POST['data'];
$prioridade = $_POST['prioridade'];
$situacao = $_POST['situacao'];
$materia = $_POST['materia'];
$tipo = $_POST['tipo_atividade'];

session_start();
$logado = false;
$mensagem = 'Você não está logado.';
if (isset($_SESSION['logado']) && $_SESSION['logado']){
  $logado = true;
  $mensagem = 'Bem-vindo, '.$_SESSION['nome'].'.';
}

include (dirname(__FILE__).'\..\connection.php');

if(empty($id)){
  header('location:../../sistema/atividade/listar.php');
}
else{

  $RESULT = $conn->prepare('SELECT idTipo_Atividade FROM tipo_atividade WHERE nome = :nome AND idUserFK = :iduser');
  $RESULT->bindParam(':nome', $tipo);
  $RESULT->bindParam(':iduser', $_SESSION['iduser']);
  $RESULT->execute();
  $ROWS = $RESULT->fetch(PDO::FETCH_OBJ);
  $tipo = $ROWS->idTipo_Atividade;

  $RESULT = $conn->prepare('SELECT idMateria FROM materia WHERE nome = :nome AND idUserFK = :iduser');
  $RESULT->bindParam(':nome', $tipo);
  $RESULT->bindParam(':iduser', $_SESSION['iduser']);
  $RESULT->execute();
  $ROWS = $RESULT->fetch(PDO::FETCH_OBJ);
  $materia = $ROWS->idMateria;

  $SQL = "UPDATE atividade SET nome = :nome, data_entrega = :data, prioridade = :prioridade, pontuacao = :valor, situacao = :situacao, idTipo_AtividadeFK = :tipo, idMateriaFK = :materia  WHERE idAtividade = ".$id;
  $ALTERAR = $conn->prepare($SQL);
  $ALTERAR->bindParam(':nome', $nome);
  $ALTERAR->bindParam(':data', $data);
  $ALTERAR->bindParam(':prioridade', $prioridade);
  $ALTERAR->bindParam(':valor', $valor);
  $ALTERAR->bindParam(':situacao', $situacao);
  $ALTERAR->bindParam(':tipo', $tipo);
  $ALTERAR->bindParam(':materia', $materia);
  $RESULT = $ALTERAR->execute();

  header('location:../../sistema/atividade/listar.php');
}
?>
