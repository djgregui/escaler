<?php
require '../../config.php';
require DBAPI;
$id = (int) $_GET['id'];
$db=open_database();
$sql = "DELETE FROM usuario WHERE id = '$id'";
$query = $db->query($sql);
if($query) {
    header("Location: ../../adm/usuarios/index.php");
} else {
    $erro = $db->error;
    echo "<script>alert('Erro: $erro');window.location.href='index.php';";
    
}