<?php
$id = $_GET['id'];
include (dirname(__FILE__).'\..\connection.php');

if(empty($id)){
  header('location:../materia/listar.php');
}
else{
  $SQL = "SELECT * FROM atividade where idAtividade = ".$id;
  $RESULT = $conn->query($SQL);
  $ROWS = $RESULT->fetch(PDO::FETCH_OBJ);
  $nome = $ROWS->nome;
  $valor = $ROWS->pontuacao;
  $data = $ROWS->data_entrega;
  $prioridade = $ROWS->prioridade;
  $situacao = $ROWS->situacao;

  $idTipo = $ROWS->idTipo_AtividadeFK;
  $idMateria = $ROWS->idMateriaFK;

  $RESULT = $conn->prepare('SELECT nome FROM materia WHERE idMateria = :id');
  $RESULT->bindParam(':id', $idMateria);
  $RESULT->execute();
  $ROWS = $RESULT->fetch(PDO::FETCH_OBJ);
  $materia = $ROWS->nome;

  $RESULT = $conn->prepare('SELECT nome FROM tipo_atividade WHERE idtipo_atividade = :id');
  $RESULT->bindParam(':id', $idTipo);
  $RESULT->execute();
  $ROWS = $RESULT->fetch(PDO::FETCH_OBJ);
  $tipo = $ROWS->nome;

}
?>
