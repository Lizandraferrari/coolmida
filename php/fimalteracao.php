<?php
require 'config.php';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$id_produto = $_POST['id_produto'];
$nome = $_POST['nomeAlt'];
$categoria = $_POST['categoriaAlt'];
$tipo = $_POST['tipoAlt'];
$descricao = $_POST['descricaoAlt'];
$preco = $_POST['precoAlt'];
$qtd = $_POST['qtd'];

$sql = "SELECT * FROM produtos WHERE id_produto = '$id_produto'";
$result = $con->query($sql);
if ($result) {
  $row = $result->fetch_assoc();  
  echo "ID: $id_produto";

  if ($row) {
    $pedido = "UPDATE produtos SET nome = '$nome' , categoria = '$categoria' , tipo = '$tipo' , descricao = '$descricao' , preco = '$preco' , estoque = '$qtd'WHERE id_produto = '$id_produto'";
    $res = $con->query($pedido);
    echo "<script language='javascript' type='text/javascript'>
    alert('Produto alterado com sucesso!');window.location.href='../redirecionamentos/painel.php';</script>";

    $con->close();
  }else{
    echo "<script language='javascript' type='text/javascript'>
    alert('deu pau!');window.location.href='../redirecionamentos/painel.php';</script>";
  }
}
}
?>