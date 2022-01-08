<?php


class User {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function InsertIntoDatabase($perfusername, $perfpass, $perfemail) {
        $this->db->query('INSERT INTO users (name, password, email) VALUES (:name, :password, :email)');
        $this->db->bind(':name', $perfusername);
        $this->db->bind(':password', $perfpass);
        $this->db->bind(':email', $perfemail);
        $this->db->execute();
    }

    public function doesemailexist($email){
        $this->db->query('SELECT * FROM users WHERE email=:email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        //check row
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function login($email, $password) {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind('email', $email);
        $row = $this->db->single();
        if(is_bool($row) || empty($row)) {
            return false;
        } else {
            $properties = get_object_vars($row);
            $passy = $properties['password'];
            if($passy == $password) {
                return $row;
            } else {
                return false;
            }
        }
    }

    public function findemail($email) {
        $this->db->query("SELECT * FROM users WHERE email =:email");
        $this->db->bind(":email", $email);
        $this->db->execute();
        $result = $this->db->rowCount();
        if($result > 0) {
            $error = "Email already exists! Please choose another one.";
            return false;
        } else {
            return true;
        }
    }

}



?>