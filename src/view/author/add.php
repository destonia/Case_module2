<?php
if(isset($message)){
    echo "<p class='alert-info'>$message</p>";
}
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<div class="col-12 col-md-12">
    <div class="row">
        <div class="col-12">
            <h1>Add new Author</h1>
        </div>
        <div class="col-12">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Author's name</label>
                    <input type="text" class="form-control" name="name"  placeholder="Type in Author's name" required>
                </div>

                <div class="form-group">
                    <label>Category</label>
                    <input type="text" class="form-control" name="category"  placeholder="Type in Author's categories" required>
                </div>

                <div class="form-group">
                    <label>Number Of Book</label>
                    <input type="text" class="form-control" name="quantity"  placeholder="Type in Author's Number Of Book" required>
                </div>
                <div class="form-group">
                    <label for="formFile" class="form-label text-primary">Author's Image</label>
                    <input name="image" class="form-control" type="file" id="formFile">
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
            </form>
        </div>
    </div>
</div>