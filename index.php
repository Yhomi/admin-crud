
<?php 
    require "include/db.php";
    $sql="SELECT * FROM crud_table";
    
?>
<?php include "include/header.php" ?>
<div class="container">
    <h1>Hello World</h1>
    <div class="card border-danger">
        <div class="card-header bg-danger text-white">
            <strong><i class="fa fa-database"></i> Products</strong>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <h5 class="card-title float-left">Table Products</h5>
                <a href="" class="btn btn-success float-right mb-3"><i class="fa fa-plus"></i> Add New</a>
            </div>
        </div>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>001</td>
                    <td>Shoes</td>
                    <td>$200</td>
                    <td>5</td>
                    <td>
                        <a href="" class="btn btn-sm btn-light"><i class="fa fa-th-list"></i></a>
                        <a href="" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                        <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php include "include/footer.php" ?>