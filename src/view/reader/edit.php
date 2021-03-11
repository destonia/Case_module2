<h2>Update Member's Info</h2>
<form method="post" action="./index.php?page=editMember" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $reader->id; ?>"/>
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" value="<?php echo $reader->name; ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <label>Graduate date</label>
        <input type="text" name="graduate" value="<?php echo $reader->graduate; ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" value="<?php echo $reader->email; ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <label>Phone</label>
        <input type="text" name="phone" value="<?php echo $reader->phone; ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <label>Faculty</label>
        <input type="text" name="faculty" value="<?php echo $reader->faculty; ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <label>Identity Number</label>
        <input type="text" name="identity" value="<?php echo $reader->identity; ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <label>Address</label>
        <input type="text" name="address" value="<?php echo $reader->address; ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="formFile" class="form-label text-primary">Member's Image</label>
        <input name="image" class="form-control" type="file" id="formFile" value="">
    </div>
    <div class="form-group">
        <input type="submit" value="Update" class="btn btn-primary"/>
        <a href="index.php" class="btn btn-default">Cancel</a>
    </div>
</form>