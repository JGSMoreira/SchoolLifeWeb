<?php
//Informações do Banco de Dados
$HOST = "localhost:3306";
$USER = "root";
$PASSWORD = "root";
$DATABASE = "school_life";

//Conexão do Banco de Dados
$conn = new PDO("mysql:host=" . $HOST . ";dbname=" . $DATABASE, $USER, $PASSWORD);
?>
