<?php
$login = $_POST['login'];
$senha = $_POST['senha']; 

$senha_hash = md5($senha);

$servername = 'localhost';
$username = 'root';
$password = 'usbw';
$database = 'coolmida';

$con = new mysqli($servername, $username, $password, $database);

if ($con->connect_error) {
    die('Erro na conexão: ' . $con->connect_error);
}
if (empty($login) || empty($senha)) {
    echo "<script language='javascript' type='text/javascript'>
    alert('Por favor, preencha todos os campos.');window.location.href='../navbar/login.html';</script>";
    exit;
}
    $result = mysqli_query($con, "SELECT `usuario_email`, `senha` FROM `usuarios` WHERE `usuario_email` = '" . $login . "'");
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result); 

            if ($senha_hash == $row['senha']) {
                echo "<script language='javascript' type='text/javascript'>
                alert('Logado com sucesso!');window.location.href='../index.html';</script>";
            } else {
                echo "<script language='javascript' type='text/javascript'>
                alert('Usuário ou senha incorreto(s).');window.location.href='../navbar/login.html';</script>";
        } 
        }else{
            echo "<script language='javascript' type='text/javascript'>
            alert('Usuário ou senha incorreto(s).');window.location.href='../navbar/login.html';</script>";
        }

$con->close();
?>