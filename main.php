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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>My Library</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/navbar-fixed/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="navbar-top-fixed.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">My library</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="main.php">Book management <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="main.php?page=author">Author Management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="main.php?page=category">Category Management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="main.php?page=reader">Member Management</a>
            </li>

        </ul>
        <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

<?php
$bookController = new BookController();
$authorController = new AuthorController();
$categoryController = new CategoryController();
$readerController = new ReaderController();
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : NULL;
switch ($page) {
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
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
<script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
