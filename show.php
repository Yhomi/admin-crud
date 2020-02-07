<?php include "include/header.php" ?>
<?php
require "include/db.php"; 
 
    if(isset($_GET['show'])){
        $id=$_GET['show'];
        // echo $id;
        $sql="SELECT * FROM crud_table WHERE id=$id";
        $result=mysqli_query($conn,$sql);
    }
?>
<div class="container">
    <h1>Show Page</h1>
    <div class="card border-danger">
        <a href="index.php" class="btn btn-secondary">Back</a>
        <div class="card-header bg-danger text-white">
            <strong><i class="fa fa-database"></i> Show Product</strong>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-9">
                    <table class="table table-bordered table-striped">
                    <?php while($row=mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <th>Barcode</th>
                            <td><?php echo $row['barcode']; ?></td>
                            <th>Name</th>
                            <td><?php echo $row['name']; ?></td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td><?php echo $row['price']; ?></td>
                            <th>QTY</th>
                            <td><?php echo $row['qty']; ?></td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td colspan="3"><?php echo $row['description']; ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-3">
                    <img src="uploads/<?php echo $row['image']; ?>" class="img-fluid img-thumbnail">
                </div>
                    <?php endwhile; ?>
            </div>
            <a href="index.php" class="btn btn-secondary"><i class="fa fas-arrow"></i><<<< Go Back</a>
        </div>
        
    </div>
    
</div>
<?php include "include/footer.php" ?>