<?php

$pesquisa = $_POST['busquinha'];

$servername = 'localhost';
$username = 'root';
$password = 'usbw';
$database = 'testelogin';

$con = new mysqli($servername, $username, $password, $database);

if ($con->connect_error) {
    die('Erro na conexão: ' . $con->connect_error);
}


$con->close();
?>