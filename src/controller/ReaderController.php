<?php

namespace Controller;

use Model\Reader;
use Model\ReaderDB;

class ReaderController
{

    public $readerDB;

    public function __construct()
    {
        $this->readerDB = new ReaderDB();
    }

    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $readers = $this->readerDB->getAll();
            include 'src/view/reader/list.php';
        } else {
            $search = $_POST['search'];
            $readers = $this->readerDB->search($search);
            include 'src/view/reader/list.php';
        }
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'src/view/reader/add.php';
        } else {
            $image = $_FILES['image']['name'];
            $tmpName = $_FILES['image']['name'];
            move_uploaded_file($tmpName, 'Image/' . $image);
            $name = $_POST['name'];
            $graduate = $_POST['graduate'];
            $faculty = $_POST['faculty'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $identity = $_POST['identity'];
            $address = $_POST['address'];

            $reader = new Reader($name,
                $graduate,
                $faculty,
                $email,
                $phone,
                $identity,
                $address,
                $image
            );
            $this->readerDB->create($reader);
            $message = 'New Member has been added';
            include 'src/view/reader/add.php';
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $reader = $this->readerDB->get($id);
            include 'src/view/reader/delete.php';
        } else {
            $id = $_POST['id'];
            $this->readerDB->delete($id);
            header('Location: index.php?page=reader');
        }
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $reader = $this->readerDB->get($id);
            include 'src/view/reader/edit.php';
        } else {
            $id = $_POST['id'];
            $image = $_FILES['image']['name'];
            $tmpName = $_FILES['image']['name'];
            move_uploaded_file($tmpName, 'Image/' . $image);
            $reader = new Reader($_POST['name'], $_POST['graduate'], $_POST['faculty'], $_POST['email'], $_POST['phone'], $_POST['identity'], $_POST['address'], $image);
            $this->readerDB->update($id, $reader);
            header('location: index.php?page=reader');
        }
    }
}
