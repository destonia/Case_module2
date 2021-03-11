<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<h2>Update Author's info</h2>
<form method="post" action="./index.php?page=editAuthor" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $author->id; ?>"/>
    <div class="form-group">
        <label>Author's Name</label>
        <input type="text" name="name" value="<?php echo $author->name; ?>" class="form-control"/>
    </div>

    <div class="form-group">
        <label>Category</label>
        <input type="text" name="category" value="<?php echo $author->category; ?>" class="form-control"/>
    </div>

    <div class="form-group">
        <label>Number of Book</label>
        <input type="text" name="quantity" value="<?php echo $author->quantity; ?>" class="form-control"/>
    </div>

    <div class="form-group">
        <label for="formFile" class="form-label text-primary">Author's Image</label>
        <input name="image" class="form-control" type="file" id="formFile">
    </div>
    <div class="form-group">
        <input type="submit" value="Update" class="btn btn-primary"/>
        <a href="index.php" class="btn btn-default">Cancel</a>
    </div>
</form>