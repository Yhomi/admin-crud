
<?php 
require "include/db.php"; 
session_start();
$_SESSION['msg']="";
$_SESSION['msgClass']="";
if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $sql="DELETE FROM crud_table WHERE id='$id'";
    mysqli_query($conn,$sql);
    $_SESSION['msg']="Product Removed";
    $_SESSION['msgClass']="alert-success";
    header("Location:index.php");
}
?>
