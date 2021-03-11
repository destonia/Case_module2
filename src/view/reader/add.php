<?php
if(isset($message)){
    echo "<p class='alert-info'>$message</p>";
}
?>

<div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Add new Member</h1>
            </div>
            <div class="col-12">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Member's name</label>
                        <input type="text" class="form-control" name="name"  placeholder="Type in Member's name" >
                    </div>

                    <div class="form-group">
                        <label>Graduate date</label>
                        <input type="date" class="form-control" name="graduate"  placeholder="Type in member's graduate date" >
                    </div>
                    <div class="form-group">
                        <label>Faculty</label>
                        <input type="text" class="form-control" name="faculty"  placeholder="Type in member's faculty" >
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email"  placeholder="Type in member's email" >
                    </div>

                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="phone"  placeholder="Type in member's phone number" >
                    </div>

                    <div class="form-group">
                        <label>Identity Number</label>
                        <input type="text" class="form-control" name="identity"  placeholder="Type in Identity Number" >
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address"  placeholder="Type in member's address" >
                    </div>

                    <div class="form-group">
                        <label for="formFile" class="form-label text-primary">Member's Image</label>
                        <input name="image" class="form-control" type="file" id="formFile">
                    </div>

                    <button type="submit" class="btn btn-primary">Add</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
                </form>
            </div>
    </div>
</div>