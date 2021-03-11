<?php


namespace Model;

use PDO;

class ReaderDB
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
        $sql = "SELECT * FROM Reader";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $readers = [];
        foreach ($result as $row) {
            $reader = new Reader($row['ReaderName'],
                $row['Graduate'],
                $row['Faculty'],
                $row['Email'],
                $row['Phone'],
                $row['IdentityNo'],
                $row['Address'],
                $row['Image']
            );
            $reader->id = $row['ReaderId'];
            $readers[] = $reader;
        }
        return $readers;
    }

    public function create($reader)
    {
        $sql = "INSERT INTO Reader (ReaderName, Graduate, Faculty, Email, Phone, IdentityNo, Address, Image)
                VALUE (:ReaderName, :Graduate, :Faculty, :Email, :Phone, :IdentityNo, :Address, :Image)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(":ReaderName", $reader->name);
        $stmt->bindValue(":Graduate", $reader->graduate);
        $stmt->bindValue(":Faculty", $reader->faculty);
        $stmt->bindValue(":Email", $reader->email);
        $stmt->bindValue(":Phone", $reader->phone);
        $stmt->bindValue(":IdentityNo", $reader->identity);
        $stmt->bindValue(":Address", $reader->address);
        $stmt->bindValue(":Image", $reader->image);

        $stmt->execute();
        var_dump($reader);
        var_dump($stmt->execute());
    }

    public function get($id)
    {
        $sql = "SELECT * FROM Reader WHERE ReaderId = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
        $row = $statement->fetch();
        $reader = new Reader($row['ReaderName'],
            $row['Graduate'],
            $row['Faculty'],
            $row['Email'],
            $row['Phone'],
            $row['IdentityNo'],
            $row['Address'],
            $row['Image']
            );
        $reader->id = $row['ReaderId'];
        return $reader;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM Reader WHERE ReaderId = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindValue(1, $id);
        return $statement->execute();
    }

    public function update($id, $reader)
    {
        $sql = "UPDATE Reader SET 
                ReaderName = :ReaderName,
                Graduate = :Graduate,
                Faculty = :Faculty,
                Email = :Email,
                Phone = :Phone,
                IdentityNo = :IdentityNo,
                Address = :Address,
                Image = :Image
                Where ReaderId = :Id;
                ";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(":ReaderName", $reader->name);
        $stmt->bindValue(":Graduate", $reader->graduate);
        $stmt->bindValue(":Faculty", $reader->faculty);
        $stmt->bindValue(":Email", $reader->email);
        $stmt->bindValue(":Phone", $reader->phone);
        $stmt->bindValue(":IdentityNo", $reader->identity);
        $stmt->bindValue(":Address", $reader->address);
        $stmt->bindValue(":Image", $reader->image);
        $stmt->bindValue(":Id", $id);

        return $stmt->execute();
    }

    public function search($search)
    {
        if ($search == '') {
            header('location: index.php');
        } else {
            $sql = "SELECT * FROM Reader where ReaderName like ?";
            $statement = $this->connection->prepare($sql);
            $statement->bindValue(1, '%'.$search.'%');
            $statement->execute();
            $result = $statement->fetchAll();
            if ($result == null) {
                header('location: index.php');
            } else {
                $readers = [];
                foreach ($result as $row) {
                    $reader = new Reader($row['ReaderName'],
                        $row['Graduate'],
                        $row['Faculty'],
                        $row['Email'],
                        $row['Phone'],
                        $row['IdentityNo'],
                        $row['Address']);
                    $reader->id = $row['ReaderId'];
                }
                $readers[] = $reader;
            }
            //var_dump($result);die();

        }
        return $readers;
    }
}