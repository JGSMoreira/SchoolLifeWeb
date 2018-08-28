<?php
include 'connection.php';

//Select no Banco de Dados
$SQL = "SELECT * FROM professor";
$RESULT = $conn->query($SQL);

//Exibindo os resultados
$ROWS = $RESULT->fetchAll(PDO::FETCH_OBJ);
foreach($ROWS as $VALUE){
  echo '<tr>';
  echo '<td>'.$VALUE->idProfessor.'</td>';
  echo '<td>'.$VALUE->nome.'</td>';
  echo '<td>'.$VALUE->email.'</td>';
  echo '<td><center><a href="editar_professor.php?id='.$VALUE->idProfessor.'"><img src="../open-iconic/svg/pencil.svg" height="15px"></a>';
  echo '&nbsp&nbsp&nbsp<a href="database/delete_professor.php?id='.$VALUE->idProfessor.'"><img src="../open-iconic/svg/trash.svg" height="15px"></a></center></td>';
  echo '</tr>';
}

//Fechamento da conexão
$CONNECTION = null;
?>
