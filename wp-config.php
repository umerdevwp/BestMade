<?php
# Database Configuration
define( 'DB_NAME', 'wp_bmcoblog' );
define( 'DB_USER', 'bmcoblog' );
define( 'DB_PASSWORD', 'CtbokAPeH7Ub72IeicdF' );
define( 'DB_HOST', '127.0.0.1' );
define( 'DB_HOST_SLAVE', '127.0.0.1' );
define('DB_CHARSET', 'utf8mb4');
define('DB_COLLATE', '');
$table_prefix = 'bm_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         '0)ja%--6T|ouGhF-+)v9G{--l<AhVbJhlLVVyUEO%@4I6;_AT`mB)Kj^Qs#,f2zR');
define('SECURE_AUTH_KEY',  'eB;-$(cRv3=Ug;s~vmj.:.HN~7r[h26%w|6uDI~p@L$,_q%|-K=Q+Z4Q^]hu`bJM');
define('LOGGED_IN_KEY',    'Yb/t(mHV,Nob(_6SsH,QwT+ o6@~*gh^-;,rf[F-V?$T/3LE%>+|+hyLL<W(0m-X');
define('NONCE_KEY',        '*;#R{(xcm$/`wE-)A(N|+OnF2Jr+V~dO2qX3O{;Zodr+]oanAepPtHTNw-}gu7ym');
define('AUTH_SALT',        'd(qcVfTN{O5rb_a?-+s/>j:r*m0;`=`@,->$W#`-Rt=rz-P/Pz_R0f.BGvK1}$1o');
define('SECURE_AUTH_SALT', ':Npn/7iU?,6uT8b)wf]/!59#D@U10][C^c-*.F|-5=]&Pf=Tkwj9N_JmQ4Ywu;|&');
define('LOGGED_IN_SALT',   '&cY+R?7nr3B lqv=z``*5}7-6Z`|/g)S&OrYh99fS--mQ-& bxoj<!DN.x)7PB{n');
define('NONCE_SALT',       'Sw[feq!W90<`(X-/#,{gA){rYh%f+9cdu}G>j3+YP=J+U6lQE)(TW.rvR+{92 $*');

	define( 'WP_DEBUG', true );
# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'bmcoblog' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'PWP_ROOT_DIR', '/nas/wp' );

define( 'WPE_APIKEY', '6f45dc2886ac6b1dddcc94837ae014b936e24671' );

define( 'WPE_CLUSTER_ID', '100447' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_SFTP_PORT', 2222 );

define( 'WPE_LBMASTER_IP', '' );

define( 'WPE_CDN_DISABLE_ALLOWED', true );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', false );

define( 'FORCE_SSL_LOGIN', false );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', FALSE );

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

umask(0002);

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'bmcoblog.wpengine.com', 1 => 'editorial.bestmadeco.com', );

$wpe_varnish_servers=array ( 0 => 'pod-100447', );

$wpe_special_ips=array ( 0 => '104.196.22.244', );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( );


# WP Engine ID


# WP Engine Settings







# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', __DIR__ . '/');
require_once(ABSPATH . 'wp-settings.php');


















