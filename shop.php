<?php
ini_set('display_errors',1);
require 'config.php';
header('Location: '.BASEURL.'usuario/pagina-login.php?shop='.filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT));