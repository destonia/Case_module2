<?php
ob_start();
require "src/model/DBConnect.php";

require "src/model/book/BookDB.php";
require "src/model/book/Book.php";
require "src/controller/BookController.php";

require "src/model/author/Author.php";
require "src/model/author/AuthorDB.php";
require "src/controller/AuthorController.php";

require "src/model/category/Category.php";
require "src/model/category/CategoryDB.php";
require "src/controller/CategoryController.php";

require "src/model/reader/Reader.php";
require "src/model/reader/ReaderDB.php";
require "src/controller/ReaderController.php";
use \Controller\BookController;
use \Controller\AuthorController;
use \Controller\CategoryController;
use \Controller\ReaderController;
/*require __DIR__ . '/vendor/autoload.php';*/

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="navbar navbar-default">
        <a class="navbar-brand" href="index.php">Book management</a>
        <a class="navbar-brand" href="index.php?page=author">Author Management</a>
        <a class="navbar-brand" href="index.php?page=category">Category Management</a>
        <a class="navbar-brand" href="index.php?page=reader">Member Management</a>
        <form method="post" >
            <input type="text" name="search" placeholder="search what?">
            <input type="submit" value="search">
        </form>
    </div>
    <?php
    $bookController = new BookController();
    $authorController = new AuthorController();
    $categoryController = new CategoryController();
    $readerController = new ReaderController();
    $page = isset($_REQUEST['page'])? $_REQUEST['page'] : NULL;
    switch ($page){
        default:
            $bookController->index();
            break;
        case 'add':
            $bookController->add();
            break;
        case 'delete':
            $bookController->delete();
            break;
        case 'edit':
            $bookController->edit();
            break;

        case 'author':
            $authorController->index();
            break;
        case 'addAuthor':
            $authorController->add();
            break;
        case 'deleteAuthor':
            $authorController->delete();
            break;
        case 'editAuthor':
            $authorController->edit();
            break;

        case 'category':
            $categoryController->index();
            break;
        case 'addCategory':
            $categoryController->add();
            break;
        case 'deleteCategory':
            $categoryController->delete();
            break;
        case 'editCategory':
            $categoryController->edit();
            break;

        case 'reader':
            $readerController->index();
            break;
        case 'addMember':
            $readerController->add();
            break;
        case 'deleteMember':
            $readerController->delete();
            break;
        case 'editMember':
            $readerController->edit();
            break;

    }
    ob_end_flush();
    ?>


</div>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>


