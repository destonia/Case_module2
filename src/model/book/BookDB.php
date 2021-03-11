<?php


namespace Model;

use PDO;

class BookDB
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
        $sql = "SELECT * FROM Book";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $books = [];
        foreach ($result as $row) {
            $book = new Book($row['BookName'],
                $row['Publisher'],
                $row['Author'],
                $row['Category'],
                $row['Quantity'],
                $row['Price'],
                $row['Location'],
                $row['Image']
            );
            $book->id = $row['BookId'];
            $books[] = $book;
        }
        return $books;
    }

    public function create($book)
    {
        $sql = "INSERT INTO Book(BookName, Publisher, Author, Category, Quantity, Price, Location, Image)
                VALUE (:BookName, :Publisher, :Author, :Category, :Quantity, :Price, :Location, :Image)";
        /*$sql = "INSERT into Book(BookName, Publisher, Author, Quantity, Price, Location, Category)
                value('Doraemon', 'Japan', 'Fujio', 10, 150, 'A - 4', 'Child')";*/
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(":BookName", $book->name);
        $stmt->bindValue(":Publisher", $book->publisher);
        $stmt->bindValue(":Author", $book->author);
        $stmt->bindValue(":Category", $book->category);
        $stmt->bindValue(":Quantity", $book->quantity);
        $stmt->bindValue(":Price", $book->price);
        $stmt->bindValue(":Location", $book->location);
        $stmt->bindValue(":Image", $book->image);
        $stmt->execute();
        var_dump($book);
    }

    public function get($id)
    {
        $sql = "SELECT * FROM Book WHERE BookId = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
        $row = $statement->fetch();
        $book = new Book($row['BookName'],
            $row['Publisher'],
            $row['Author'],
            $row['Category'],
            $row['Quantity'],
            $row['Price'],
            $row['Location'],
            $row['Image']
            );
        $book->id = $row['BookId'];
        return $book;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM Book WHERE BookId = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindValue(1, $id);
        return $statement->execute();
    }

    public function update($id, $book)
    {
        $sql = "UPDATE Book SET 
                BookName = :BookName,
                Publisher = :Publisher,
                Author = :Author,
                Category = :Category,
                Quantity = :Quantity,
                Price = :Price,
                Location = :Location,
                Image = :Image
                Where BookId = :Id;
                ";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(":BookName", $book->name);
        $stmt->bindValue(":Publisher", $book->publisher);
        $stmt->bindValue(":Author", $book->author);
        $stmt->bindValue(":Category", $book->category);
        $stmt->bindValue(":Quantity", $book->quantity);
        $stmt->bindValue(":Price", $book->price);
        $stmt->bindValue(":Location", $book->location);
        $stmt->bindValue(":Image", $book->image);
        $stmt->bindValue(":Id", $id);

        return $stmt->execute();
    }

    public function search($search)
    {
        if ($search == '') {
            header('location: index.php');
        } else {
            $sql = "SELECT * FROM Book where BookName like ?";
            $statement = $this->connection->prepare($sql);
            $statement->bindValue(1, '%'.$search.'%');
            $statement->execute();
            $result = $statement->fetchAll();
            if ($result == null) {
                header('location: index.php');
            } else {
                $books = [];
                foreach ($result as $row) {
                    $book = new Book($row['BookName'],
                        $row['Publisher'],
                        $row['Author'],
                        $row['Category'],
                        $row['Quantity'],
                        $row['Price'],
                        $row['Location']);
                    $book->id = $row['BookId'];
                }
                $books[] = $book;
            }
            //var_dump($result);die();

        }
        return $books;
    }
}