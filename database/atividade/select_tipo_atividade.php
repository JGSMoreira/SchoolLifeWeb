<?php
include (dirname(__FILE__).'\..\connection.php');
//Select no Banco de Dados
$SQL = 'SELECT * FROM tipo_atividade WHERE idUserFK = '.$_SESSION['iduser'];
$RESULT = $conn->query($SQL);

//Exibindo os resultados
$ROWS = $RESULT->fetchAll(PDO::FETCH_OBJ);
foreach($ROWS as $VALUE){
  echo '<option>'.$VALUE->nome.'</option>';
}

//Fechamento da conexão
$CONNECTION = null;
?>
