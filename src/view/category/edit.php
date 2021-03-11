<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<h2>Update Category's info</h2>
<form method="post" action="./index.php?page=editCategory">
    <input type="hidden" name="id" value="<?php echo $category->id; ?>"/>
    <div class="form-group">
        <label>Author's Name</label>
        <input type="text" name="name" value="<?php echo $category->name; ?>" class="form-control"/>
    </div>

    <div class="form-group">
        <input type="submit" value="Update" class="btn btn-primary"/>
        <a href="index.php" class="btn btn-default">Cancel</a>
    </div>
</form>