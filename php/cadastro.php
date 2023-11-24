<?php
require 'config.php';

$login = $_POST['login'];
$senha = $_POST['senha']; 
$senha2 = $_POST['senha2'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$nivel = $_POST['nivel'];

$senha_hash = md5($senha);

$query_select = "SELECT usuario_email FROM usuarios WHERE usuario_email = '$login'";
$result = $con->query($query_select);

$row = $result->fetch_assoc();
$logarray = $row['login'];

if (empty($login) || empty($senha) || empty($nome)|| empty($telefone)|| empty($senha2)) {
    echo "<script language='javascript' type='text/javascript'>
    alert('Todos os campos devem ser preenchidos');window.location.href='../redirecionamentos/cadastro.html';</script>";
    
} else {
    if ($logarray == $login) {
        echo "<script language='javascript' type='text/javascript'>
        alert('Esse usuário já existe');window.location.href='../redirecionamentos/cadastro.html';</script>";
    } else {
        if ($senha == $senha2){
          $query = "INSERT INTO usuarios (usuario_email, senha , nome_usuario , telefone_usuario , nivel) VALUES ('$login', '$senha_hash' , '$nome', '$telefone' , '$nivel')";
          $insert = $con->query($query);
        }else{
          echo "<script language='javascript' type='text/javascript'>
          alert('As senhas não estão iguais!');window.location.href='../redirecionamentos/cadastro.html';</script>";
        }
        if ($insert) {
            echo "<script language='javascript' type='text/javascript'>
            alert('Usuário cadastrado com sucesso!');window.location.href='../navbar/login.html';</script>";
        } else {
            echo "<script language='javascript' type='text/javascript'>
            alert('Não foi possível cadastrar esse usuário');window.location.href='../redirecionamentos/cadastro.html';</script>";
        }
      
    }
} 

?>