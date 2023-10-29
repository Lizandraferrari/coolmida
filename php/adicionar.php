<?php
$nmProd = $_POST['nmProd'];
$categoriaAdd = $_POST['categoriaAdd'];
$tipoAdd = $_POST['tipoAdd'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];
$qtd = $_POST['qtd'];

$servername = 'localhost';
$username = 'root';
$password = 'usbw';
$database = 'testelogin';

$con = new mysqli($servername, $username, $password, $database);

if ($con->connect_error) {
    die('Erro na conexão: ' . $con->connect_error);
}

$query_select = "SELECT nome FROM produtos WHERE nome = 'nmProd' ";
$result = $con->query($query_select);

if (!$result) {
    die('Erro na consulta: ' . $con->error);
}

$row = $result->fetch_assoc();
$novo = $row['nmProd'];

if (empty($nmProd) || empty($categoriaAdd) || empty($descricao)|| empty($preco)|| empty($tipo)|| empty($qtd)) {
    echo "<script language='javascript' type='text/javascript'>
    alert('Todos os campos devem ser preenchidos');window.location.href='../redirecionamentos/adicionar.html';</script>";
    
} else{
    $query = "INSERT INTO produtos (categoria , tipo , nmome , preco , estoque) VALUES ('$categoriaAdd' , '$tipoAdd' , '$nmProd' , '$preco' , '$qtd')";
    $insert = $con->query($query);

    if ($insert) {
        echo "<script language='javascript' type='text/javascript'>
        alert('Produto cadastrado com sucesso!');window.location.href='../redirecionamentos/painel.html';</script>";
    } else {
        echo "<script language='javascript' type='text/javascript'>
        alert('Não foi possível cadastrar esse produto');window.location.href='../redirecionamentos/adicionar.html';</script>";
    } 
}
$con->close();
?>