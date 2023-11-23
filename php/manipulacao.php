<?php
require 'config.php ';
$id_produto = $_POST['id_produto'];

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['alterar'])){
  $sql = "SELECT * FROM produtos WHERE id_produto = '$id_produto'";
  $result = $con->query($sql);
  $row = $result->fetch_assoc()
session_start();
$_SESSION["id"] = $id_produto;
$_SESSION["descricao"] = $row['descricao'];
 $_SESSION["tipo"] = $row["tipo"] ;
 $_SESSION["preco"] = $row["preco"];
$_SESSION["estoque"] = $row["estoque"];
$_SESSION["categoria"] = $row["categoria"];    
 $_SESSION["nome"] = $row["nome"];
echo "<script language='javascript' type='text/javascript'>
window.location.href='../redirecionamentos/alterar.php';</script>";

}elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deletar'])) {

  $query_select = "DELETE FROM produtos WHERE id_produto = '$id_produto' "; 
  $result = $con->query($query_select);
  
  echo "<script language='javascript' type='text/javascript'>
  alert('Usuário deletado com sucesso!');window.location.href='../redirecionamentos/painel.php';</script>";
}
?>