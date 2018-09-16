<?php
include (dirname(__FILE__).'\..\connection.php');
//Select no Banco de Dados
$SQL = 'SELECT * FROM tipo_atividade WHERE idUserFK = '.$_SESSION['iduser'];
$RESULT = $conn->query($SQL);

//Exibindo os resultados
$ROWS = $RESULT->fetchAll(PDO::FETCH_OBJ);
if ($ROWS){
  foreach($ROWS as $VALUE){
    echo '<tr>';
    echo '<td>'.$VALUE->nome.'</td>';
    echo '<td><center><a href="editar.php?id='.$VALUE->idtipo_atividade.'"><img src="../../open-iconic/svg/pencil.svg" height="15px"></a>';
    echo '&nbsp&nbsp&nbsp<a href="../../database/tipo_atividade/delete.php?id='.$VALUE->idtipo_atividade.'"><img src="../../open-iconic/svg/trash.svg" height="15px"></a></center></td>';
    echo '</tr>';
  }
}
else {
  echo 'Nenhum tipo de atividade cadastrado!';
}


//Fechamento da conexão
$CONNECTION = null;
?>
