<?php
//DirInfo
define('_ROOT', dirname(__FILE__).'../../../');
define('_APP', _ROOT.'application/');
define('_MODELS', _APP.'models/');
define('_CONFIG', _APP.'config/');
define('_CONTROLLER', _APP.'controllers/');
define('_VIEW', _APP.'views/');
define('_LIBRARY', _APP.'libraries/');

define('UTILFILE', 'util.php');

define('RESPONSE_USER', _LIBRARY.'stmt/userResponse.php');

//UrlInfo
define('ERROR_LIST', '/error/list');

define('DATA_USER', '/data/getUserInfo');

//DBInfo
define('DB_TYPE', 'mysql');
define('DB_HOST', 'sqldb.cgol6xhisqmi.ap-northeast-2.rds.amazonaws.com');
define('DB_NAME', 'travelDB');
define('DB_USER', 'admin');
define('DB_PASSWORD', '1234asdf');
define('CHARSET', 'utf8');


//ErrorInfo
define('DBCONN_ERROR', 1);
define('BLANK_ERROR', 2);
define('PASSWD_ERROR', 3);
define('REQ_ERROR', 4);
define('LOGIN_ERROR', 5);
define('ACCESS_ERROR', 6);
