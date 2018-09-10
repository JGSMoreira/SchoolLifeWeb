<?php
session_start();

if ($_SESSION['logado']){
  session_unset();
}

header('location: index.php');
 ?>
