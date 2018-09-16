<?php
session_start();
$logado = false;
$mensagem = 'Você não está logado.';
if (isset($_SESSION['logado']) && $_SESSION['logado']){
  $logado = true;
  $mensagem = 'Bem-vindo, '.$_SESSION['nome'].'.';
}

 ?>
