<?php
class Database {
    private $host = "127.0.0.1";
    private $username = "root";
    private $password = "sukhmn12";
    private $database = "student_records";
    public $conn;

    public function connect() {
        if(!$this->conn) {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
        }
        return $this->conn;
    }
}
?>
