<?php include "include/header.php" ?>
<?php require "include/db.php"; ?>
<div class="container">
    <h1 class="text-center">Create page</h1>
    <div class="d-flex justify-content-center">
        <form enctype="multipart/">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control ">
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" name="price" class="form-control">
            </div>
            <div class="form-group">
                <label>Barcode</label>
                <input type="text" name="barcode" class="form-control">
            </div>
            <div class="form-group">
                <label>Quantity</label>
                <input type="text" name="qty" class="form-control">
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" name="price" class="form-control-file">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="descrip"> </textarea>
            </div>
            <div class="form-group">
                <label>Upload Image</label>
                <input type="file" name="img" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-success">Add Products</button>
            </div>
        </form>
    </div>
</div>
<?php include "include/footer.php" ?>