<?php

namespace Controller;

use Model\Author;
use Model\AuthorDB;
use Model\Category;

class AuthorController
{

    public $authorDB;

    public function __construct()
    {
        $this->authorDB = new AuthorDB();
    }

    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $authors = $this->authorDB->getAll();
            include 'src/view/author/list.php';
        } else {
            $search = $_POST['search'];
            $authors = $this->authorDB->search($search);
            include 'src/view/author/list.php';
        }
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'src/view/author/add.php';
        } else {
            $image = $_FILES['image']['name'];
            $tmpName = $_FILES['image']['name'];
            move_uploaded_file($tmpName, 'Image/' . $image);
            $name = $_POST['name'];
            $category = $_POST['category'];
            $quantity = $_POST['quantity'];
            $author = new Author($name, $category, $quantity, $image);
            $this->authorDB->create($author);
            $message = 'New Author has been added';
            header('location: index.php?page=author'); //'view/author/add.php';
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $author = $this->authorDB->get($id);
            include 'src/view/author/delete.php';
        } else {
            $id = $_POST['id'];
            $this->authorDB->delete($id);
            header('Location:index.php?page=author');
        }
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $author = $this->authorDB->get($id);
            include 'src/view/author/edit.php';
        } else {
            $image = $_FILES['image']['name'];
            $tmpName = $_FILES['image']['name'];
            move_uploaded_file($tmpName, 'Image/' . $image);
            $id = $_POST['id'];
            $author = new Author($_POST['name'],$_POST['category'],$_POST['quantity'],$image);
            $this->authorDB->update($id, $author);
            header('Location:index.php?page=author');
        }
    }
}
