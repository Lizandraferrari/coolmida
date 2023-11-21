<?php
require 'config.php ';

$id_produto = $_POST['id_produto'];

$query_select = "DELETE FROM produtos WHERE id_produto = '$id_produto' "; 
$result = $con->query($query_select);

echo "<script language='javascript' type='text/javascript'>
alert('Usuário deletado com sucesso!');window.location.href='../redirecionamentos/painel.php';</script>";
if($id){
    $sql = $pdo -> prepare("DELETE FROM produtos WHERE id_produto = :id");
    $sql ->bindValue(':id', $id);
    $sql ->execute();

    echo "<script language='javascript' type='text/javascript'>
    alert('Usuário deletado com sucesso!');window.location.href='../redirecionamentos/painel.php';</script>";
}
?>