<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL| E_STRICT);
?>

<?php

include 'Database.class.php';

class Review {

    private $pdo;

    public function __construct() {

        $db = new Database();
        $this->pdo = $db->connect();
    }
// ikeliame review duomenis i duomenu baze
    public function addReview($FirstName, $LastName, $Email, $Review) {

        $sql = 'INSERT INTO posts SET FirstName = :FirstName, LastName = :LastName, Email = :Email, Review = :Review';
        $query = $this->pdo->prepare($sql);
        $query->execute([
            'FirstName' => $FirstName,
            'LastName' => $LastName,
            'Email' => $Email,
            'Review' => $Review
        ]);
        // Shows SQL query error info
        var_dump($query->errorInfo());
    }

// paimame review duomenis is duomenu bazes
    public function getAll() {

        $sql = 'SELECT * FROM posts';
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $reviews = $query->fetchAll(PDO::FETCH_ASSOC);

        return $reviews;
    }

    public function getFeatured() {

        $sql = 'SELECT * FROM `posts` WHERE Featured=1 ORDER BY Date DESC LIMIT 2';
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $reviews = $query->fetchAll(PDO::FETCH_ASSOC);

        return $reviews;
    }

    public function getNotFeatured() {

        $sql = 'SELECT * FROM `posts` WHERE Featured=0 ORDER BY Date DESC';
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $reviews = $query->fetchAll(PDO::FETCH_ASSOC);

        return $reviews;
    }
}

// $reviews = new Review();
// echo "<pre>";
// print_r($reviews->getAll());
// echo "</pre>";


?>
