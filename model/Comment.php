<?php

namespace BlogPHP\Model;

/**
 * @package BlogPHP\Model
 */
class Comment {
	
	protected $db_connection;

    public function __construct() {
        $this->db_connection = new \BlogPHP\app\Database;
    }

    /**

     * @return array
     */
    public function get($post_id) {
        $query = $this->db_connection->prepare('SELECT * FROM comments  where post_id =:post_id ORDER BY date DESC ');
        $query->bindParam(':post_id', $post_id, \PDO::PARAM_INT);
        $query->execute();
		return $query->fetchAll(\PDO::FETCH_OBJ);
    }

    /**
     * @return array
     */
    public function getAll() {
        $query = $this->db_connection->query('SELECT * FROM comments ORDER BY date DESC');
        return $query->fetchAll(\PDO::FETCH_OBJ);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getById($id) {
        $query = $this->db_connection->prepare('SELECT * FROM comments WHERE id = :id LIMIT 1');
        $query->bindParam(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(\PDO::FETCH_OBJ);
    }

    /**
     * @param array $queryData
     * @return bool
     */
    public function add(array $queryData) {
        $query = $this->db_connection->prepare('INSERT INTO comments (content, post_id) VALUES(:content, :post_id)');
        $query->bindValue(':content', $queryData['content']);
        $query->bindValue(':post_id', $queryData['post_id']);
		return $query->execute($queryData);
    }

    /**
     * @param array $data
     * @return bool
     */
    public function update(array $data) {
        $query = $this->db_connection->prepare('UPDATE comments SET content=:content date=NOW() WHERE id = :comment_id LIMIT 1');
        $query->bindValue(':comment_id', $data['comment_id'], \PDO::PARAM_INT);
        $query->bindValue(':content', $data['content']);
        return $query->execute();
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete($id) {
        $query = $this->db_connection->prepare('DELETE FROM comments WHERE id = :comment_id LIMIT 1');
        $query->bindParam(':comment_id', $id, \PDO::PARAM_INT);
        return $query->execute();
    }
	
}