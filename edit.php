<?php include "include/header.php" ?>
<?php 
require "include/db.php";
$msg='';
$msgClass="";
if(isset($_GET['edit'])){
    $id=$_GET['edit'];
    $sql="SELECT * FROM crud_table WHERE id=$id";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
   
}

    if(isset($_POST['update'])){
        $update_id=$_POST['update_id'];
        
        $name=htmlentities($_POST['pname']);
        
        $price=htmlentities($_POST['price']);
        $barcode=htmlentities($_POST['barcode']);
        $qty=htmlentities($_POST['qty']);
        $description=htmlentities($_POST['descrip']);
        $file=$_FILES['img'];
        $file_name=$_FILES['img']['name'];
        $file_size=$_FILES['img']['size'];
        $file_tmp=$_FILES['img']['tmp_name'];
        $file_type=$_FILES['img']['type'];
        $file_ext=explode('.',$file_name);
        $file_ActualExt=strtolower(end($file_ext));
        $extensions=array('jpg','jpeg','png');
        
        if(empty($name)||empty($price)|| empty($barcode)||empty($qty) || empty($description)|| empty($file)){
                    $msg="No Products to upload. Field empty";
                    $msgClass="alert-danger";
        }else{
                if(!preg_match('/^[0-9]*$/',$price) || !preg_match('/^[0-9]*$/',$qty) || !preg_match('/^[0-9]*$/',$barcode)){
                        $msg="Wrong Character input";
                        $msgClass="alert-danger";
                    
                }else{
                    if(in_array($file_ActualExt,$extensions)===false){
                        $msg="File extension not allowed, only JPG, JPEG and PNG are allowed";
                        $msgClass="alert-danger";
                    }else{
                        if($file_size > 2097152){
                            $msg="File size to large. You can only upload file less than 2mb";
                            $msgClass="alert-danger";
                        }else{
                            $fileNewName=uniqid('',true).".".$file_ActualExt;
                            $fileDestination='uploads/'.$fileNewName;
                            if(move_uploaded_file($file_tmp,$fileDestination)){
                                $sql="UPDATE crud_table SET barcode='$barcode',name='$name',price='$price',qty='$qty',image='$fileNewName',description='$description' WHERE id='$update_id'";
                                mysqli_query($conn,$sql);
                                $msg="Product Updated";
                                $msgClass="alert-success";
                                header("Location:index.php");
                            }
                            
                        }
                     
                    }
                }
            }
        

    }
    
    
?>
<div class="container">
    <h1 class="text-center">Edit page</h1>
    <div class="card border-danger">
        <div class="card-header bg-danger text-white">
            <strong><i class="fa fa-plus"></i> Update Product</strong>
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
            <?php if($msg !=""): ?>
                <div class="alert <?php echo $msgClass; ?> alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong><?php echo $msg; ?></strong>
                </div>
            <?php endif; ?>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="col-form-label">Name</label>
                    <input type="text" name="pname" class="form-control" value=<?php echo $row['name']; ?>>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-form-label">Price</label>
                    <input type="text" name="price" class="form-control" value=<?php echo $row['price']; ?>>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                        <label class="col-form-label">Barcode</label>
                        <input type="text" name="barcode" class="form-control" value=<?php echo $row['barcode']; ?>>
                </div>
                <div class="form-group col-md-4">
                        <label class="col-form-label">Quantity</label>
                        <input type="number" name="qty" class="form-control" value=<?php echo $row['qty']; ?>>
                </div>
                <div class="form-group col-md-4">
                    <label class="col-form-label">Upload Image</label>
                    <input type="file" name="img" class="form-control">
                </div>
                
            </div>
            <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="descrip"rows="5"><?php echo $row['description']; ?> </textarea>
                </div>
                
                <div class="form-group">
                    <input type="hidden" name="update_id" value="<?php echo $row['id']; ?>">
                    <button type="submit" name="update" class="btn btn-primary"><i class="fa fa-check-circle"></i> Update Products</button>
                    <a href="index.php" class="btn btn-secondary my-2"><i class="fa fas-arrow"></i><<<< Go Back</a>
                </div>
                
            </form>
        </div>
        
        
    </div>
</div>
<?php include "include/footer.php" ?>