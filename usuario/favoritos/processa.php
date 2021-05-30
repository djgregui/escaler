<?php
require '../../config.php';
require DBAPI;
$tipo = filter_var($_GET['tipo'],FILTER_SANITIZE_STRING);
if($tipo == 'add') {
    $user = $_SESSION['id_user']; $id = (int) $_GET['id']; $datetime = date('Y-m-d H:i:s'); $db = open_database();
    if((($db)->query("INSERT INTO favoritos VALUES (NULL,$user,$id,'$datetime')"))) {
        header("Location: ../../produto.php?id=$id");
    } else {
        // echo $db->error;
        header("Location: index.php?e=501");
    }
}

if($tipo == 'rem') {
    $user = $_SESSION['id_user']; $id = (int) $_GET['id']; $datetime = date('Y-m-d H:i:s'); $db = open_database();
    if((($db)->query("DELETE FROM favoritos WHERE id_usuario = '$user' AND id_produto='$id'"))) {
        header("Location: ../../produto.php?id=$id");
    } else {
        // echo $db->error;
        header("Location: index.php?e=501");
    }
}