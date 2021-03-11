<?php

namespace Controller;

use Model\Category;
use Model\CategoryDB;

class CategoryController
{

    public $categoryDB;

    public function __construct()
    {
        $this->categoryDB = new CategoryDB();
    }

    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $categories = $this->categoryDB->getAll();
            include 'src/view/category/list.php';
        } else {
            $search = $_POST['search'];
            $categories = $this->categoryDB->search($search);
            include 'src/view/category/list.php';
        }
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'src/view/category/add.php';
        } else {
            $name = $_POST['name'];
            $category = new Category($name);
            $this->categoryDB->create($category);
            $message = 'New Category has been added';
            header('location: index.php?page=category'); //'view/author/add.php';
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $category = $this->categoryDB->get($id);
            include 'src/view/category/delete.php';
        } else {
            $id = $_POST['id'];
            $this->categoryDB->delete($id);
            header('Location:index.php?page=category');
        }
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $category = $this->categoryDB->get($id);
            include 'src/view/category/edit.php';
        } else {
            $id = $_POST['id'];
            $category = new Category($_POST['name']);
            $this->categoryDB->update($id, $category);
            header('Location:index.php?page=category');
        }
    }
}
