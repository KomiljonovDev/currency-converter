<?php
/*
 * TODO
 *  1. Remove database credentials, use dotenv package instead
 */
class DB {
    public $host = "localhost";
    public $user = "root";
    public $pass = "1234";
    public $db_name = "currency_converter";
    public $conn;
    public function __construct(){
        $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->user, $this->pass);
    }
}