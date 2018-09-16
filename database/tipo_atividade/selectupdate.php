<?php
$id = $_GET['id'];
include (dirname(__FILE__).'\..\connection.php');

if(empty($id)){
  header('location:../tipo_atividade/listar.php');
}
else{
  $SQL = "SELECT nome FROM tipo_atividade where idtipo_atividade = ".$id;
  $RESULT = $conn->query($SQL);
  $ROWS = $RESULT->fetch(PDO::FETCH_OBJ);
  $nome = $ROWS->nome;
}
?>
