<?php

namespace BlogPHP\Model;

/**
 * @package BlogPHP\Model
 */
class Authentication {

    protected $db_connection;

    public function __construct() {
        $this->db_connection = new \BlogPHP\app\Database;
    }

    /**
     * @param $username
     * @param $password
     * @return bool
     */
    public function getAuthentication($username, $password) {
        $query = $this->db_connection->prepare('SELECT username, password FROM users WHERE username = :usr');
        $query->bindParam(':usr', $username, \PDO::PARAM_STR);
        $query->execute();
        $queryRequest = $query->fetch(\PDO::FETCH_OBJ);
        if($queryRequest) {
            return password_verify($password, $queryRequest->password);
        }
    }



}