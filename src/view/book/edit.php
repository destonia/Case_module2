<h2>Update Book's Info</h2>
<form method="post" action="./index.php?page=edit" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $book->id; ?>"/>
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" value="<?php echo $book->name; ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="publisher" value="<?php echo $book->publisher; ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="author" value="<?php echo $book->author; ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="category" value="<?php echo $book->category; ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="quantity" value="<?php echo $book->quantity; ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="price" value="<?php echo $book->price; ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="location" value="<?php echo $book->location; ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="formFile" class="form-label text-primary">Member's Image</label>
        <input name="image" class="form-control" type="file" id="formFile">
    </div>
    <div class="form-group">
        <input type="submit" value="Update" class="btn btn-primary"/>
        <a href="index.php" class="btn btn-default">Cancel</a>
    </div>
</form>