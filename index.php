
<?php 
    require "include/db.php";
   
    session_start();
    
    
?>
<?php include "include/header.php" ?>
<div class="container">
    <?php if(isset($_SESSION['msg'])): ?>
                    <div class="alert <?php echo $_SESSION['msgClass']; ?> alert-dismissible mt-2">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong><?php echo $_SESSION['msg']; ?> </strong>
                                <?php unset($_SESSION['msg']); ?>
                    </div>
                <?php endif; ?>
    <div class="card border-danger mt-5">
        <div class="card-header bg-danger text-white">
            <strong><i class="fa fa-database"></i> Products</strong>
            
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <h5 class="card-title float-left">Table Products</h5>
                <a href="create.php" class="btn btn-success float-right mb-3"><i class="fa fa-plus"></i> Add New</a>
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
            <?php 
                $sql="SELECT * FROM crud_table";
                $result=mysqli_query($conn,$sql);
            ?>
            <?php while($row=mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['barcode']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td>$<?php echo number_format( $row['price']); ?></td>
                    <td><?php echo number_format( $row['qty']); ?></td>
                    <td>
                        <a href="show.php?show=<?php echo $row['id']; ?>" class="btn btn-sm btn-light"><i class="fa fa-th-list"></i></a>
                        <a href="edit.php?edit=<?php echo $row['id']; ?>" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                        <a href="delete.php?delete=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include "include/footer.php" ?>