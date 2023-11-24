<?php
require 'config.php';

$login = $_POST['login'];
$senha = $_POST['senha']; 

$senha_hash = md5($senha);

if (empty($login) || empty($senha)) {
    echo "<script language='javascript' type='text/javascript'>
    alert('Por favor, preencha todos os campos.');window.location.href='../navbar/login.html';</script>";
}
$query_select = "SELECT usuario_email , senha FROM usuarios WHERE usuario_email = '$login'";
$result = $con->query($query_select);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

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

?>