<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<h2>List of Authors</h2>
<a href="./index.php?page=addAuthor">Add new Author</a>
<table class="table">
    <thead>
    <tr>
        <th>STT</th>
        <th>Author's Image</th>
        <th>Author's name</th>
        <th>Category</th>
        <th>Number of Book</th>


    </tr>
    </thead>
    <tbody>

    <?php  foreach ($authors as $key => $author): ?>
    <tr>
        <td><?php echo ++$key ?></td>
        <td><img src="Image/<?php echo $author->image ?>" style="width: 15px"></td>
        <td><?php echo $author->name ?></td>
        <td><?php echo $author->category ?></td>
        <td><?php echo $author->quantity ?></td>
        <td colspan="2">
            <a href="./index.php?page=delete&id=<?php echo $book->id; ?>" class="btn btn-warning btn-sm">Delete</a>
            <a href="./index.php?page=edit&id=<?php echo $book->id; ?>" class="btn btn-sm">Update</a>
        </td>

        <?php endforeach; ?>
    </tbody>
</table>