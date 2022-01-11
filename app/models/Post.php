<?php

class Post {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getPosts() {
        $this->db->query('SELECT *,
                        posts.id as postId,
                        users.id as userId,
                        posts.created_at as postCreated,
                        users.created_at as userCreated
                        FROM posts
                        INNER JOIN users
                        ON posts.user_id = users.id
                        ORDER BY posts.created_at DESC
                        ');

        $results = $this->db->resultSet();
        return $results;

    }

    public function updatePost($data) {
        $this->db->query('UPDATE posts SET title = :title, body = :body WHERE id = :id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function addPost($err) {
        $this->db->query('INSERT INTO posts (title, user_id, body) VALUES (:title, :user_id, :body)');
        $this->db->bind(':title', $err['title']);
        $this->db->bind(':user_id', $err['user_id']);
        $this->db->bind(':body', $err['body']);
        $this->db->execute();
    }

    public function getPostById($id) {
//        $id = (int) $id;
        $this->db->query('SELECT * FROM posts WHERE id=:id');
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        $row = $this->db->single();
//        if(is_bool($row)) {
//            die("The row is a bool");
//        } else {
//            return $row;
//        }
        return $row;
    }


    public function deletePost($id) {

        $this->db->query('DELETE from posts WHERE id = :id');
        $this->db->bind(':id', $id, PDO::PARAM_INT);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }
















}