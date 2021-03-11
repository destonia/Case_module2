<?php


namespace Model;

use PDO;

class CategoryDB
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
        $sql = "SELECT * FROM Categories";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $categories = [];
        foreach ($result as $row) {
            $category = new Category($row['CategoryName']);
            $category->id = $row['CategoryId'];
            $categories[] = $category;
        }
        return $categories;
    }

    public function create($category)
    {
        $sql = "INSERT INTO Categories(CategoryName)
                VALUE (:CategoryName)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(":CategoryName", $category->name);
        $stmt->execute();
    }

    public function get($id)
    {
        $sql = "SELECT * FROM Categories WHERE CategoryId = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $row = $stmt->fetch();
        $category = new Category($row['CategoryName']);
        $category->id = $row['CategoryId'];
        return $category;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM Categories WHERE CategoryId = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, $id);
        return $stmt->execute();
    }

    public function update($id, $category)
    {
        $sql = "UPDATE Categories SET 
                CategoryName = :CategoryName
                Where CategoryId = :Id";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(":CategoryName", $category->name);
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
                $row['Quantity']);
            $author->id = $row['AuthorId'];
        }
        $authors[] = $author;
        return $authors;
    }
}