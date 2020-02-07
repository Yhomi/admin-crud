<?php
if(isset($_POST['submit'])){
    // $file=$_FILES['img'];
    $file_name=$_FILES['img']['name'];
    $file_size=$_FILES['img']['size'];
    $file_tmp=$_FILES['img']['tmp_name'];
    $file_type=$_FILES['img']['type'];
    $file_ext=explode('.',$file_name);
    $file_Actualext=strtolower(end($file_ext));
    $extensions=array('jpg','jpeg','png');
    
    if(in_array($file_Actualext,$extensions)===false){
        echo "Image Type no allowed, Please use a jpeg,jpg or png";
    }else{
        if($file_size > 2097152){
            echo "Image size too large, must not be greater than 2mb";
        }else{
            $fileNameNew=uniqid('',true).'.'.$file_Actualext;
            $fileDestination='uploads/'.$fileNameNew;
            move_uploaded_file($file_tmp,$fileDestination);
            echo "success";

        }
    }


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
</head>
<body>
<div class="d-flex justify-content-center mt-5">
    <form method="post" action="files.php" enctype="multipart/form-data">
    <div class="form-group">
                <label>Upload Image</label>
                <input type="file" name="img" class="form-control">
            </div>
            <div class="form-group"> 
                <button type="submit" name="submit" class="btn btn-success">Add Products</button>
            </div>
    </form>
</div>
    
</body>
</html>
