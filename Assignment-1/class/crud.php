<?php
require 'database.php';
//this class will extend the functionality of our database class
class Crud extends Database{
    public function __construct(){
        parent::__construct();
    }
    public function getData($query){
        $result = $this->conn->query($query);
        if($result == false){
            return false;
        }
        $rows = array();
        while($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
        return $rows;
    }
    //create a function to execute our create functionality
    public function execute($query){
        $result = $this->conn->query($query);
        if($result == false){
            return false;
        }else{
            return true;
        }
    }
//clean up any strings that has been added to the form
    public function escape_string($value)
    {
        return $this->conn->real_escape_string($value);
    }
}


?>