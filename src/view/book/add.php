<?php
if(isset($message)){
    echo "<p class='alert-info'>$message</p>";
}
?>

<div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Add New Book</h1>
            </div>
            <div class="col-12">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Member's name</label>
                        <input type="text" class="form-control" name="name"  placeholder="Type in Book's name" required>
                    </div>

                    <div class="form-group">
                        <label>Publisher</label>
                        <input type="text" class="form-control" name="publisher"  placeholder="Type in Publisher" required>
                    </div>

                    <div class="form-group">
                        <label>Author</label>
                        <input type="text" class="form-control" name="author"  placeholder="Type in Author" required>
                    </div>

                    <div class="form-group">
                        <label>Category</label>
                        <input type="text" class="form-control" name="category"  placeholder="Type in Book's category" required>
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" name="price"  placeholder="Type in Price" required>
                    </div>

                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="text" class="form-control" name="quantity"  placeholder="Type in Quantity" required>
                    </div>

                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" class="form-control" name="location"  placeholder="Type in Book's Location" required>
                    </div>

                    <div class="form-group">
                        <label for="formFile" class="form-label text-primary">Book's Image</label>
                        <input name="image" class="form-control" type="file" id="formFile">
                    </div>

                    <button type="submit" class="btn btn-primary">Add</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
                </form>
            </div>
    </div>
</div>