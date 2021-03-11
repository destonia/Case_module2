<?php


namespace Model;

use PDO;

class AuthorDB
{
    public $connection;

    /*public function __construct($connection)
    {
        $this->connection = $connection;
    }*/
    public function __construct()
    {
        $db = new DBConnect();
        $this->connection = $db->connect();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM Authors";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $authors = [];
        foreach ($result as $row) {
            $author = new Author($row['AuthorName'],
                $row['Category'],
                $row['NumberOfBook'],
                $row['Image']);
            $author->id = $row['AuthorId'];
            $authors[] = $author;
        }
        return $authors;
    }

    public function create($author)
    {
        $sql = "INSERT INTO Authors(AuthorName, Category, NumberOfBook, Image)
                VALUE (:AuthorName, :Category, :Quantity, :Image)";
        /*$sql = "INSERT into Book(BookName, Publisher, Author, Quantity, Price, Location, Category)
                value('Doraemon', 'Japan', 'Fujio', 10, 150, 'A - 4', 'Child')";*/
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(":AuthorName", $author->name);
        $stmt->bindValue(":Category", $author->category);
        $stmt->bindValue(":Quantity", $author->quantity);
        $stmt->bindValue(":Image", $author->image);
        $stmt->execute();
    }

    public function get($id)
    {
        $sql = "SELECT * FROM Authors WHERE AuthorId = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $row = $stmt->fetch();
        $author = new Author($row['AuthorName'],
            $row['Category'],
            $row['NumberOfBook'],
            $row['Image']);
        $author->id = $row['AuthorId'];
        return $author;
    }

    public function delete($id)
    {
        var_dump($id);
        $sql = "DELETE FROM Authors WHERE AuthorId = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, $id);
        return $stmt->execute();
    }

    public function update($id, $author)
    {
        $sql = "UPDATE Authors SET 
                AuthorName = :AuthorName,
                Category = :Category,
                NumberOfBook = :Quantity,
                Image = :Image
                Where AuthorId = :Id";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(":AuthorName", $author->name);
        $stmt->bindValue(":Category", $author->category);
        $stmt->bindValue(":Quantity", $author->quantity);
        $stmt->bindValue(":Image", $author->image);
        $stmt->bindValue(":Id", $id);

        return $stmt->execute();
    }

    public function search($search)
    {
        $sql = "SELECT * FROM Authors where AuthorId = ?";
        //$sql = "SELECT * FROM customer";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $search);
        $statement->execute();
        $result = $statement->fetchAll();
        $authors = [];
        foreach ($result as $row) {
            $author = new Author($row['AuthorName'],
                $row['Category'],
                $row['Quantity'],
                $row['Image']);
            $author->id = $row['AuthorId'];
        }
        $authors[] = $author;
        return $authors;
    }
}