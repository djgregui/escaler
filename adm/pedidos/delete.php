<?php
require '../../config.php';
require DBAPI;
$id = (int) $_GET['id'];
$query = (open_database())->query("DELETE FROM pedidos WHERE id = '$id'");
header("Location:index.php");