<?php
require '../../config.php';
require DBAPI;
$id = (int) $_GET['id'];
$query = (open_database())->query("DELETE FROM produtos WHERE id = '$id'");
if($query) {
    header("Location: index.php");
} else {
    $erro = $db->error;
    echo "<script>alert('Erro: $erro');window.location.href='index.php';";
    
}