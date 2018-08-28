<?php
//Informações do Banco de Dados
$HOST = "localhost";
$USER = "root";
$PASSWORD = "root";
$DATABASE = "school_life";

//Conexão do Banco de Dados
$conn = new PDO("mysql:host=" . $HOST . ";dbname=" . $DATABASE, $USER, $PASSWORD);
?>
