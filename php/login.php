<?php
$login = $_POST['login'];
$senha = $_POST['senha']; 

$servername = 'localhost';
$username = 'root';
$password = 'usbw';
$database = 'testelogin';

$con = new mysqli($servername, $username, $password, $database);

if ($con->connect_error) {
    die('Erro na conexão: ' . $con->connect_error);
}
if (empty($login) || empty($senha)) {
    echo "<script language='javascript' type='text/javascript'>
    alert('Falha ao logar');window.location.href='login.html';</script>";
    exit;
}
    $result = mysqli_query($con, "SELECT `login`, `senha` FROM `usuarios` WHERE `login` = '" . $login . "'");
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result); 

            if ($senha == $row['senha']) { //fazer um hash pra senha no cadastro e aplicar o tratamento aqui para ler corretamente
                echo "<script language='javascript' type='text/javascript'>
                alert('Logado com sucesso!');window.location.href='login.html';</script>";
            } else {
                echo "<script language='javascript' type='text/javascript'>
                alert('Falha ao logar');window.location.href='login.html';</script>";
        }        
        }

$con->close();
?>