<br>
<br>
<br>
<br>
<br>
<br>
<div class="container">
    <h2>List of Books</h2>
    <a href="./index.php?page=add">Add new Book</a>
</div>

<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th>STT</th>
            <th>Image</th>
            <th>Book's Name</th>
            <th>Author</th>
            <th>Publisher</th>
            <th>Category</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Location</th>


        </tr>
        </thead>
        <tbody>

        <?php foreach ($books

        as $key => $book): ?>
        <tr>
            <td><?php echo ++$key ?></td>
            <td><img src="Image/<?php echo $book->image ?>" style="width: 15px"></td>
            <td><?php echo $book->name ?></td>
            <td><?php echo $book->author ?></td>
            <td><?php echo $book->publisher ?></td>
            <td><?php echo $book->category ?></td>
            <td><?php echo $book->price ?></td>
            <td><?php echo $book->quantity ?></td>
            <td><?php echo $book->location ?></td>
            <td colspan="2">
                <a href="./index.php?page=delete&id=<?php echo $book->id; ?>" class="btn btn-warning btn-sm">Delete</a>
                <a href="./index.php?page=edit&id=<?php echo $book->id; ?>" class="btn btn-sm">Update</a>
            </td>

            <?php endforeach; ?>
        </tbody>
    </table>
</div>