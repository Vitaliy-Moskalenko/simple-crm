<?php

error_reporting(E_ALL);
// error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);

define('DEBUG', true);
define('BASE_URL', '');
define('ABS_URL', 'http://technolingva.com');
define('SKIN', 'modern');

// Database
define('DB_HOST', 'localhost');
define('DB_NAME', 'toreks_crm');
define('DB_USR', 'admin');
define('DB_PWD', 'password');


function debug($str) {
	header('Content-type: text/html;charset=UTF8');
	echo '<pre>';
	exit(var_dump($str));
}
