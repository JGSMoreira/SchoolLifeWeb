<?php
include (dirname(__FILE__).'\..\connection.php');
//Select no Banco de Dados
$SQL = 'SELECT * FROM atividade WHERE idUserFK = '.$_SESSION['iduser'];
$RESULT = $conn->query($SQL);

//Exibindo os resultados
$ROWS = $RESULT->fetchAll(PDO::FETCH_OBJ);

if ($ROWS){
  foreach($ROWS as $VALUE){
    $id = $VALUE->idAtividade;
    $prioridade = $VALUE->prioridade;
    $nome = $VALUE->nome;
    $data = $VALUE->data_entrega;
    $valor = $VALUE->pontuacao;
    $situacao = $VALUE->situacao;
    $materia = $VALUE->idMateriaFK;

    echo '<tr>';
    echo '<td>'.$prioridade.'</td>';
    echo '<td>'.$nome.'</td>';

    $RESULT = $conn->prepare('SELECT nome FROM materia WHERE idMateria = :id');
    $RESULT->bindParam(':id', $materia);
    $RESULT->execute();
    $RESULTADO = $RESULT->fetch(PDO::FETCH_OBJ);

    echo '<td>'.$RESULTADO->nome.'</td>';
    echo '<td>'.$valor.'</td>';
    echo '<td>'.$data.'</td>';
    echo '<td><center><a href="editar.php?id='.$id.'"><img src="../../open-iconic/svg/pencil.svg" height="15px"></a>';
    echo '&nbsp&nbsp&nbsp<a href="../../database/materia/delete.php?id='.$id.'"><img src="../../open-iconic/svg/trash.svg" height="15px"></a></center></td>';
    echo '</tr>';
  }
}
else {
  echo 'Nenhuma matéria cadastrada!';
}


//Fechamento da conexão
$CONNECTION = null;
?>
