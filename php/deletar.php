<?php
require 'config.php ';

$id = filter_input(INPUT_GET , 'id_produto');

if($id){
    $sql = $pdo -> prepare("DELETE FROM produtos WHERE id_produto = :id");
    $sql ->bindValue(':id', $id);
    $sql ->execute();
}
?>