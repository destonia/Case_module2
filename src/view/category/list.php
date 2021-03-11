<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<h2>List of Categories</h2>
<a href="./index.php?page=addCategory">Add new Category</a>
<table class="table">
    <thead>
    <tr>
        <th>STT</th>
        <th>Category's name</th>


    </tr>
    </thead>
    <tbody>

    <?php  foreach ($categories as $key => $category): ?>
    <tr>
        <td><?php echo ++$key ?></td>
        <td><?php echo $category->name ?></td>
        <td colspan="2">
            <a href="./index.php?page=delete&id=<?php echo $book->id; ?>" class="btn btn-warning btn-sm">Delete</a>
            <a href="./index.php?page=edit&id=<?php echo $book->id; ?>" class="btn btn-sm">Update</a>
        </td>

        <?php endforeach; ?>
    </tbody>
</table>