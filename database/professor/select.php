<?php
include (dirname(__FILE__).'\..\connection.php');
//Select no Banco de Dados
$SQL = 'SELECT * FROM professor WHERE idUserFK = '.$_SESSION['iduser'];
$RESULT = $conn->query($SQL);

//Exibindo os resultados
$ROWS = $RESULT->fetchAll(PDO::FETCH_OBJ);
if ($ROWS){
  foreach($ROWS as $VALUE){
    echo '<tr>';
    echo '<td>'.$VALUE->nome.'</td>';
    echo '<td>'.$VALUE->email.'</td>';
    echo '<td><center><a href="editar.php?id='.$VALUE->idProfessor.'"><img src="../../open-iconic/svg/pencil.svg" height="15px"></a>';
    echo '&nbsp&nbsp&nbsp<a href="../../database/professor/delete.php?id='.$VALUE->idProfessor.'"><img src="../../open-iconic/svg/trash.svg" height="15px"></a></center></td>';
    echo '</tr>';
  }
}
else {
  echo 'Nenhum professor cadastrado!';
}


//Fechamento da conexão
$CONNECTION = null;
?>
