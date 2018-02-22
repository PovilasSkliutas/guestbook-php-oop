<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL| E_STRICT);
?>

<?php

// apsirasome klase Conect to Database
class Database {

    private $host;
    private $dbName;
    private $username;
    private $password;

    public function __construct() {

        $this->host = 'localhost';
        $this->dbName = 'guestbook';
        $this->username = 'root';
        $this->password = 'root';

    }

    public function connect() {
        $pdo = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->username, $this->password);
        $pdo->exec('SET NAMES UTF8');

        return $pdo;
    }
}

// $db = new Database();
// print_r($db->connect());

?>
