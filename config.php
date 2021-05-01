<?php

/** O nome do banco de dados*/
define('DB_NAME', 'escaler');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'nano');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'mellany0801gui');

/** nome do host do MySQL */
define('DB_HOST', '35.222.232.57');

/** caminho absoluto para a pasta do sistema **/
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** caminho no server para o sistema **/
if ( !defined('BASEURL') )
	define('BASEURL', '/escaler/');
//define('BASEURL','/');
/** caminho do arquivo de banco de dados **/
if ( !defined('DBAPI') )
	define('DBAPI', ABSPATH . 'inc/database.php');

define('COMPOSER',  ABSPATH . 'vendor/autoload.php');

/** caminhos dos templates de header e footer **/
define('HEADER_ADMIN_TEMPLATE', ABSPATH . 'inc/header-admin.php');
define('FOOTER_ADMIN_TEMPLATE', ABSPATH . 'inc/footer-admin.php');
define('HEADER_SITE_TEMPLATE', ABSPATH . 'inc/header-site.php');
define('FOOTER_SITE_TEMPLATE', ABSPATH . 'inc/footer-site.php');
define('HEADER_USUARIO_TEMPLATE', ABSPATH . 'inc/header-usuario.php');
define('FOOTER_USUARIO_TEMPLATE', ABSPATH . 'inc/footer-usuario.php');
define('DEBUG',true);

function mask($val, $mask) {
    $maskared = '';
    $k = 0;
    for($i = 0; $i<=strlen($mask)-1; $i++) {
        if($mask[$i] == '#') {
            if(isset($val[$k])) $maskared .= $val[$k++];
        } else {
            if(isset($mask[$i])) $maskared .= $mask[$i];
        }
    }
    return $maskared;
}

if(session_status() == PHP_SESSION_NONE){
    //session has not started
    session_start();
}

// Tracking utility
function guidv4($data = null) {
    // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
    $data = $data ?? random_bytes(16);
    assert(strlen($data) == 16);

    // Set version to 0100
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    // Set bits 6-7 to 10
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    // Output the 36 character UUID.
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

if(!isset($_COOKIE['escaler_uuid'])) {
    if(!isset($_SESSION['escaler_uuid'])) {
        $UUID = $_SESSION['escaler_uuid'] = guidv4();
    } else {
        $UUID = $_SESSION['escaler_uuid'];
    }
    setcookie('escaler_uuid',$UUID, time()+60*60*24*365, '/', 'interfi.net', false, true);
} else {
    $UUID = $_SESSION['escaler_uuid'] = $_COOKIE['escaler_uuid'];
}
$db = new Mysqli('localhost','nano','mellany0801gui','hotspottest');
$db->set_charset('utf8');
if(isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
    $IP = $_SERVER["HTTP_CF_CONNECTING_IP"];
} else {
    $IP = $_SERVER['REMOTE_ADDR'];
}
$COUNTRY = "";
if(isset($_SERVER["HTTP_CF_IPCOUNTRY"])) {
    $COUNTRY = $_SERVER["HTTP_CF_IPCOUNTRY"];
}
$ROUTE = explode('?',$_SERVER['REQUEST_URI'])[0]; $DATETIME = date('Y-m-d H:i:s');
$db->query("INSERT INTO tracking VALUES (NULL,'$UUID','$IP','$COUNTRY','$ROUTE','$DATETIME')");
echo $db->error;

ini_set('display_errors',1);
