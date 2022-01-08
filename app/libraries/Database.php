<?php


class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    //dbh->used for initializing
    private $dbh;

    //stmt used for preparing statements
    private $stmt;
    private $error;



    public function __construct() {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = array(PDO::ATTR_PERSISTENT=>true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
//            if($this->dbh== true) {
////                echo "It worked!";
//            }
        } catch(PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    //prepare statement with query
    public function query($sql){
        $this->stmt = $this->dbh->prepare($sql);
    }

    //bind values
    public function bind($param, $value, $type = null) {
        if(is_null($type)) {
            switch(true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);

    }

    //execute the prepared statement
    public function execute() {
        return $this->stmt->execute();
    }

    //get result set as array of objects
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    //get single record as object
    public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
    //get row count
    public function rowCount(){
        //counts the rows that are returned
        return $this->stmt->rowCount();
    }

//    public function getstringPass($email) {
//        $this->stmt->query('SELECT * FROM users WHERE email=:email');
//        $this->stmt->bind(':email', $email);
//        $row = $this->db->single();
//        $properties = get_object_vars($row);
//        $password = $properties['password'];
//        return $password;
//    }
}

//$test_obj = new Test();
//$test_obj->getUsers();


?>