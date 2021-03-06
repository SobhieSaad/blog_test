<?php

namespace BlogPHP\Model;

/**
 * @package BlogPHP\Model
 */
class Post {
	
	protected $db_connection;

    public function __construct() {
        $this->db_connection = new \BlogPHP\app\Database;
    }

    /**
     * @param int $startLimit
     * @param int $endLimit
     * @return array
     */
    public function get($startLimit, $endLimit) {
        $query = $this->db_connection->prepare('SELECT posts.*, count(comments.id) as comments_count FROM posts 
        left join comments on comments.post_id = posts.id
         group by posts.id
         ORDER BY date DESC LIMIT :startLimitRange, :endLimitRange');
        $query->bindParam(':startLimitRange', $startLimit, \PDO::PARAM_INT);
        $query->bindParam(':endLimitRange', $endLimit, \PDO::PARAM_INT);
        $query->execute();
		return $query->fetchAll(\PDO::FETCH_OBJ);
    }

    /**
     * @return array
     */
    public function getAll() {
        $query = $this->db_connection->query('SELECT posts.* , count(comments.id) as comments_count FROM posts 
        left join comments on comments.post_id = posts.id
        group by posts.id
         ORDER BY date DESC');
        return $query->fetchAll(\PDO::FETCH_OBJ);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getById($id) {
        $query = $this->db_connection->prepare('SELECT * FROM posts WHERE id = :postId LIMIT 1');
        $query->bindParam(':postId', $id, \PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(\PDO::FETCH_OBJ);
    }

    /**
     * @param array $queryData
     * @return bool
     */
    public function add(array $queryData) {
        $query = $this->db_connection->prepare('INSERT INTO posts (title, content, author) VALUES(:title, :content, :author)');
        $query->bindValue(':title', $queryData['title']);
        $query->bindValue(':content', $queryData['content']);
        $query->bindValue(':author', $queryData['author']);
		return $query->execute($queryData);
    }

    /**
     * @param array $data
     * @return bool
     */
    public function update(array $data) {
        $query = $this->db_connection->prepare('UPDATE posts SET title=:title, content=:content, author=:author, date=NOW() WHERE id = :postId LIMIT 1');
        $query->bindValue(':postId', $data['postId'], \PDO::PARAM_INT);
        $query->bindValue(':title', $data['title']);
        $query->bindValue(':content', $data['content']);
        $query->bindValue(':author', $data['author']);
        return $query->execute();
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete($id) {
        $query = $this->db_connection->prepare('DELETE FROM posts WHERE id = :postId LIMIT 1');
        $query->bindParam(':postId', $id, \PDO::PARAM_INT);
        return $query->execute();
    }


  

	
}