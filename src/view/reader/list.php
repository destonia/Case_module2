<h2>List of Members</h2>
<a href="./index.php?page=addMember">Add new</a>
<table class="table">
    <thead>
    <tr>
        <th>STT</th>
        <th>Image</th>
        <th>Member's Name</th>
        <th>Member's Faculty</th>
        <th>Member Graduate date</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Identity Number</th>
        <th>Address</th>


    </tr>
    </thead>
    <tbody>

    <?php  foreach ($readers as $key => $reader): ?>
    <tr>
        <td><?php echo ++$key ?></td>
        <td><img src="Image/<?php echo $reader->image ?>" style="width: 15px"></td>
        <td><?php echo $reader->name ?></td>
        <td><?php echo $reader->faculty ?></td>
        <td><?php echo $reader->graduate ?></td>
        <td><?php echo $reader->email ?></td>
        <td><?php echo $reader->phone ?></td>
        <td><?php echo $reader->identity ?></td>
        <td><?php echo $reader->address ?></td>
        <td colspan="2">
            <a href="./index.php?page=delete&id=<?php echo $book->id; ?>" class="btn btn-warning btn-sm">Delete</a>
            <a href="./index.php?page=edit&id=<?php echo $book->id; ?>" class="btn btn-sm">Update</a>
        </td>

        <?php endforeach; ?>
    </tbody>
</table>