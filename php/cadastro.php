<?php
$login = $_POST['login'];
$senha = $_POST['senha']; //sem criptografia, fazer hash para aumentar segurança
$servername = 'localhost';
$username = 'root';
$password = 'usbw';
$database = 'testelogin';

$con = new mysqli($servername, $username, $password, $database);

if ($con->connect_error) {
    die('Erro na conexão: ' . $con->connect_error);
}

$query_select = "SELECT login FROM usuarios WHERE login = '$login'";
$result = $con->query($query_select);

if (!$result) {
    die('Erro na consulta: ' . $con->error);
}

$row = $result->fetch_assoc();
$logarray = $row['login'];

if (empty($login) || empty($senha)) {
    echo "<script language='javascript' type='text/javascript'>
    alert('Todos os campos devem ser preenchidos');window.location.href='cadastro.html';</script>";
    
} else {
    if ($logarray == $login) {
        echo "<script language='javascript' type='text/javascript'>
        alert('Esse usuário já existe');window.location.href='cadastro.html';</script>";
    } else {
        if ($senha == $senha2){
          $query = "INSERT INTO usuarios (login, senha) VALUES ('$login', '$senha')";
          $insert = $con->query($query);
        }else{
          echo "<script language='javascript' type='text/javascript'>
          alert('As senhas não estão iguais!');window.location.href='cadastro.html';</script>";
        }
        if ($insert) {
            echo "<script language='javascript' type='text/javascript'>
            alert('Usuário cadastrado com sucesso!');window.location.href='login.html';</script>";
        } else {
            echo "<script language='javascript' type='text/javascript'>
            alert('Não foi possível cadastrar esse usuário');window.location.href='cadastro.html';</script>";
        }
      
    }
} 

$con->close();
?>