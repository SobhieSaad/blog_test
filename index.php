<?php

namespace BlogPHP;

use BlogPHP\App;

if(isset($_SERVER["HTTPS"])&& strtolower($_SERVER["HTTPS"]) == "on" ) {
	$protocol = 'https://';
} else {
	$protocol = 'http://';
}
if (empty($_SESSION)) {
    session_start();
}

define('PROTOCOL', $protocol);
define('ROOT_URL', PROTOCOL . $_SERVER['HTTP_HOST'] . str_replace('\\', '', dirname(htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES))) . '/');
define('ROOT_HOME', str_replace('\\', '', dirname(htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES))) . '/');
define('ROOT_PATH', __DIR__ . '/');

require ROOT_PATH . 'app/Autoloader.php';
app\Autoloader::init(); // Load necessary classes
if(!empty($_GET['p'])) {
	$controller = $_GET['p'];
} else {
	$controller = 'blogController';
}

if(!empty($_GET['a'])){
    $action = $_GET['a'];
} else {
	$action = 'home';
}

$params = [
	'ctrl' => $controller,
	'act' => $action
];
app\Router::run($params);