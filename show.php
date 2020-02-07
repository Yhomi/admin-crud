<?php include "include/header.php" ?>
<?php require "include/db.php"; ?>
<div class="container">
    <h1>Show Page</h1>
    <div class="card border-danger">
        <div class="card-header bg-danger text-white">
            <strong><i class="fa fa-database"></i> Show Product</strong>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-9">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Barcode</th>
                            <td>007</td>
                            <th>Name</th>
                            <td>Product1</td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td>$100</td>
                            <th>QTY</th>
                            <td>3</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td colspan="3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Soluta, consectetur.</td>
                        </tr>
                    </table>
                </div>
                <div class="col-3">
                    <img src="images/d1.jpg" class="img-fluid img-thumbnail">
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "include/footer.php" ?>