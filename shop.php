<?php
ini_set('display_errors',1);
require 'config.php';
require DBAPI;
$db = open_database(); $ID = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
$db_tracking->query("INSERT INTO tracking_shop VALUES (NULL,'$UUID','$IP','$COUNTRY','$ID','$DATETIME')");
if(isset($_SESSION['loggedin_escaler'])) {
    header('Location: '.BASEURL.'usuario/shop.php?id='.filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT));
} else {
    header('Location: '.BASEURL.'usuario/pagina-login.php?shop='.filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT));
}