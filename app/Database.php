<?php

namespace BlogPHP\App;

use PDOException;

/**
 * @package BlogPHP\App
 */
class Database extends \PDO{

    public function __construct() {
		
		$_MYSQL_DB = 'blog_db';
		$_MYSQL_HOST = 'localhost'; 
		$_MYSQL_USER = 'root';
		$_MYSQL_PW = '';
		
		define('MYSQL_DB', $_MYSQL_DB);
		define('MYSQL_HOST', $_MYSQL_HOST);
		define('MYSQL_USER', $_MYSQL_USER);
		define('MYSQL_PW', $_MYSQL_PW);
		
		$dsn = 'mysql:dbname=' . MYSQL_DB . ';host=' . MYSQL_HOST;
		$user = MYSQL_USER;
		$pw = MYSQL_PW;
		
		try {
			parent::__construct($dsn, $user, $pw);
			$this->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e) {
			echo 'Connection failed: ' . $e->getMessage();
		}
	}
	
}