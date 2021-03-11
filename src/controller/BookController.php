<?php

namespace Controller;

use Model\Book;
use Model\BookDB;

class BookController
{

    public $bookDB;

    public function __construct()
    {
        $this->bookDB = new BookDB();
    }

    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $books = $this->bookDB->getAll();
            include 'src/view/book/list.php';
        } else {
            $search = $_POST['search'];
            $books = $this->bookDB->search($search);
            include 'src/view/book/list.php';
        }
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'src/view/book/add.php';
        } else {
            $image = $_FILES['image']['name'];
            $tmpName = $_FILES['image']['name'];
            move_uploaded_file($tmpName,'Image/'.$image);
            $name = $_POST['name'];
            $publisher = $_POST['publisher'];
            $author = $_POST['author'];
            $category = $_POST['category'];
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];
            $location = $_POST['location'];

            $book = new Book($name,
                $publisher,
                $author,
                $category,
                $quantity,
                $price,
                $location,
                $image
            );
            $this->bookDB->create($book);
            $message = 'New book has been added';
            include 'src/view/book/add.php';
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $book = $this->bookDB->get($id);
            include 'src/view/book/delete.php';
        } else {
            $id = $_POST['id'];
            $this->bookDB->delete($id);
            header('Location: index.php');
        }
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $book = $this->bookDB->get($id);
            include 'src/view/book/edit.php';
        } else {
            $id = $_POST['id'];
            $image = $_FILES['image']['name'];
            $tmpName = $_FILES['image']['name'];
            move_uploaded_file($tmpName,'Image/'.$image);
            $book = new Book($_POST['name'], $_POST['publisher'], $_POST['author'], $_POST['category'], $_POST['quantity'], $_POST['price'], $_POST['location'],$image);
            $this->bookDB->update($id, $book);
            header('Location: index.php');
        }
    }
}
