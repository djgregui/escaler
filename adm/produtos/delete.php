<?php
require '../../config.php';
require DBAPI;
$id = (int) $_GET['id'];
$db = open_database();
$query0 = $db->query("DELETE FROM produto_versoes WHERE id_produto = '$id'");
if($query0) {
    $query1 = $db->query("DELETE FROM produto_imagens WHERE id_produto = '$id'");
    if($query1) {
        $query = $db->query("DELETE FROM produtos WHERE id = '$id'");
        if($query) {
            header("Location: index.php");
        } else {
            echo $db->error;
            echo "<script>window.location.href='index.php';";
            
        }
    } else {
        echo $db->error;
    }
} else {
    echo $db->error;
}