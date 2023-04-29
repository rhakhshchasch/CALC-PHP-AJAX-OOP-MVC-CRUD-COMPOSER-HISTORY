<?php 
namespace App\Models;

class Db {
    protected $db = null;
    private $host = 'localhost';
    private $db_name = 'calc';
    private $username = 'root';
    private $password = '';

    public function __construct() 
    {
        try {
            $dsn = "mysql:host=$this->host;dbname=$this->db_name;charset=utf8mb4";
            $this->db = new \PDO($dsn, $this->username, $this->password);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function __destruct() {
		$this->db = null;
	}
}