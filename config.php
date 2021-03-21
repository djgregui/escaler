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
	
/** caminho do arquivo de banco de dados **/
if ( !defined('DBAPI') )
	define('DBAPI', ABSPATH . 'inc/database.php');

/** caminhos dos templates de header e footer **/
define('HEADER_ADMIN_TEMPLATE', ABSPATH . 'inc/header-admin.php');
define('FOOTER_ADMIN_TEMPLATE', ABSPATH . 'inc/footer-admin.php');
define('HEADER_SITE_TEMPLATE', ABSPATH . 'inc/header-site.php');
define('FOOTER_SITE_TEMPLATE', ABSPATH . 'inc/footer-site.php');
define('HEADER_USUARIO_TEMPLATE', ABSPATH . 'inc/header-usuario.php');
define('FOOTER_USUARIO_TEMPLATE', ABSPATH . 'inc/footer-usuario.php');

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