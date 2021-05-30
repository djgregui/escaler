<?php
ini_set('display_errors',1);
require 'config.php';
if(isset($_SESSION['loggedin_escaler'])) {
    header('Location: '.BASEURL.'usuario/shop.php?id='.filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT));
} else {
    header('Location: '.BASEURL.'usuario/pagina-login.php?shop='.filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT));
}