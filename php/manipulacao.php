<?php
require 'config.php ';
$id_produto = $_POST['id_produto'];

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['alterar'])){
  $sql = "SELECT * FROM produtos WHERE id_produto = '$id_produto'";
  $result = $con->query($sql);
  if ($result) {
    $row = $result->fetch_assoc();  
    if ($row) {
  
  $categoria = $row["categoria"] ;
  $tipo = $row["tipo"] ;
  $nome = $row["nome"] ;
  $descricao = $row["descricao"] ;
  $preco = $row["preco"] ;
  $estoque = $row["estoque"] ;
  header("location:../redirecionamentos/alterar.php?
  nome=$nome&tipo=$tipo&categoria=$categoria&descricao=$descricao&preco=$preco&estoque=$estoque&id_produto=$id_produto");
}
  }
}elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deletar'])) {

  $query_select = "DELETE FROM produtos WHERE id_produto = '$id_produto' "; 
  $result = $con->query($query_select);
  
  echo "<script language='javascript' type='text/javascript'>
  alert('Produto deletado com sucesso!');window.location.href='../redirecionamentos/painel.php';</script>";
}
?>