<?php
require_once('configs/constants.php');

class Database{

    public $connection;


    public function __construct(){
        $this->open_db_connection();    
    }
    // Database connection
    public function open_db_connection(){
        $this->connection=new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        if($this->connection->connect_errno){
            die("Database Connection Failed!!").$this->connection->connect_error;
        }
    }

    // Query methode
    public function query($sql){
        $result=$this->connection->query($sql);
        return $result;
    }

    // confirm query method 
    private function confirm_query($result){
        if(!$result){
            die("Query is Failed!!".$this->connection->error);
        }
    }

    // Create Real escape string methode
    public function es($string){
        return $this->connection->real_escape_string($string);
    }

}

$database = new Database();

?>