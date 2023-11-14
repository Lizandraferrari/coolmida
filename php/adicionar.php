<?php
require 'config.php';

$nmProd = $_POST['nmProd'];
$categoriaAdd = $_POST['categoriaAdd'];
$tipoAdd = $_POST['tipoAdd'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];
$qtd = $_POST['qtd'];

$query_select = "SELECT nome FROM produtos WHERE nome = '$nmProd' "; 
$result = $con->query($query_select);


$row = $result->fetch_assoc();
$novo = $row['nome']; 

if (empty($nmProd) || empty($categoriaAdd) || empty($descricao) || empty($preco) || empty($tipoAdd) || empty($qtd)) { 
    echo "<script language='javascript' type='text/javascript'>
    alert('Todos os campos devem ser preenchidos');window.location.href='../redirecionamentos/adicionar.html';</script>";
    
} else { 
    if ($novo == $nmProd) {
        echo "<script language='javascript' type='text/javascript'>
        alert('Esse produto já existe');window.location.href='../redirecionamentos/adicionar.html';</script>";
    }else{
        $query = "INSERT INTO produtos (categoria, tipo, descricao , nome, preco, estoque) VALUES ('$categoriaAdd', '$tipoAdd', '$descricao' , '$nmProd', '$preco', '$qtd')"; 
        $insert = $con->query($query);

         if ($insert) {
            echo "<script language='javascript' type='text/javascript'>
            if (confirm('Produto cadastrado com sucesso! Deseja cadastrar outro?') == true) {
                window.location.href='../redirecionamentos/adicionar.html';
            } else {
                 window.location.href='../redirecionamentos/painel.php';
            }</script>";
    } else {
        echo "<script language='javascript' type='text/javascript'>
        alert('Não foi possível cadastrar esse produto');window.location.href='../redirecionamentos/adicionar.html';</script>";
    } 
    }
}

?>