<?php
require 'config.php';
require DBAPI;
$ipn = json_encode($_REQUEST);
$datetime = date('Y-m-d H:i:s');
$id = 0;
(open_database())->query("INSERT INTO ipn VALUES (NULL,'$ipn','$id','$datetime')");
http_response_code(200);