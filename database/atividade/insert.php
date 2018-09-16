<?php
include '../connection.php';
session_start();
//Variáveis recebidas
$nome = $_POST['nome'];
$valor = $_POST['valor'];
$data = $_POST['data'];
$prioridade = $_POST['prioridade'];
$situacao = $_POST['situacao'];
$materia = $_POST['materia'];
$tipoatividade = $_POST['tipo_atividade'];
$iduser = $_SESSION['iduser'];
//Insert no Banco de Dados
if (empty($nome) || empty($valor) || empty($data) || empty($prioridade) || empty($situacao) || empty($materia)){
  echo '<div class="alert alert-danger" role="alert">Os campos não podem ficar vazios.</div>';
}
else{
  $SQL = 'SELECT idMateria FROM materia WHERE nome = :nome AND idUserFK = :iduser';
  $RESULT = $conn->prepare($SQL);
  $RESULT->bindParam(':iduser', $iduser);
  $RESULT->bindParam(':nome', $materia);
  $RESULT->execute();
  $ROWS = $RESULT->fetch(PDO::FETCH_OBJ);

  $Mateid = $ROWS->idMateria;

  $SQL = 'SELECT idtipo_atividade FROM tipo_atividade WHERE nome = :nome AND idUserFK = :iduser';
  $RESULT = $conn->prepare($SQL);
  $RESULT->bindParam(':iduser', $iduser);
  $RESULT->bindParam(':nome', $tipoatividade);
  $RESULT->execute();
  $ROWS = $RESULT->fetch(PDO::FETCH_OBJ);

  $tipoatividadeid = $ROWS->idtipo_atividade;

  if ($ROWS){
    $SQL = "INSERT INTO atividade(nome, data_entrega, prioridade, pontuacao, situacao, idTipo_AtividadeFK, idMateriaFK, idUserFK) VALUES(:nome, :data, :prio, :pontuacao, :situ, :tipo, :materia, :user)";
    $INSERIR = $conn->prepare($SQL);
    $INSERIR->bindParam(':nome', $nome);
    $INSERIR->bindParam(':data', $data);
    $INSERIR->bindParam(':prio', $prioridade);
    $INSERIR->bindParam(':pontuacao', $valor);
    $INSERIR->bindParam(':situ', $situacao);
    $INSERIR->bindParam(':tipo', $tipoatividadeid);
    $INSERIR->bindParam(':materia', $Mateid);
    $INSERIR->bindParam(':user', $iduser);
    $RESULTADO = $INSERIR->execute();

    if (! $RESULTADO){
      echo '<div class="alert alert-primary" role="alert">Não foi possivel salvar os dados!</div>';
      var_dump($INSERIR->errorInfo());
      exit;
    }
    else{
      echo '<div class="alert alert-primary" role="alert">Pessoa salva com sucesso!</div>';
      header('location: ../../sistema/atividade/listar.php');
    }
  }
}

//Fechamento da conexão
$CONNECTION = null;
?>
