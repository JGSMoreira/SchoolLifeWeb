<?php
include (dirname(__FILE__).'\..\connection.php');
//Select no Banco de Dados
$SQL = 'SELECT * FROM materia WHERE idUserFK = '.$_SESSION['iduser'];
$RESULT = $conn->query($SQL);

//Exibindo os resultados
$ROWS = $RESULT->fetchAll(PDO::FETCH_OBJ);

if ($ROWS){
  foreach($ROWS as $VALUE){
    echo '<tr>';
    echo '<td>'.$VALUE->nome.'</td>';

    $RESULT = $conn->prepare('SELECT nome FROM professor WHERE idProfessor = :id');
    $RESULT->bindParam(':id', $VALUE->idProfessorFK);
    $RESULT->execute();
    $ROWS = $RESULT->fetch(PDO::FETCH_OBJ);

    echo '<td>'.$ROWS->nome.'</td>';
    echo '<td><center><a href="editar.php?id='.$VALUE->idMateria.'"><img src="../../open-iconic/svg/pencil.svg" height="15px"></a>';
    echo '&nbsp&nbsp&nbsp<a href="../../database/materia/delete.php?id='.$VALUE->idMateria.'"><img src="../../open-iconic/svg/trash.svg" height="15px"></a></center></td>';
    echo '</tr>';
  }
}
else {
  echo 'Nenhuma matéria cadastrada!';
}


//Fechamento da conexão
$CONNECTION = null;
?>
