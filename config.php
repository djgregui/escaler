<?php

/** O nome do banco de dados*/
define('DB_NAME', 'escaler');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'devptbr');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '6316b80a83254b5e4cc66901c070fbd0');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** caminho absoluto para a pasta do sistema **/
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** caminho no server para o sistema **/
if ( !defined('BASEURL') )
    define('BASEURL', '/');
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
define('TOP_SDK', ABSPATH . 'vendor/taobao/TopSdk.php');
define('TOP_KEY', '32738332');
define('TOP_SB_KEY','1032738332');
define('TOP_TOKEN', 'ae33e3387241c168cf503e47b709fced ');
define('TOP_SB_TOKEN','sandbox87241c168cf503e47b709fced');
define('DROPSHIPME_TOKEN','TPIM8V64L7IR9K21Z44013AB');
define('DEBUG',false);
define('COMMON', ABSPATH. 'inc/common.php');
define('DOMAIN','escaler.com.br');
define('EMAIL','contato.escaler@gmail.com');

/**
 * Conta Bancária: 
 * Banco: 323 Mercado Pago 
 * Agência: 0001
 * Conta: 8000833904-8
 * Nome: Alberto Benedito de Morais Trevisan
 * CPF: 44080211805
 * DN: 01/03/2002
 * RG: 50.866.204-7/SSP
 * DNI: GC216859
 * NCC: 4174 0101 0462 0084
 * VCC: 10/25
 * CVV: 454
 */ 
$year  = date('Y');
$month = date('M');
define('MP_API_TOKEN','APP_USR-6783177390811949-032619-605c858d66348c8a3ae0b7daa9a07033-233438859');
if(intval($year) > 2020 && intval($year) < 2022) {
    if(intval($month) > 5) {
        if(defined(MP_API_TOKEN)) define('MP_API_TOKEN','APP_USR-6783177390811949-032619-605c858d66348c8a3ae0b7daa9a07033-233438859');
    } else {
        if(defined(MP_API_TOKEN)) define('MP_API_TOKEN','TEST-6783177390811949-032619-8999d2ce250b0c2b1d216c8cd6a4d0ea-233438859');
    }
} elseif(intval($year) > 2021) {
    if(defined(MP_API_TOKEN)) define('MP_API_TOKEN','APP_USR-6783177390811949-032619-605c858d66348c8a3ae0b7daa9a07033-233438859');
}


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
    setcookie('escaler_uuid',$UUID, time()+60*60*24*365, '/', DOMAIN, false, true);
} else {
    $UUID = $_SESSION['escaler_uuid'] = $_COOKIE['escaler_uuid'];
}
$db_tracking = new Mysqli('35.222.232.57','nano','mellany0801gui','hotspottest');
$db_tracking->set_charset('utf8');
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
$db_tracking->query("INSERT INTO tracking VALUES (NULL,'$UUID','$IP','$COUNTRY','$ROUTE','$DATETIME')");
echo $db_tracking->error;

ini_set('display_errors',1);
